<?php 
    require_once("../../conexion/connect.php");
    date_default_timezone_set("America/Tegucigalpa");
    
    $accion = $_POST['accion3'];   

    if($accion == 1){
        $codigo_empleado = $_POST['idEmpleado'];
        $sqlOptic = "SELECT * FROM tbl_planilla_oficial WHERE codigo_empleado = '$codigo_empleado'";
        $queryOptic = mysqli_query($conexion, $sqlOptic);
        $resultOptic = mysqli_fetch_array($queryOptic);
        $optiquita = $resultOptic['optica_INNOVA'];

        $datos = array(
            "optica" => $optiquita,
            "codigo" => $codigo_empleado
            );

        echo json_encode($datos);
    }

    if($accion == 2){
        // date_default_timezone_set("America/Tegucigalpa");
        $hoja = $_POST['hoja3'];
       if($hoja == 1){
        $codigo_empleado = $_POST['codigoEmpleado3'];
        $deduccionOptica = $_POST['deduccionOptica'];
        $cod_empleadoAgrego3 = $_POST['cod_empleadoAgrego3'];
        
         $fecha_accion = date('Y-m-d H:i:s');
         $accionBitacora=4;
        
       }

        $sqlDeduNeto = "SELECT * FROM tbl_planilla_oficial WHERE codigo_empleado = '$codigo_empleado'";
        $queryDeduNeto = mysqli_query($conexion, $sqlDeduNeto);
        $resultDeduNeto = mysqli_fetch_array($queryDeduNeto); 

        $totalDedu = $resultDeduNeto['total_deducciones'];
        $totalNeto = $resultDeduNeto['salario_neto'];
        $deduccionOpticaActual = $resultDeduNeto['optica_INNOVA'];

        if($deduccionOpticaActual > 0){
            $totalDedu -= $deduccionOpticaActual; 
            $totalNeto += $deduccionOpticaActual;
        }

        if($deduccionOptica == 0){

            $deduccionOptica = "0.00";

        } else{
            
            $totalDedu += $deduccionOptica; 
            $totalNeto -= $deduccionOptica;
        }

        

    
        $sql1 = "UPDATE tbl_planilla_oficial
        SET tbl_planilla_oficial.optica_INNOVA = $deduccionOptica, tbl_planilla_oficial.total_deducciones = $totalDedu, tbl_planilla_oficial.salario_neto = $totalNeto
        WHERE tbl_planilla_oficial.codigo_empleado = $codigo_empleado;";
            $result1 = mysqli_query($conexion,$sql1);
    
        if($result1){
            echo 4;
            $hst1="INSERT INTO tbl_bitacora(accion,usuario_realizo,fecha,usuario_afectado)VALUES
            (?,?,?,?);";
            $resultadosH1=mysqli_prepare($conexion,$hst1);
            mysqli_stmt_bind_param($resultadosH1,"ssss",$accionBitacora, $cod_empleadoAgrego3,$fecha_accion,$codigo_empleado);
            mysqli_stmt_execute($resultadosH1); 
            // echo $salarioDiario;
        }else{
            echo 5;
        }
    
    }
?>