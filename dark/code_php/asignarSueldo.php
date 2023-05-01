<?php
    

    $accion = $_POST['accion'];
    
    

    if($accion == 1){
        $codigo_empleado = $_POST['idEmpleado'];
        echo $codigo_empleado;
    }

    if($accion == 2){
        // date_default_timezone_set("America/Tegucigalpa");
        $hoja = $_POST['hoja'];
       if($hoja == 1){
        require_once("../../conexion/connect.php");
        $codigo_empleado = $_POST['codigoEmpleado'];
        $salarioNominal = $_POST['sueldoAsignar'];
        // $sql = "UPDATE tbl_formulas SET valorModificable = '$nuevoValor' WHERE id = '$idFormula'";
        // $result = mysqli_query($conexion,$sql);
       }
       
        

        
        
        $diasTrabajados = 30;
        $cantidadHorasTarde = 0;
        $cantidadMinutosTarde = 0;
        $diasInasistencia = 0;
        $ivm = 107.96;
        $em = 258.55;
        // $total_deducciones = 0;

        $sqlIHSS = "SELECT * FROM tbl_formulas";
        $queryIHSS = mysqli_query($conexion,$sqlIHSS);
        // $resultIHSS = mysqli_fetch_array($queryIHSS);

        while($formulita = mysqli_fetch_array($queryIHSS)){
            if($formulita['formula']=="ivm"){
                $ivm = $formulita['valorModificable'];
            }
            if($formulita['formula']=="em"){
                $em = $formulita['valorModificable'];
            }
        }

        
        $cero = "0.00";

        ////Salario Anual
        $salarioAnual = (($salarioNominal*12)-40000);

        ////Salario Diario
        $salarioDiario = ($salarioNominal/30);
        $salarioDiario = round($salarioDiario, 2);

        ////Salario Devengado
        $salarioDevengado = ($salarioNominal - ($salarioDiario*(30-$diasTrabajados)));

        ////Salario por Hora
        $salarioXhora = (($salarioNominal/30)/8);

        /////Salario por minuto
        $salarioXminuto = ((($salarioNominal/30)/8)/60);
        // $salarioXminuto = ($salarioXhora/60);

        /////Total tiempo tardío
        $totalTiempoTardio = (($salarioXhora*$cantidadHorasTarde) + ($salarioXminuto*$cantidadMinutosTarde));

        /////TotalInasistencia
        $totalInasistencia = (($salarioNominal/30)*$diasInasistencia);

        ///////////ISR Anual
        $isrAnual = "0.00";

        //////////ISRMensual
        $isrMensual = "0.00";

        ///////////IHSS
        $ihss = $ivm + $em;

        ///////////Total recibido al año
        $totalRecibidoAnio = (($salarioNominal*12)-40000);

        ////totaldeducciones
        $total_deducciones = $ihss;

        ////Salario neto
        $salarioNeto = $salarioDevengado - $total_deducciones;

       

        

        
        $existPlanillaOficial = "SELECT id_usuario FROM tbl_planilla_oficial WHERE codigo_empleado = '$codigo_empleado'";
             $ress=mysqli_query($conexion,$existPlanillaOficial);
            if(mysqli_num_rows($ress)>0){
                $sql = "UPDATE tbl_planilla_oficial SET salario_nominal = '$salarioNominal', salario_anual = '$salarioAnual', dias_trabajados = '$diasTrabajados', salario_diario = '$salarioDiario', salario_devengado = '$salarioDevengado', deduccion_por_incapacidad_dia = '$cero', total_deducido_incapacidad = '$cero', deduccion_por_inasistencia_dia = '$cero', total_inasistencia = '$cero', ISR_anual = '$isrAnual', ISR_mensual = '$isrMensual', IVM = '$ivm', EM = '$em', IHSS = '$ihss', total_recibido_anio = '$totalRecibidoAnio', impuesto_vecinal = '$cero', descuento_impuesto_vecinal = '$cero', costo_emicion_solvencia = '$cero', optica_INNOVA = '$cero', aportacion_voluntaria = '$cero', cooperativa_ELGA = '$cero', ajuste_pendiente_embargo = '$cero', cooperativa_sagrada_familia = '$cero', banco_davivienda = '$cero', embargos = '$cero', total_deducciones = '$total_deducciones', salario_neto = '$salarioNeto', tiempo_tardio = '$cero', inasistencias = '$cero'  WHERE codigo_empleado = '$codigo_empleado'";
                $result = mysqli_query($conexion,$sql);
        
                if($result){
                    echo 4;
                    // echo $salarioDiario;
                }else{
                    echo 5;
                }
                
            } else{
                echo 5;
            }

        
        

    }
?>


