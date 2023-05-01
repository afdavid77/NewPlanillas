<?php

date_default_timezone_set("America/Tegucigalpa");
require_once("../../conexion/connect.php");

$codigo_empleado = $_POST['codiguinEmpleado'];
$diasTrabajados = $_POST['diasTrabajados']; 
$deduccionInasistencia = $_POST['deduccionInasistencia'];
$totalInasistencia = $_POST['totalInasistencia'];
$isrAnual = $_POST['isrAnual'];
$isrMensual = $_POST['isrMensual'];
$guardarDiasIncapacidad = $_POST['guardarDiasIncapacidad'];
$totalIncapacidad = $_POST['totalIncapacidad'];
$totalTiempoTardio = $_POST['totalTiempoTardio'];
$embargos = $_POST['embargos'];
$voluntaria = $_POST['voluntaria'];
$salarioNeto = $_POST['salarioNeto'];
$totalDeducciones = $_POST['totalDeducciones'];
$diaInasi = $_POST['deduccionInasistenciaActual'];

$isrMensualActual = $_POST['isrMensualActual'];
$isrAnualActual = $_POST['isrAnualActual'];
$embargosActual = $_POST['embargosActual'];
$voluntariaActual = $_POST['voluntariaActual'];
$totalIncapacidadActual = $_POST['totalIncapacidadActual'];
$totalTiempoTardioActual = $_POST['totalTiempoTardioActual'];
$totalInasistenciaActual = $_POST['totalInasistenciaActual']; 

$userR = $_POST['userR'];
$insert = "";
$fecha_accion = date('Y-m-d H:i:s');

if($deduccionInasistencia == "" && $diaInasi !=""){ $deduccionInasistencia = $diaInasi ;}else{ if($deduccionInasistencia == ""){$deduccionInasistencia = "0.00";}}

if($diasTrabajados == ""){$diasTrabajados = "0.00";}


if($totalInasistenciaActual != "" && $totalInasistencia == "0.00"){$totalInasistencia = $totalInasistenciaActual;} else{if($totalInasistencia == ""){$totalInasistencia = "0.00";}}

if($isrMensualActual != "" && $isrMensual == "0.00"){$isrMensual = $isrMensualActual;}else{if($isrMensual == ""){$isrMensual = "0.00";}} 


if($isrAnualActual != "" && $isrAnual == ""){$isrAnual = $isrAnualActual;} else{if($isrAnual == ""){$isrAnual = "0.00";}}

if($guardarDiasIncapacidad == ""){$guardarDiasIncapacidad = "0.00";}


if($totalIncapacidadActual != "" && $totalIncapacidad == "0.00"){$totalIncapacidad = $totalIncapacidadActual;} else{if($totalIncapacidad == ""){$totalIncapacidad = "0.00";}}


if($totalTiempoTardioActual != "" && $totalTiempoTardio == "0.00"){$totalTiempoTardio = $totalTiempoTardioActual;} else{if($totalTiempoTardio == ""){$totalTiempoTardio = "0.00";}}


if($embargosActual != "" && $embargos == ""){$embargos = $embargosActual;} else{if($embargos == ""){$embargos = "0.00";}}


if($voluntariaActual != "" && $voluntaria == ""){$voluntaria = $voluntariaActual;}else{if($voluntaria == ""){$voluntaria = "0.00";}}

if($salarioNeto == ""){$salarioNeto = "0.00";}

if($totalDeducciones == ""){$totalDeducciones = "0.00";}

if($totalInasistencia != "" && $totalTiempoTardio != "0.00"){$totalInasistencia += $totalTiempoTardio;}

if($deduccionInasistencia == 0 && $totalInasistenciaActual != 0){ $salarioNeto += $totalInasistenciaActual; $totalDeducciones -= $totalInasistenciaActual; $totalInasistencia = "0.00";}

if($isrAnual == 0 && $isrAnualActual != 0){ $salarioNeto += $isrMensualActual; $totalDeducciones -= $isrMensualActual; $isrMensual = "0.00"; $isrAnual = "0.00";}

if($embargos == 0 && $embargosActual != 0){$salarioNeto += $embargosActual; $totalDeducciones -= $embargosActual; $embargos = "0.00";}

if($voluntaria == 0 && $voluntariaActual != 0){$salarioNeto += $voluntariaActual; $totalDeducciones -= $voluntariaActual; $voluntaria = "0.00";}

$sql = "UPDATE tbl_planilla_oficial SET dias_trabajados = '$diasTrabajados', deduccion_por_incapacidad_dia = '$guardarDiasIncapacidad', total_deducido_incapacidad = '$totalIncapacidad', deduccion_por_inasistencia_dia = '$deduccionInasistencia', total_inasistencia = '$totalInasistencia', ISR_anual = '$isrAnual', ISR_mensual = '$isrMensual', aportacion_voluntaria = '$voluntaria', embargos = '$embargos', total_deducciones = '$totalDeducciones', salario_neto = '$salarioNeto', tiempo_tardio = '$totalTiempoTardio' WHERE codigo_empleado = '$codigo_empleado'";
$result = mysqli_query($conexion,$sql);

if($result){
    echo 1;

    if($totalInasistencia != "0.00" || $totalInasistencia != 0){
        if($insert == ""){
            $insert = "5";
        }else{
            $insert = $insert.",5";
        }
    }
    if($isrAnual != "0.00" || $isrAnual != 0){
        if($insert == ""){
            $insert = "6";
        }else{
            $insert = $insert.",6";
        }
    }
    if($totalIncapacidad != "0.00" || $totalIncapacidad != 0){
        if($insert == ""){
            $insert = "7";
        }else{
            $insert = $insert.",7";
        }
    }
    if($totalTiempoTardio != "0.00" || $totalTiempoTardio != 0){
        if($insert == ""){
            $insert = "8";
        }else{
            $insert = $insert.",8";
        }
    }
    if($embargos != "0.00" || $embargos != 0){
        if($insert == ""){
            $insert = "9";
        }else{
            $insert = $insert.",9";
        }
    }
    if($voluntaria != "0.00" || $voluntaria != 0){
        if($insert == ""){
            $insert = "10";
        }else{
            $insert = $insert.",10";
        }
    }

    if($insert != ""){

        $sqlUser = "SELECT * FROM tbl_usuarios WHERE username = '$userR'";
        $resultUser = mysqli_query($conexion,$sqlUser);
        $rrr = mysqli_fetch_array($resultUser);
        $userRR = $rrr['cod_empleado'];

        $sqlBitacora="INSERT INTO tbl_bitacora(accion,usuario_realizo,fecha,usuario_afectado)VALUES(?,?,?,?);";
        $resultBitacora=mysqli_prepare($conexion,$sqlBitacora);
        mysqli_stmt_bind_param($resultBitacora,"ssss",$insert,$userRR,$fecha_accion,$codigo_empleado);
        mysqli_stmt_execute($resultBitacora); 
    }

}else{
    echo 0;
}


?>