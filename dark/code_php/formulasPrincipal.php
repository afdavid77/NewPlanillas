<?php
    $salarioNominal = 30000;
    $diasTrabajados = 29;
    $cantidadHorasTarde = 2;
    $cantidadMinutosTarde = 35;
    $diasInasistencia = 3;
    $total_deducciones = 0;
    $ivm = 107.96;
    $em = 258.55;

////Salario Anual
$salarioAnual = (($salarioNominal*12)-40000);

////Salario Diario
$salarioDiario = ($salarioNominal/30);

////Salario Devengado
$salarioDevengado = ($salarioNominal - ($salarioDiario*(30-$diasTrabajados)));

////Salario por Hora
$salarioXhora = (($salarioNominal/30)/8);

/////Salario por minuto
// $salarioXminuto = ((($salarioNominal/30)/8)/60);
$salarioXminuto = ($salarioXhora/60);

/////Total tiempo tardío
$totalTiempoTardio = (($salarioXhora*$cantidadHorasTarde) + ($salarioXminuto*$cantidadMinutosTarde));

/////TotalInasistencia
$totalInasistencia = (($salarioNominal/30)*$diasInasistencia);

///////////ISR Anual
$isrAnual = 1;

//////////ISRMensual
$isrMensual = ($isrAnual/10);

///////////IHSS
$ihss = $ivm + $em;

///////////Total recibido al año
$totalRecibidoAnio = (($salarioNominal*12)-4000);

////Salario neto
$salarioNeto = $salarioDevengado - $total_deducciones;

///////////Incapacidad
$diasIncapacidad = 10;
$fechaInicio = 01/9/22;
$techoIncapacidad = 10796.49;

?>