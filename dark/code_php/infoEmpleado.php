<?php
    
    date_default_timezone_set("America/Tegucigalpa");
    require_once("../../conexion/connect.php");


    $codigo_empleado = $_POST['idEmpleado'];

    $sqlEmpleado = "SELECT * FROM empleados911 WHERE codigo_empleado = '$codigo_empleado'";
    $sqlPlanilla = "SELECT * FROM tbl_planilla_oficial WHERE codigo_empleado = '$codigo_empleado'"; 

    $result = mysqli_query($conexion,$sqlEmpleado);
    $resultt = mysqli_query($conexion,$sqlPlanilla);

    $r = mysqli_fetch_array($result);
    $rr = mysqli_fetch_array($resultt);

    $datos = array(
            "codigo" => $r['CODIGO_EMPLEADO'],
            "nombre" => $r['NOMBRE_EMPLEADO'],
            "puesto" => $r['PUESTO'],
            "identidad" => $r['NO_IDENTIDAD'],
            "unidad" => $r['UNIDAD'],
            "ingreso" => $r['FECHA_INGRESO'],
            "regional" => $r['REGIONAL'],
            "salario_nominal" => $rr['salario_nominal'],
            "salario_anual" => $rr['salario_anual'],
            "salario_diario" => $rr['salario_diario'],
            "salario_devengado" => $rr['salario_devengado'],
            "incapacidadDia" => $rr['deduccion_por_incapacidad_dia'],
            "total_deducido_incapacidad" => $rr['total_deducido_incapacidad'],
            "inasistenciaDia" => $rr['deduccion_por_inasistencia_dia'],
            "total_inasistencia" => $rr['total_inasistencia'],
            "ISR_mensual" => $rr['ISR_mensual'],
            "IHSS" => $rr['IHSS'],
            "total_recibido_anio" => $rr['total_recibido_anio'],
            "optica_INNOVA" => $rr['optica_INNOVA'],
            "cooperativa_ELGA" => $rr['cooperativa_ELGA'],
            "cooperativa_sagrada_familia" => $rr['cooperativa_sagrada_familia'],
            "banco_davivienda" => $rr['banco_davivienda'],
            "total_deducciones" => $rr['total_deducciones'],
            "salario_neto" => $rr['salario_neto'],
            "tiempo_tardio" => $rr['tiempo_tardio'],
            "ISR_anual" => $rr['ISR_anual'],
            "embargos" => $rr['embargos'],
            "voluntaria" => $rr['aportacion_voluntaria']
            );

    echo json_encode($datos);

?>