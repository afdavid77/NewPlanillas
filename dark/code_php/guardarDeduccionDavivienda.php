<?php 
    require_once("../../conexion/connect.php");
    date_default_timezone_set("America/Tegucigalpa");

    $accion = $_POST['accion2'];   

    if($accion == 1){
        $codigo_empleado = $_POST['idEmpleado'];
        $sqlDavivi = "SELECT * FROM tbl_planilla_oficial WHERE codigo_empleado = '$codigo_empleado'";
        $queryDavivi = mysqli_query($conexion, $sqlDavivi);
        $resultDavivi = mysqli_fetch_array($queryDavivi);
        $vivi = $resultDavivi['banco_davivienda'];

        $datos = array(
            "davivienda" => $vivi,
            "codigo" => $codigo_empleado
            );

        echo json_encode($datos);
    }

    if($accion == 2){
        // date_default_timezone_set("America/Tegucigalpa");
        $hoja = $_POST['hoja2'];
       if($hoja == 1){
        $codigo_empleado = $_POST['codigoEmpleado2'];
        $deduccionDavivienda = $_POST['deduccionDavivienda'];
        $cod_empleadoAgrego2 = $_POST['cod_empleadoAgrego2'];
        
         $fecha_accion = date('Y-m-d H:i:s');
         $accionBitacora=3;
        
       }

        $sqlDeduNeto = "SELECT * FROM tbl_planilla_oficial WHERE codigo_empleado = '$codigo_empleado'";
        $queryDeduNeto = mysqli_query($conexion, $sqlDeduNeto);
        $resultDeduNeto = mysqli_fetch_array($queryDeduNeto); 
        $deduccionDaviviendaActual = $resultDeduNeto['banco_davivienda'];

        $totalDedu = $resultDeduNeto['total_deducciones'];
        $totalNeto = $resultDeduNeto['salario_neto'];

        if($deduccionDaviviendaActual > 0){
            $totalDedu -= $deduccionDaviviendaActual; 
            $totalNeto += $deduccionDaviviendaActual;
        }

        if($deduccionDavivienda == 0){

            $deduccionDavivienda = "0.00";

        } else{
            
            $totalDedu += $deduccionDavivienda; 
            $totalNeto -= $deduccionDavivienda;
        }

        
    
        $sql1 = "UPDATE tbl_planilla_oficial
        SET tbl_planilla_oficial.banco_davivienda = $deduccionDavivienda, tbl_planilla_oficial.total_deducciones = $totalDedu, tbl_planilla_oficial.salario_neto = $totalNeto
        WHERE tbl_planilla_oficial.codigo_empleado = $codigo_empleado;";
            $result1 = mysqli_query($conexion,$sql1);
    
        if($result1){
            echo 4;
            $hst1="INSERT INTO tbl_bitacora(accion,usuario_realizo,fecha,usuario_afectado)VALUES
            (?,?,?,?);";
            $resultadosH1=mysqli_prepare($conexion,$hst1);
            mysqli_stmt_bind_param($resultadosH1,"ssss",$accionBitacora,$cod_empleadoAgrego2,$fecha_accion,$codigo_empleado);
            mysqli_stmt_execute($resultadosH1); 
            // echo $salarioDiario;
        }else{
            echo 5;
        }
    
    }
?>