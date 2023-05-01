<?php

date_default_timezone_set("America/Tegucigalpa");
require_once("../../conexion/connect.php");


$accion = $_POST['accion'];
$idFormula = $_POST['idFormula'];


    $insert = "14";
    $fecha_accion = date('Y-m-d H:i:s');

if($accion == 1){
    
    $sql = "SELECT * FROM tbl_formulas WHERE id = '$idFormula'";
    $result = mysqli_query($conexion,$sql);
    $recorrido = mysqli_fetch_array($result);

    $valor = $recorrido['valorModificable'];

    echo $valor;

}

if($accion == 2){
    $nuevoValor = $_POST['newValue'];
    $sql = "UPDATE tbl_formulas SET valorModificable = '$nuevoValor' WHERE id = '$idFormula'";
    // $result = ;
    if(mysqli_query($conexion,$sql)){
        echo 1;
        $userR = $_POST['userR'];
        $sqlUser = "SELECT * FROM tbl_usuarios WHERE username = '$userR'";
             $resultUser = mysqli_query($conexion,$sqlUser);
             $rrr = mysqli_fetch_array($resultUser);
             $userRR = $rrr['cod_empleado'];
     
             $sqlBitacora="INSERT INTO tbl_bitacora(accion,usuario_realizo,fecha)VALUES(?,?,?);";
             $resultBitacora=mysqli_prepare($conexion,$sqlBitacora);
             mysqli_stmt_bind_param($resultBitacora,"sss",$insert,$userRR,$fecha_accion);
             mysqli_stmt_execute($resultBitacora);
    }else{
        echo 0;
    }
    

}



?>