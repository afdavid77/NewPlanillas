<?php

date_default_timezone_set("America/Tegucigalpa");
require_once("../../conexion/connect.php");

$dias = $_POST['diasIncapacidad'];
$fecha = $_POST['fechaInicioIncapacidad'];
// $techo = 10796.49;

$sql = "SELECT valorModificable FROM tbl_formulas WHERE formula = 'techo'";
$result = mysqli_query($conexion,$sql);
$recorrido = mysqli_fetch_array($result);
$techo = $recorrido['valorModificable'];

$diasIncapacidad = $dias-3;
$techoTotal = $techo*3;

// $meses = array("01"=>"31","02"=>"28","03"=>"31","04"=>"30","05"=>"31","06"=>"30","07"=>"31","08"=>"31","09"=>"30","10"=>"31","11"=>"30","12"=>"31");

    $fecha1 = explode("-", $fecha);
    $fecha2 = $fecha1[01];

    if($fecha2 == '01'){
        $totalDias = 92;
    }
    if($fecha2 == '02'){
        $totalDias = 92;
    }
    if($fecha2 == '03'){
        $totalDias = 90;
    }
    if($fecha2 == '04'){
        $totalDias = 90;
    }
    if($fecha2 == '05'){
        $totalDias = 89;
    }
    if($fecha2 == '06'){
        $totalDias = 92;
    }
    if($fecha2 == '07'){
        $totalDias = 91;
    }
    if($fecha2 == '08'){
        $totalDias = 92;
    }
    if($fecha2 == '09'){
        $totalDias = 92;
    }
    if($fecha2 == '10'){
        $totalDias = 92;
    }
    if($fecha2 == '11'){
        $totalDias = 92;
    }
    if($fecha2 == '12'){
        $totalDias = 91;
    }

    $incapacidad = ((($techoTotal/$totalDias)*0.66)*$diasIncapacidad);
    

echo $incapacidad;

?>