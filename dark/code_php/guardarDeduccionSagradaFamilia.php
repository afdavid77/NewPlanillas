<?php 
    require_once("../../conexion/connect.php");
    date_default_timezone_set("America/Tegucigalpa");

    $accion = $_POST['accion1'];   

    if($accion == 1){
        $codigo_empleado = $_POST['idEmpleado'];
        $sqlSagrado = "SELECT * FROM tbl_planilla_oficial WHERE codigo_empleado = '$codigo_empleado'";
        $querySagrado = mysqli_query($conexion, $sqlSagrado);
        $resultSagrado = mysqli_fetch_array($querySagrado);
        $sagradin = $resultSagrado['cooperativa_sagrada_familia'];

        $datos = array(
            "sagrada" => $sagradin,
            "codigo" => $codigo_empleado
            );

        echo json_encode($datos);
    }

    if($accion == 2){
        // date_default_timezone_set("America/Tegucigalpa");
        $hoja = $_POST['hoja1'];
       if($hoja == 1){
        $codigo_empleado = $_POST['codigoEmpleado1'];
        $deduccionSagradaFamilia = $_POST['deduccionSagradaFamilia'];
        $cod_empleadoAgrego1 = $_POST['cod_empleadoAgrego1'];
        
         $fecha_accion = date('Y-m-d H:i:s');
         $accionBitacora=2;
        
       }
        

        $sqlDeduNeto = "SELECT * FROM tbl_planilla_oficial WHERE codigo_empleado = '$codigo_empleado'";
        $queryDeduNeto = mysqli_query($conexion, $sqlDeduNeto);
        $resultDeduNeto = mysqli_fetch_array($queryDeduNeto);
        $deduccionSagradaFamiliaActual = $resultDeduNeto['cooperativa_sagrada_familia'];

        $totalDedu = $resultDeduNeto['total_deducciones'];
        $totalNeto = $resultDeduNeto['salario_neto'];

        if($deduccionSagradaFamiliaActual > 0){
            $totalDedu -= $deduccionSagradaFamiliaActual; 
            $totalNeto += $deduccionSagradaFamiliaActual;
        } 

        if($deduccionSagradaFamilia == 0){

            $deduccionSagradaFamilia = "0.00";

        } else{
            
            $totalDedu += $deduccionSagradaFamilia; 
            $totalNeto -= $deduccionSagradaFamilia;
        }

    
        $sql1 = "UPDATE tbl_planilla_oficial
        SET tbl_planilla_oficial.cooperativa_sagrada_familia = $deduccionSagradaFamilia, tbl_planilla_oficial.total_deducciones = $totalDedu, tbl_planilla_oficial.salario_neto = $totalNeto
        WHERE tbl_planilla_oficial.codigo_empleado = $codigo_empleado;";
            $result1 = mysqli_query($conexion,$sql1);
    
        if($result1){
            echo 4;
            $hst1="INSERT INTO tbl_bitacora(accion,usuario_realizo,fecha,usuario_afectado)VALUES
            (?,?,?,?);";
            $resultadosH1=mysqli_prepare($conexion,$hst1);
            mysqli_stmt_bind_param($resultadosH1,"ssss",$accionBitacora,$cod_empleadoAgrego1,$fecha_accion,$codigo_empleado);
            mysqli_stmt_execute($resultadosH1);
            // echo $salarioDiario;
        }else{
            echo 5;
        }
    
    }
?>
