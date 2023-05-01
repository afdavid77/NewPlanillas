<?php

date_default_timezone_set("America/Tegucigalpa");
require_once("../../conexion/connect.php");

    $nombreEmpleado = $_POST['nombreEmpleado'];
    $codigo_empleado = $_POST['codigoEmpleado'];
    $identidadEmpleado = $_POST['identidadEmpleado'];
    $unidadEmpleado = $_POST['unidadEmpleado'];
    $puestoEmpleado = $_POST['puestoEmpleado'];
    $fechaIngresoEmpleado = $_POST['fechaIngresoEmpleado'];
    $planillaEmpleado = $_POST['planillaEmpleado'];
    $salarioNominal = $_POST['sueldoEmpleado'];
    $sexo = $_POST['sexo'];
    $CodigoPuestoEmpleado = $_POST['CodigoPuestoEmpleado'];
    $ceroo = "0.00";
    $r = 30;

    $userR = $_POST['userR'];
    $insert = "13";
    $fecha_accion = date('Y-m-d H:i:s');
    

    $existEmpleados911 = "SELECT PUESTO FROM empleados911 WHERE CODIGO_EMPLEADO = '$codigo_empleado'";
    $existPlanillaOficial = "SELECT id_usuario FROM tbl_planilla_oficial WHERE codigo_empleado = '$codigo_empleado'";

$res=mysqli_query($conexion,$existEmpleados911);
$ress=mysqli_query($conexion,$existPlanillaOficial);
        if((mysqli_num_rows($res)>0) || (mysqli_num_rows($ress)>0)){
                echo 0;
        } else{
            
            $sqlEmpleados911 = "INSERT INTO empleados911(CODIGO_EMPLEADO, NOMBRE_EMPLEADO, NO_IDENTIDAD, UNIDAD, PUESTO, FECHA_INGRESO, REGIONAL, ESTADO, CODIGO_PUESTO, SEXO) VALUES ('$codigo_empleado','$nombreEmpleado','$identidadEmpleado','$unidadEmpleado','$puestoEmpleado','$fechaIngresoEmpleado','$planillaEmpleado','1','$CodigoPuestoEmpleado','$sexo')";
            if(mysqli_query($conexion,$sqlEmpleados911)){
                                
                    $sqlPlanillaOficial = "INSERT INTO tbl_planilla_oficial(codigo_empleado, salario_nominal, dias_que_debio_trabajar, horas_extras_diurnas, horas_extras_nocturnas, total_horas_extras, estado, regional) VALUES ('$codigo_empleado','$salarioNominal','$r','$ceroo','$ceroo','$ceroo','1','$planillaEmpleado')";
                    if(mysqli_query($conexion,$sqlPlanillaOficial)){
                                        echo 1;
                                        $sqlUser = "SELECT * FROM tbl_usuarios WHERE username = '$userR'";
                                        $resultUser = mysqli_query($conexion,$sqlUser);
                                        $rrr = mysqli_fetch_array($resultUser);
                                        $userRR = $rrr['cod_empleado'];
                                
                                        $sqlBitacora="INSERT INTO tbl_bitacora(accion,usuario_realizo,fecha)VALUES(?,?,?);";
                                        $resultBitacora=mysqli_prepare($conexion,$sqlBitacora);
                                        mysqli_stmt_bind_param($resultBitacora,"sss",$insert,$userRR,$fecha_accion);
                                        mysqli_stmt_execute($resultBitacora);
                                        include 'asignarSueldo.php';
                                    } else{
                                        echo 3;
                                    }

            } else{
                echo 2;
            }
            
        }



                



                                       
                                    

?>
