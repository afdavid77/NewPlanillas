<?php
    date_default_timezone_set("America/Tegucigalpa");
    require_once("../../conexion/connect.php");

    $codigo = $_POST['idEmpleado'];
    $cero = 0;

    $userR = $_POST['userR'];
    $insert = "12";
    $fecha_accion = date('Y-m-d H:i:s');

    $sql = "UPDATE empleados911 SET ESTADO = '$cero' WHERE CODIGO_EMPLEADO = '$codigo'";
    $sqlPO = "UPDATE tbl_planilla_oficial SET estado = '$cero' WHERE codigo_empleado = '$codigo'";

    $r = mysqli_query($conexion, $sql);
    $rPO = mysqli_query($conexion, $sqlPO);

    if($r){
        if($rPO){
            echo 1;
            $sqlUser = "SELECT * FROM tbl_usuarios WHERE username = '$userR'";
             $resultUser = mysqli_query($conexion,$sqlUser);
             $rrr = mysqli_fetch_array($resultUser);
             $userRR = $rrr['cod_empleado'];
     
             $sqlBitacora="INSERT INTO tbl_bitacora(accion,usuario_realizo,fecha)VALUES(?,?,?);";
             $resultBitacora=mysqli_prepare($conexion,$sqlBitacora);
             mysqli_stmt_bind_param($resultBitacora,"sss",$insert,$userRR,$fecha_accion);
             mysqli_stmt_execute($resultBitacora); 
        }else{
            echo 2;
        }
        // echo 1;
    }else{
        echo 0;
    }
    
?>