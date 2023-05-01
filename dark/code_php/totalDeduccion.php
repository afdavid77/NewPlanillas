<?php
date_default_timezone_set("America/Tegucigalpa");
require_once("../../conexion/connect.php");

// $idEmpleado = $_POST['id'];
$inasistencia = $_POST['inasistencia'];
$isr = $_POST['isr'];
$incapacidad = $_POST['incapacidad'];
$tiempoTardio = $_POST['tiempo'];
$embargo = $_POST['embargo'];
$voluntaria = $_POST['voluntaria'];
$totalAsignado = $_POST['totaldedu'];
$neto = $_POST['neto'];

$isrMensualActual = $_POST['isrMensualActual'];
$embargosActual = $_POST['embargosActual'];
$voluntariaActual = $_POST['voluntariaActual'];
$totalIncapacidadActual = $_POST['totalIncapacidadActual'];
$totalTiempoTardioActual = $_POST['totalTiempoTardioActual'];
$totalInasistenciaActual = $_POST['totalInasistenciaActual'];

if($isrMensualActual == ""){$isrMensualActual = "0.00";} if($embargosActual == ""){$embargosActual = "0.00";} if($voluntariaActual == ""){$voluntariaActual = "0.00";} 
if($totalIncapacidadActual == ""){$totalIncapacidadActual = "0.00";} if($totalTiempoTardioActual == ""){$totalTiempoTardioActual = "0.00";} if($totalInasistenciaActual == ""){$totalInasistenciaActual = "0.00";}

// if($inasistencia == ""){$inasistencia = $totalInasistenciaActual;}
// if($incapacidad == ""){$incapacidad = $totalIncapacidadActual;}
// if($isr == ""){$isr = $isrMensualActual;}
// if($tiempoTardio == ""){$tiempoTardio = $totalTiempoTardioActual;}
// if($embargo == ""){$embargo = $embargosActual;}
// if($voluntaria == ""){$voluntaria = $voluntariaActual;}

if($inasistencia == 0){$inasistencia = $totalInasistenciaActual;}
if($incapacidad == 0){$incapacidad = $totalIncapacidadActual;}
if($isr == 0){$isr = $isrMensualActual;}
if($tiempoTardio == 0){$tiempoTardio = $totalTiempoTardioActual;}
if($embargo == 0){$embargo = $embargosActual;}
if($voluntaria == 0){$voluntaria = $voluntariaActual;}

$total = $totalAsignado + $isr + $inasistencia + $incapacidad + $tiempoTardio + $embargo + $voluntaria;
$total = round($total,2);

if($total == $totalAsignado){
    $salarioNeto = $neto;
} else{
    $salarioNeto = $neto - $isr - $inasistencia - $incapacidad - $tiempoTardio - $embargo - $voluntaria;
}

$salarioNeto = round($salarioNeto,2);

$datos = array(
    "salarioNeto" => $salarioNeto,
    "totalDeduccion" => $total
);

echo json_encode($datos);
?>

