<?php

date_default_timezone_set("America/Tegucigalpa");
require_once("../../conexion/connect.php");

$accion = $_POST['accion'];

if($accion == 1){
        $dias = $_POST['diasIncapacidad'];
        $fecha = $_POST['fechaInicioIncapacidad']; 
        $codigo = $_POST['codigoEmpleadoIncapacidad'];
        // $techo = 10796.49;

        $sql = "SELECT valorModificable FROM tbl_formulas WHERE formula = 'Techo'";
        $result = mysqli_query($conexion,$sql);
        $recorrido = mysqli_fetch_array($result);
        $techo = $recorrido['valorModificable'];

        $diasIncapacidad = $dias-3;
        $techoTotal = $techo*3;

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

            $incapaciadDia = (($techoTotal/$totalDias)*0.66);
            $incapacidadTotal = ($incapaciadDia*$diasIncapacidad);
            $incapacidadTotal = round($incapacidadTotal, 2);

            $datosincapacidad = array(
                "diasI" => $dias,
                "totalI" => $incapacidadTotal
                 );

            echo json_encode($datosincapacidad);

            // $sqlIncapacidad = "UPDATE tbl_planilla_oficial SET deduccion_por_incapacidad_dia = '$dias', total_deducido_incapacidad = '$incapacidadTotal' WHERE codigo_empleado = '$codigo'";
            // $resultIncapacidad = mysqli_query($conexion, $sqlIncapacidad);
            // if($resultIncapacidad){
            //     echo 1;
            // } else{
            //     echo 0;
            // }
} else{ if($accion == 2){
            $cantidadHorasTarde = $_POST['horasTarde'];
            $cantidadMinutosTarde = $_POST['minutosTarde'];
            $salarioNominal = $_POST['sNominal'];

            ////Salario por Hora
            $salarioXhora = (($salarioNominal/30)/8);

            /////Salario por minuto
            $salarioXminuto = ((($salarioNominal/30)/8)/60);

            $totalTiempoTardio = (($salarioXhora*$cantidadHorasTarde) + ($salarioXminuto*$cantidadMinutosTarde));

            $totalTiempoTardio = round($totalTiempoTardio, 2);

            echo $totalTiempoTardio;

        } else{ if($accion == 3){

                    $diasInasistencia = $_POST['inasistencia'];
                    $salarioNominal = $_POST['salarioNomi'];
                    $idEmpleadoInasi = $_POST['id'];

                    $totalInasistencia = (($salarioNominal/30)*$diasInasistencia);
                    $totalInasistencia = round($totalInasistencia, 2);

                    // $sqlInasistencia = "SELECT * FROM tbl_planilla_oficial WHERE codigo_empleado = '$idEmpleadoInasi'";
                    // $resultinasistencia = mysqli_query($conexion,$sqlInasistencia);
                    // $rInasistencia = mysqli_fetch_array($resultinasistencia);
                    // $totalDeduccionSQL = $rInasistencia['total_deducciones'];

                    // $totalDeduccion = $totalDeduccionSQL + $totalInasistencia;

                    // $datosInasistencia = array(
                    //     "Inasistencia" => $totalInasistencia,
                    //     "totalDeduccion" => $totalDeduccion
                    // );

                    echo $totalInasistencia;


                }else{ if($accion == 4){
                            
                            $isrAnual = $_POST['isr'];
                            $sqlMesesISR = "SELECT valorModificable FROM tbl_formulas WHERE formula = 'isrMensual'";
                            $resultMesesISR = mysqli_query($conexion, $sqlMesesISR);
                            $RmesesISR = mysqli_fetch_array($resultMesesISR);
                            $mesesISR = $RmesesISR['valorModificable'];

                            $isrMensual = ($isrAnual/$mesesISR);
                            $isrMensual = round($isrMensual, 2);

                            echo $isrMensual;

                        } else{
                            echo 0;
                        }

                }

        }
}


    


?>