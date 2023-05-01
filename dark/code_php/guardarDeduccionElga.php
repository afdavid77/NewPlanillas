<?php
require_once("../../conexion/connect.php");
date_default_timezone_set("America/Tegucigalpa");

$accion = $_POST['accion'];   

if($accion == 1){
    $codigo_empleado = $_POST['idEmpleado'];
    $sqlElga = "SELECT * FROM tbl_planilla_oficial WHERE codigo_empleado = '$codigo_empleado'";
    $queryElga = mysqli_query($conexion, $sqlElga);
    $resultElga = mysqli_fetch_array($queryElga);
    $elguita = $resultElga['cooperativa_ELGA'];

    $datos = array(
        "elga" => $elguita,
        "codigo" => $codigo_empleado
        );

    echo json_encode($datos);
}

if($accion == 2){
    // date_default_timezone_set("America/Tegucigalpa");
    $hoja = $_POST['hoja'];
   if($hoja == 1){
    $codigo_empleado = $_POST['codigoEmpleado'];
    $deduccionElga = $_POST['deduccionElga'];
    $cod_empleadoAgrego = $_POST['cod_empleadoAgrego'];
    
     $fecha_accion = date('Y-m-d H:i:s');
     $accionBitacora=1;
    
   } 

    $sqlDeduNeto = "SELECT * FROM tbl_planilla_oficial WHERE codigo_empleado = '$codigo_empleado'";
        $queryDeduNeto = mysqli_query($conexion, $sqlDeduNeto);
        $resultDeduNeto = mysqli_fetch_array($queryDeduNeto); 
        $deduccionElgaActual = $resultDeduNeto['cooperativa_ELGA'];

        $totalDedu = $resultDeduNeto['total_deducciones'];
        $totalNeto = $resultDeduNeto['salario_neto'];

        if($deduccionElgaActual > 0){
            $totalDedu -= $deduccionElgaActual; 
            $totalNeto += $deduccionElgaActual;
        }

        if($deduccionElga == 0){

            $deduccionElga = "0.00";

        } else{
            
            $totalDedu += $deduccionElga; 
            $totalNeto -= $deduccionElga;
        }

        

    $sql = "UPDATE tbl_planilla_oficial
    SET tbl_planilla_oficial.cooperativa_ELGA = $deduccionElga, tbl_planilla_oficial.total_deducciones = $totalDedu, tbl_planilla_oficial.salario_neto = $totalNeto
    WHERE tbl_planilla_oficial.codigo_empleado = $codigo_empleado;";
        $result = mysqli_query($conexion,$sql);

    if($result){
        echo 4;
        $hst="INSERT INTO tbl_bitacora(accion,usuario_realizo,fecha,usuario_afectado)VALUES
        (?,?,?,?);";
        $resultadosH=mysqli_prepare($conexion,$hst);
        mysqli_stmt_bind_param($resultadosH,"ssss",$accionBitacora,$cod_empleadoAgrego,$fecha_accion,$codigo_empleado);
        mysqli_stmt_execute($resultadosH);
        // echo $salarioDiario;
    }else{
        echo 5;
    }

}



   


 
?>