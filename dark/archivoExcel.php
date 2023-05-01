<?php
date_default_timezone_set("America/Tegucigalpa");
require_once("../conexion/connect.php");

$query="SELECT
        empleados911.CODIGO_EMPLEADO,    
        empleados911.NOMBRE_EMPLEADO,
        empleados911.NO_IDENTIDAD,
        empleados911.PUESTO,
        empleados911.FECHA_INGRESO,
        empleados911.UNIDAD,
        empleados911.CODIGO_PUESTO,
        empleados911.SEXO,
        tbl_planilla_oficial.codigo_empleado, 
        tbl_planilla_oficial.salario_nominal, 
        tbl_planilla_oficial.salario_anual, 
        tbl_planilla_oficial.dias_trabajados, 
        tbl_planilla_oficial.dias_que_debio_trabajar, 
        tbl_planilla_oficial.salario_diario, 
        tbl_planilla_oficial.salario_devengado, 
        tbl_planilla_oficial.horas_extras_diurnas, 
        tbl_planilla_oficial.horas_extras_nocturnas, 
        tbl_planilla_oficial.total_horas_extras, 
        tbl_planilla_oficial.deduccion_por_incapacidad_dia, 
        tbl_planilla_oficial.total_deducido_incapacidad, 
        tbl_planilla_oficial.deduccion_por_inasistencia_dia, 
        tbl_planilla_oficial.total_inasistencia, 
        tbl_planilla_oficial.ISR_anual, 
        tbl_planilla_oficial.ISR_mensual, 
        tbl_planilla_oficial.IVM, 
        tbl_planilla_oficial.EM, 
        tbl_planilla_oficial.IHSS, 
        tbl_planilla_oficial.total_recibido_anio, 
        tbl_planilla_oficial.descuento_impuesto_vecinal, 
        tbl_planilla_oficial.impuesto_vecinal, 
        tbl_planilla_oficial.costo_emicion_solvencia, 
        tbl_planilla_oficial.optica_INNOVA, 
        tbl_planilla_oficial.aportacion_voluntaria, 
        tbl_planilla_oficial.cooperativa_ELGA, 
        tbl_planilla_oficial.ajuste_pendiente_embargo, 
        tbl_planilla_oficial.cooperativa_sagrada_familia, 
        tbl_planilla_oficial.banco_davivienda, 
        tbl_planilla_oficial.embargos, 
        tbl_planilla_oficial.total_deducciones, 
        tbl_planilla_oficial.tiempo_tardio, 
        tbl_planilla_oficial.inasistencias,
        tbl_planilla_oficial.salario_neto,
        tbl_unidades.id_unidad,
        tbl_unidades.unidad
    FROM
        tbl_planilla_oficial
    INNER JOIN empleados911 ON tbl_planilla_oficial.codigo_empleado = empleados911.CODIGO_EMPLEADO
    INNER JOIN tbl_unidades ON empleados911.UNIDAD = tbl_unidades.unidad
    WHERE  (empleados911.ESTADO = 1 AND empleados911.REGIONAL=1) ORDER BY tbl_unidades.id_unidad";
    // $resultado=$conexion->query($query);

$queryUnidad = "SELECT * FROM tbl_unidades";
$resultadoUnidad =  $conexion->query($queryUnidad);

    

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use \PhpOffice\PhpSpreadsheet\IOFactory;


$spreadsheet = new SpreadSheet();
$spreadsheet->getProperties()->setCreator("David")->setTitle("Mi excelllll"); 

$spreadsheet->setActiveSheetIndex(0);
$hojaActiva = $spreadsheet->getActiveSheet();

//asignando ancho de columnas
$hojaActiva->getDefaultColumnDimension()->setWidth(13);
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(220, 'pt');
$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(220, 'pt');
$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(85, 'pt');
$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(77, 'pt');
$spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(77, 'pt');
$spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(38, 'pt');

//asignando altura de filas
$hojaActiva->getRowDimension('5')->setRowHeight(50);
$hojaActiva->getRowDimension('1')->setRowHeight(25);

//combinar celdas
$hojaActiva->mergeCells('A1:AL1');
$hojaActiva->mergeCells('A2:AL2');
$hojaActiva->mergeCells('A3:AL3');

$styleArrayA = [
    'font' => [
        'bold' => true,
        'size' => '20'
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
    ],
];

$hojaActiva->setCellValue('A1','SISTEMA NACIONAL DE EMERGENCIA 911(TGU)');
$hojaActiva->getStyle('A1')->applyFromArray($styleArrayA);

$styleArrayB = [
    'font' => [
        'bold' => true,
        'size' => '16'
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
    ],
];

$hojaActiva->setCellValue('A3','PLANILLA DE PERSONAL PERMANENTE  DEL 01 AL 30 DE ENERO 2022');
$hojaActiva->getStyle('A3')->applyFromArray($styleArrayB);


//insertando imagen gobierno
        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawing->setName('gobierno');
        $drawing->setDescription('gobierno');
        $drawing->setPath('gobierno.png'); 
        $drawing->setCoordinates('A1');
        $drawing->setHeight(95);
        // $drawing->setOffsetX(50000);
        // $drawing->setRotation(25);
        $drawing->getShadow()->setVisible(true);
        $drawing->getShadow()->setDirection(45);
        $drawing->setWorksheet($spreadsheet->getActiveSheet());
//insertando imagen 911
        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawing->setName('911');
        $drawing->setDescription('911');
        $drawing->setPath('911.png'); 
        $drawing->setCoordinates('AL1');
        $drawing->setHeight(90);
        $drawing->getShadow()->setVisible(true);
        $drawing->getShadow()->setDirection(45);
        $drawing->setWorksheet($spreadsheet->getActiveSheet());



$styleArray = [
    'font' => [
        'bold' => true,
        'size' => '7',
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
    ],
    'borders' => [
        'top' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
        'bottom' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
        'left' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
        'right' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
    'fill' => [
        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
        'rotation' => 90,
        'startColor' => [
            'argb' => '0070C0',
        ],
    ],
];



//ASIGNACION DE CABECERA DE COLUMNAS
$hojaActiva->setCellValue('A5','CODIGO EMPLEADO');
$hojaActiva->getStyle('A5')->applyFromArray($styleArray);//ASIGNA ALINEACION DEL TEXTO DE LA CELDA

$hojaActiva->setCellValue('B5','CODIGO DE PUESTOS');
$hojaActiva->getStyle('B5')->applyFromArray($styleArray);

$hojaActiva->setCellValue('C5','NOMBRE EMPLEADO');
$hojaActiva->getStyle('C5')->applyFromArray($styleArray);

$hojaActiva->setCellValue('D5','No DE IDENTIDAD');
$hojaActiva->getStyle('D5')->applyFromArray($styleArray);

$hojaActiva->setCellValue('E5','PUESTO');
$hojaActiva->getStyle('E5')->applyFromArray($styleArray);

$hojaActiva->setCellValue('F5','FECHA DE INGRESO');
$hojaActiva->getStyle('F5')->applyFromArray($styleArray);

$hojaActiva->setCellValue('G5','SEXO');
$hojaActiva->getStyle('G5')->applyFromArray($styleArray);

$hojaActiva->setCellValue('H5','TIPO DE PLAZA');
$hojaActiva->getStyle('H5')->applyFromArray($styleArray);

$hojaActiva->setCellValue('I5','SALARIO NOMINAL');
$hojaActiva->getStyle('I5')->applyFromArray($styleArray);

$hojaActiva->setCellValue('J5','SALARIO ANUAL');
$hojaActiva->getStyle('J5')->applyFromArray($styleArray);

$hojaActiva->setCellValue('K5','DIAS TRABAJADOS');
$hojaActiva->getStyle('K5')->applyFromArray($styleArray);

$hojaActiva->setCellValue('L5','Dias que debio trabajar');
$hojaActiva->getStyle('L5')->applyFromArray($styleArray);

$hojaActiva->setCellValue('M5','SALARIO DIARIO');
$hojaActiva->getStyle('M5')->applyFromArray($styleArray);

$hojaActiva->setCellValue('N5','SALARIO DEVENGADO');
$hojaActiva->getStyle('N5')->applyFromArray($styleArray);

$hojaActiva->setCellValue('O5','HORAS EXTRAS DIURNAS');
$hojaActiva->getStyle('O5')->applyFromArray($styleArray);

$hojaActiva->setCellValue('P5','HORAS EXTRAS NOCTURNAS');
$hojaActiva->getStyle('P5')->applyFromArray($styleArray);

$hojaActiva->setCellValue('Q5','TOTAL HORAS EXTRAS');
$hojaActiva->getStyle('Q5')->applyFromArray($styleArray);

$hojaActiva->setCellValue('R5','Deduccion por Incapacidad (Dias)');
$hojaActiva->getStyle('R5')->applyFromArray($styleArray);

$hojaActiva->setCellValue('S5','Total deducido por incapacidad');
$hojaActiva->getStyle('S5')->applyFromArray($styleArray);

$hojaActiva->setCellValue('T5','Deduccion por Inasistencia (Dias)');
$hojaActiva->getStyle('T5')->applyFromArray($styleArray);

$hojaActiva->setCellValue('U5','Total  Inasistencia');
$hojaActiva->getStyle('U5')->applyFromArray($styleArray);

$hojaActiva->setCellValue('V5','ISR/2019 ANUAL ');
$hojaActiva->getStyle('V5')->applyFromArray($styleArray);

$hojaActiva->setCellValue('W5','ISR  MENSUAL');
$hojaActiva->getStyle('W5')->applyFromArray($styleArray);

$hojaActiva->setCellValue('X5','IVM');
$hojaActiva->getStyle('X5')->applyFromArray($styleArray);

$hojaActiva->setCellValue('Y5','EM');
$hojaActiva->getStyle('Y5')->applyFromArray($styleArray);

$hojaActiva->setCellValue('Z5','IHSS');
$hojaActiva->getStyle('Z5')->applyFromArray($styleArray);

$hojaActiva->setCellValue('AA5','TOTAL RECIBIDO EN EL  AÑO');
$hojaActiva->getStyle('AA5')->applyFromArray($styleArray);

$hojaActiva->setCellValue('AB5','IMP. VECINAL 2022');
$hojaActiva->getStyle('AB5')->applyFromArray($styleArray);

$hojaActiva->setCellValue('AC5','IMP. VECINAL 2022');
$hojaActiva->getStyle('AC5')->applyFromArray($styleArray);

$hojaActiva->setCellValue('AD5','COSTO DE EMISION SOLVENCIA MUNICIPAL');
$hojaActiva->getStyle('AD5')->applyFromArray($styleArray);

$hojaActiva->setCellValue('AE5',' OPTICA INNOVA VISION ');
$hojaActiva->getStyle('AE5')->applyFromArray($styleArray);

$hojaActiva->setCellValue('AF5','APORTACION VOLUNTARIA ');
$hojaActiva->getStyle('AF5')->applyFromArray($styleArray);

$hojaActiva->setCellValue('AG5','COOPERATIVA ELGA ');
$hojaActiva->getStyle('AG5')->applyFromArray($styleArray);

$hojaActiva->setCellValue('AH5',' COOPERATIVA SAGRADA FAMILIA');
$hojaActiva->getStyle('AH5')->applyFromArray($styleArray);

$hojaActiva->setCellValue('AI5','BANCO DAVIVIENDA');
$hojaActiva->getStyle('AI5')->applyFromArray($styleArray);

$hojaActiva->setCellValue('AJ5','EMBARGOS');
$hojaActiva->getStyle('AJ5')->applyFromArray($styleArray);

$hojaActiva->setCellValue('AK5','TOTAL DEUCCIONES');
$hojaActiva->getStyle('AK5')->applyFromArray($styleArray);

$hojaActiva->setCellValue('AL5','SALARIO NETO');
$hojaActiva->getStyle('AL5')->applyFromArray($styleArray);

// $hojaActiva->setCellValue('AM5','');
// $hojaActiva->getStyle('AM5')->applyFromArray($styleArray);


//AJUSTANDO TEXTO DE CABECERAS DE COLUMNA
$hojaActiva->getStyle('A5:AN5')->getAlignment()->setWrapText(true);


$styleArrayIzquierda = [
    'font' => [
        'bold' => false,
        'size' => '10'
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
    ],
    'borders' => [
        'top' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
        'bottom' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
        'left' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
        'right' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
];

$styleArrayCentro = [
    'font' => [
        'bold' => false,
        'size' => '10'
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
    ],
    'borders' => [
        'top' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
        'bottom' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
        'left' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
        'right' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
];

$styleArrayDerecha = [
    'font' => [
        'bold' => false,
        'size' => '10'
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
    ],
    'borders' => [
        'top' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
        'bottom' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
        'left' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
        'right' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
];

$styleArrayUnidad = [
    'font' => [
        'bold' => true,
        'size' => '10',
        'color' => array('rgb' => 'FFFFFF')
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
    ],
    'borders' => [
        'top' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
        'bottom' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
        'left' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
        'right' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
    'fill' => [
        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
        'rotation' => 90,
        'startColor' => [
            'argb' => '9c9c9c',
        ],
    ],
];

$styleArraySUBTOTAL = [
    'font' => [
        'bold' => true,
        'size' => '7',
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
    ],
    'borders' => [
        'top' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
        'bottom' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
        'left' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
        'right' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
];

$styleArraySUBTOTALN = [
    'font' => [
        'bold' => true,
        'size' => '10',
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
    ],
    'borders' => [
        'top' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
        'bottom' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
        'left' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
        'right' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
];

$styleArraySUBTOTALNC = [
    'font' => [
        'bold' => true,
        'size' => '10',
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
    ],
    'borders' => [
        'top' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
        'bottom' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
        'left' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
        'right' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
];

$styleArrayCentroFIRMAS = [
    'font' => [
        'bold' => true,
        'size' => '10'
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
    ],
    'borders' => [
        'bottom' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
        ],
    ],
];

$styleArrayCentroFIRMASN = [
    'font' => [
        'bold' => true,
        'size' => '11'
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
    ],
];

$styleArrayBorders = [
    'borders' => [
        'top' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
        'bottom' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
        'right' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
];

// $styleArrayBorders = array(
//     'borders' => array(
//         'outline' => array(
//             'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
//             'color' => array('argb' => 'FFFF0000'),
//         ),
//     ),
// );

$cntU = 0;
$cntS = 0;
$cnt = 6;

while($fila=$resultadoUnidad->fetch_assoc()){
    $cntU++;
    $unidadReferente = $fila['unidad'];
    
    // if($cnt != 6){
    //     $hojaActiva->setCellValue('C'.($cnt),"SUB-TOTAL");
    //     $hojaActiva->getStyle('C'.($cnt))->applyFromArray($styleArraySUBTOTAL);
    //     $hojaActiva->getRowDimension($cnt)->setRowHeight(24);
    //     $cnt++;
    // }

    // if($cnt == 6){
        $hojaActiva->setCellValue('C'.($cnt),$unidadReferente);
        $hojaActiva->getStyle('C'.($cnt))->applyFromArray($styleArrayUnidad);
        $hojaActiva->getRowDimension($cnt)->setRowHeight(24);
        $hojaActiva->getStyle('A'.$cnt.':AL'.$cnt)->getAlignment()->setWrapText(true);
        $hojaActiva->getStyle('A'.$cnt.':AL'.$cnt)->applyFromArray($styleArrayBorders);
        $cnt++;
    // }
    
    // if($row=$resultado->fetch_assoc()){
    $resultado=$conexion->query($query);
    while($row=$resultado->fetch_assoc()){
       
        $unidad = $row['UNIDAD'];

        if($unidad == $unidadReferente){
           
            $codigo = $row['CODIGO_EMPLEADO'];
            $codigo_puesto = $row['CODIGO_PUESTO'];
            $nombre = $row['NOMBRE_EMPLEADO'];
            $identidad = $row['NO_IDENTIDAD'];
            $puesto = $row['PUESTO'];
            $fechaIngreso = $row['FECHA_INGRESO'];
            $sexo = $row['SEXO'];
            $nominal = $row['salario_nominal'];
            // const FORMAT_NUMBER_00 = '0.00';
            $salario_anual = $row['salario_anual'];
            $dias_trabajados = $row['dias_trabajados'];
            $dias_que_debio_trabajar = $row['dias_que_debio_trabajar'];
            $salario_diario = $row['salario_diario'];
            $salario_devengado = $row['salario_devengado'];
            $deduccion_por_incapacidad_dia = $row['deduccion_por_incapacidad_dia'];
            $total_deducido_incapacidad = $row['total_deducido_incapacidad'];
            $deduccion_por_inasistencia_dia = $row['deduccion_por_inasistencia_dia'];
            $inasistencias = $row['inasistencias'];
            $ISR_anual = $row['ISR_anual'];
            $ISR_mensual = $row['ISR_mensual']; 
            $IVM = $row['IVM'];
            $EM = $row['EM'];
            $IHSS = $row['IHSS'];
            $total_recibido_anio = $row['total_recibido_anio'];
            // $impuesto_vecinal = $row['impuesto_vecinal'];
            // $costo_emicion_solvencia = $row['costo_emicion_solvencia'];
            $optica_INNOVA = $row['optica_INNOVA'];
            $aportacion_voluntaria = $row['aportacion_voluntaria'];
            $cooperativa_ELGA = $row['cooperativa_ELGA'];
            $cooperativa_sagrada_familia = $row['cooperativa_sagrada_familia'];
            $banco_davivienda = $row['banco_davivienda'];
            $embargos = $row['embargos'];
            $total_deducciones = $row['total_deducciones'];
            $tiempo_tardio = $row['tiempo_tardio'];
            $salario_neto = $row['salario_neto']; 
            
            $hojaActiva->setCellValue('A'.$cnt,$codigo);
            $hojaActiva->getStyle('A'.$cnt)->applyFromArray($styleArrayCentro);
        
            $hojaActiva->setCellValue('B'.$cnt,$codigo_puesto);
            $hojaActiva->getStyle('B'.$cnt)->applyFromArray($styleArrayCentro);
        
            $hojaActiva->setCellValue('C'.$cnt,$nombre);
            $hojaActiva->getStyle('C'.$cnt)->applyFromArray($styleArrayIzquierda);
        
            $hojaActiva->setCellValue('D'.$cnt,$identidad);
            $hojaActiva->getStyle('D'.$cnt)->applyFromArray($styleArrayCentro);
        
            $hojaActiva->setCellValue('E'.$cnt,$puesto);
            $hojaActiva->getStyle('E'.$cnt)->applyFromArray($styleArrayIzquierda);
        
            $hojaActiva->setCellValue('F'.$cnt,$fechaIngreso);
            $hojaActiva->getStyle('F'.$cnt)->applyFromArray($styleArrayCentro);
        
            $hojaActiva->setCellValue('G'.$cnt,$sexo);
            $hojaActiva->getStyle('G'.$cnt)->applyFromArray($styleArrayCentro);
        
            $hojaActiva->setCellValue('H'.$cnt,"PERMANENTE");
            $hojaActiva->getStyle('H'.$cnt)->applyFromArray($styleArrayCentro);
        
            $hojaActiva->setCellValue('I'.$cnt, $nominal);
            $hojaActiva->getStyle('I'.$cnt)->applyFromArray($styleArrayDerecha);

            // $hojaActiva->getCell('I'.$cnt)->setValueExplicit($nominal,\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_NUMERIC);
            // $hojaActiva->getStyle('I'.$cnt)->applyFromArray($styleArrayDerecha);
        
            $hojaActiva->setCellValue('J'.$cnt,$salario_anual);
            $hojaActiva->getStyle('J'.$cnt)->applyFromArray($styleArrayDerecha);
            
            $hojaActiva->setCellValue('K'.$cnt,$dias_trabajados);
            $hojaActiva->getStyle('K'.$cnt)->applyFromArray($styleArrayCentro);
        
            $hojaActiva->setCellValue('L'.$cnt,"30");
            $hojaActiva->getStyle('L'.$cnt)->applyFromArray($styleArrayCentro);
        
            $hojaActiva->setCellValue('M'.$cnt,$salario_diario);
            $hojaActiva->getStyle('M'.$cnt)->applyFromArray($styleArrayDerecha);
        
            $hojaActiva->setCellValue('N'.$cnt,$salario_devengado);
            $hojaActiva->getStyle('N'.$cnt)->applyFromArray($styleArrayDerecha);
        
            $hojaActiva->setCellValue('O'.$cnt,"0.00");
            $hojaActiva->getStyle('O'.$cnt)->applyFromArray($styleArrayDerecha);
        
            $hojaActiva->setCellValue('P'.$cnt,"0.00");
            $hojaActiva->getStyle('P'.$cnt)->applyFromArray($styleArrayDerecha);
        
            $hojaActiva->setCellValue('Q'.$cnt,"0.00");
            $hojaActiva->getStyle('Q'.$cnt)->applyFromArray($styleArrayDerecha);
        
            $hojaActiva->setCellValue('R'.$cnt,$deduccion_por_incapacidad_dia);
            $hojaActiva->getStyle('R'.$cnt)->applyFromArray($styleArrayDerecha);
        
            $hojaActiva->setCellValue('S'.$cnt,$total_deducido_incapacidad);
            $hojaActiva->getStyle('S'.$cnt)->applyFromArray($styleArrayDerecha);
        
            $hojaActiva->setCellValue('T'.$cnt,$deduccion_por_inasistencia_dia);
            $hojaActiva->getStyle('T'.$cnt)->applyFromArray($styleArrayDerecha);
        
            $hojaActiva->setCellValue('U'.$cnt,$inasistencias);
            $hojaActiva->getStyle('U'.$cnt)->applyFromArray($styleArrayDerecha);
        
            $hojaActiva->setCellValue('V'.$cnt,$ISR_anual);
            $hojaActiva->getStyle('V'.$cnt)->applyFromArray($styleArrayDerecha);
        
            $hojaActiva->setCellValue('W'.$cnt,$ISR_mensual);
            $hojaActiva->getStyle('W'.$cnt)->applyFromArray($styleArrayDerecha);
        
            $hojaActiva->setCellValue('X'.$cnt,$IVM);
            $hojaActiva->getStyle('X'.$cnt)->applyFromArray($styleArrayDerecha);
        
            $hojaActiva->setCellValue('Y'.$cnt,$EM);
            $hojaActiva->getStyle('Y'.$cnt)->applyFromArray($styleArrayDerecha);
        
            $hojaActiva->setCellValue('Z'.$cnt,$IHSS);
            $hojaActiva->getStyle('Z'.$cnt)->applyFromArray($styleArrayDerecha);
        
            $hojaActiva->setCellValue('AA'.$cnt,$total_recibido_anio);
            $hojaActiva->getStyle('AA'.$cnt)->applyFromArray($styleArrayDerecha);
        
            $hojaActiva->setCellValue('AB'.$cnt,"0.00");
            $hojaActiva->getStyle('AB'.$cnt)->applyFromArray($styleArrayDerecha);
        
            $hojaActiva->setCellValue('AC'.$cnt,"0.00");
            $hojaActiva->getStyle('AC'.$cnt)->applyFromArray($styleArrayDerecha);
        
            $hojaActiva->setCellValue('AD'.$cnt,"0.00");
            $hojaActiva->getStyle('AD'.$cnt)->applyFromArray($styleArrayDerecha);
        
            $hojaActiva->setCellValue('AE'.$cnt,$optica_INNOVA);
            $hojaActiva->getStyle('AE'.$cnt)->applyFromArray($styleArrayDerecha);
        
            $hojaActiva->setCellValue('AF'.$cnt,$aportacion_voluntaria);
            $hojaActiva->getStyle('AF'.$cnt)->applyFromArray($styleArrayDerecha);
        
            $hojaActiva->setCellValue('AG'.$cnt,$cooperativa_ELGA);
            $hojaActiva->getStyle('AG'.$cnt)->applyFromArray($styleArrayDerecha);
        
            $hojaActiva->setCellValue('AH'.$cnt,$cooperativa_sagrada_familia);
            $hojaActiva->getStyle('AH'.$cnt)->applyFromArray($styleArrayDerecha);
        
            $hojaActiva->setCellValue('AI'.$cnt,$banco_davivienda);
            $hojaActiva->getStyle('AI'.$cnt)->applyFromArray($styleArrayDerecha);
        
            $hojaActiva->setCellValue('AJ'.$cnt,$embargos);
            $hojaActiva->getStyle('AJ'.$cnt)->applyFromArray($styleArrayDerecha);
        
            $hojaActiva->setCellValue('AK'.$cnt,$total_deducciones);
            $hojaActiva->getStyle('AK'.$cnt)->applyFromArray($styleArrayDerecha);
        
            $hojaActiva->setCellValue('AL'.$cnt,$salario_neto);
            $hojaActiva->getStyle('AL'.$cnt)->applyFromArray($styleArrayDerecha);
            
            $hojaActiva->getRowDimension($cnt)->setRowHeight(24);
            $hojaActiva->getStyle('A'.$cnt.':AL'.$cnt)->getAlignment()->setWrapText(true);
        
            $cnt++;
            $cntS++;

        }
        
    } 
    // } else{
        // mysqli_field_seek($resultado,0);
        // $row = field_seek(0);
        // if(!($row=$resultado->fetch_assoc())){
        //     mysqli_field_seek($row,0);
        // }
    // }

        //AGREGA LA PALABRA SUB-TOTAL
        $hojaActiva->setCellValue('C'.($cnt),"SUB-TOTAL");
        $hojaActiva->getStyle('C'.($cnt))->applyFromArray($styleArraySUBTOTAL);
        $hojaActiva->getRowDimension($cnt)->setRowHeight(24);
        
        //HACER CALCULOS DE LA FILA SUBTOTAL
        $celdaComienzo = $cnt - $cntS;
        $celdaFinal = $cnt - 1;

        //SUMA SALARIO NOMINAL
        $spreadsheet->getActiveSheet()->setCellValue('I'.$cnt,'=SUM(I'.$celdaComienzo.':I'.$celdaFinal.')');
        $hojaActiva->getStyle('I'.($cnt))->applyFromArray($styleArraySUBTOTALN);
        $hojaActiva->getStyle('A'.$cnt.':AL'.$cnt)->applyFromArray($styleArrayBorders);

        //SUMA SALARIO NOMINAL
        $spreadsheet->getActiveSheet()->setCellValue('J'.$cnt,'=SUM(J'.$celdaComienzo.':J'.$celdaFinal.')');
        $hojaActiva->getStyle('J'.($cnt))->applyFromArray($styleArraySUBTOTALN);
        
        //SUMA DIAS QUE DEBIO TRABAJAR
        $spreadsheet->getActiveSheet()->setCellValue('L'.$cnt,'=SUM(L'.$celdaComienzo.':L'.$celdaFinal.')');
        $hojaActiva->getStyle('L'.($cnt))->applyFromArray($styleArraySUBTOTALNC);
        
        //SUMA SALARIO DIARIO
        $spreadsheet->getActiveSheet()->setCellValue('M'.$cnt,'=SUM(M'.$celdaComienzo.':M'.$celdaFinal.')');
        $hojaActiva->getStyle('M'.($cnt))->applyFromArray($styleArraySUBTOTALN);
        
        //SUMA SALARIO DEVENGADO
        $spreadsheet->getActiveSheet()->setCellValue('N'.$cnt,'=SUM(N'.$celdaComienzo.':N'.$celdaFinal.')');
        $hojaActiva->getStyle('N'.($cnt))->applyFromArray($styleArraySUBTOTALN);
        
        //SUMA DEDUCCION POR INCAPACIDAD
        $spreadsheet->getActiveSheet()->setCellValue('R'.$cnt,'=SUM(R'.$celdaComienzo.':R'.$celdaFinal.')');
        $hojaActiva->getStyle('R'.($cnt))->applyFromArray($styleArraySUBTOTALN);
        
        //SUMA TOTAL DEDUCCION POR INCAPACIDAD
        $spreadsheet->getActiveSheet()->setCellValue('S'.$cnt,'=SUM(S'.$celdaComienzo.':S'.$celdaFinal.')');
        $hojaActiva->getStyle('S'.($cnt))->applyFromArray($styleArraySUBTOTALN);
        
        //SUMA DEDUCCION POR INASISTENCIA
        $spreadsheet->getActiveSheet()->setCellValue('T'.$cnt,'=SUM(T'.$celdaComienzo.':T'.$celdaFinal.')');
        $hojaActiva->getStyle('T'.($cnt))->applyFromArray($styleArraySUBTOTALN);
        
        //SUMA TOTAL DEDUCCION POR INASISTENCIA
        $spreadsheet->getActiveSheet()->setCellValue('U'.$cnt,'=SUM(U'.$celdaComienzo.':U'.$celdaFinal.')');
        $hojaActiva->getStyle('U'.($cnt))->applyFromArray($styleArraySUBTOTALN);
        
        //SUMA ISR ANUAL
        $spreadsheet->getActiveSheet()->setCellValue('V'.$cnt,'=SUM(V'.$celdaComienzo.':V'.$celdaFinal.')');
        $hojaActiva->getStyle('V'.($cnt))->applyFromArray($styleArraySUBTOTALN);
         
        //SUMA ISR MENSUAL
        $spreadsheet->getActiveSheet()->setCellValue('V'.$cnt,'=SUM(V'.$celdaComienzo.':V'.$celdaFinal.')');
        $hojaActiva->getStyle('V'.($cnt))->applyFromArray($styleArraySUBTOTALN);
        
        //SUMA IVM
        $spreadsheet->getActiveSheet()->setCellValue('X'.$cnt,'=SUM(X'.$celdaComienzo.':X'.$celdaFinal.')');
        $hojaActiva->getStyle('X'.($cnt))->applyFromArray($styleArraySUBTOTALN);
         
        //SUMA EM
        $spreadsheet->getActiveSheet()->setCellValue('Y'.$cnt,'=SUM(Y'.$celdaComienzo.':Y'.$celdaFinal.')');
        $hojaActiva->getStyle('Y'.($cnt))->applyFromArray($styleArraySUBTOTALN);
         
        //SUMA IHSS
        $spreadsheet->getActiveSheet()->setCellValue('Z'.$cnt,'=SUM(Z'.$celdaComienzo.':Z'.$celdaFinal.')');
        $hojaActiva->getStyle('Z'.($cnt))->applyFromArray($styleArraySUBTOTALN);
         
        //SUMA TOTAL RECIBIDO EN EL AÑO
        $spreadsheet->getActiveSheet()->setCellValue('AA'.$cnt,'=SUM(AA'.$celdaComienzo.':AA'.$celdaFinal.')');
        $hojaActiva->getStyle('AA'.($cnt))->applyFromArray($styleArraySUBTOTALN);
         
        //SUMA IMPUESTO VECINAL
        $spreadsheet->getActiveSheet()->setCellValue('AB'.$cnt,'=SUM(AB'.$celdaComienzo.':AB'.$celdaFinal.')');
        $hojaActiva->getStyle('AB'.($cnt))->applyFromArray($styleArraySUBTOTALN);
         
        //SUMA IMPUESTO VECINAL
        $spreadsheet->getActiveSheet()->setCellValue('AC'.$cnt,'=SUM(AC'.$celdaComienzo.':AC'.$celdaFinal.')');
        $hojaActiva->getStyle('AC'.($cnt))->applyFromArray($styleArraySUBTOTALN);
         
        //SUMA COSTO SOLVENCIA MUNICIPAL
        $spreadsheet->getActiveSheet()->setCellValue('AD'.$cnt,'=SUM(AD'.$celdaComienzo.':AD'.$celdaFinal.')');
        $hojaActiva->getStyle('AD'.($cnt))->applyFromArray($styleArraySUBTOTALN);
        
         //SUMA OPTICA
        $spreadsheet->getActiveSheet()->setCellValue('AE'.$cnt,'=SUM(AE'.$celdaComienzo.':AE'.$celdaFinal.')');
        $hojaActiva->getStyle('AE'.($cnt))->applyFromArray($styleArraySUBTOTALN);
         
        //SUMA APORTACION VOLUNTARIA
        $spreadsheet->getActiveSheet()->setCellValue('AF'.$cnt,'=SUM(AF'.$celdaComienzo.':AF'.$celdaFinal.')');
        $hojaActiva->getStyle('AF'.($cnt))->applyFromArray($styleArraySUBTOTALN);
         
        //SUMA COOPERATIVA ELGA
        $spreadsheet->getActiveSheet()->setCellValue('AG'.$cnt,'=SUM(AG'.$celdaComienzo.':AG'.$celdaFinal.')');
        $hojaActiva->getStyle('AG'.($cnt))->applyFromArray($styleArraySUBTOTALN);
         
        //SUMA COOPERATIVA SAGRADA
        $spreadsheet->getActiveSheet()->setCellValue('AH'.$cnt,'=SUM(AH'.$celdaComienzo.':AH'.$celdaFinal.')');
        $hojaActiva->getStyle('AH'.($cnt))->applyFromArray($styleArraySUBTOTALN);
         
        //SUMA BANCO DAVIVIENDA
        $spreadsheet->getActiveSheet()->setCellValue('AI'.$cnt,'=SUM(AI'.$celdaComienzo.':AI'.$celdaFinal.')');
        $hojaActiva->getStyle('AI'.($cnt))->applyFromArray($styleArraySUBTOTALN);
         
        //SUMA EMBARGOS
        $spreadsheet->getActiveSheet()->setCellValue('AJ'.$cnt,'=SUM(AJ'.$celdaComienzo.':AJ'.$celdaFinal.')');
        $hojaActiva->getStyle('AJ'.($cnt))->applyFromArray($styleArraySUBTOTALN);
         
        //SUMA TOTAL DEDUCCIONES
        $spreadsheet->getActiveSheet()->setCellValue('AK'.$cnt,'=SUM(AK'.$celdaComienzo.':AK'.$celdaFinal.')');
        $hojaActiva->getStyle('AK'.($cnt))->applyFromArray($styleArraySUBTOTALN);
         
        //SUMA SALARIO NETO
        $spreadsheet->getActiveSheet()->setCellValue('AL'.$cnt,'=SUM(AL'.$celdaComienzo.':AL'.$celdaFinal.')');
        $hojaActiva->getStyle('AL'.($cnt))->applyFromArray($styleArraySUBTOTALN);
        
        $cnt++;
        $cntS = 0;

    if($cntU == 46){
        $celdin = $cnt + 6;
        $hojaActiva->setCellValue('C'.$celdin,"");
        $hojaActiva->getStyle('C'.$celdin)->applyFromArray($styleArrayCentroFIRMAS);
        $hojaActiva->setCellValue('E'.$celdin,"");
        $hojaActiva->getStyle('E'.$celdin)->applyFromArray($styleArrayCentroFIRMAS);
        $celdin++;
        $hojaActiva->setCellValue('C'.$celdin,"NOMBRE JEFE NOMINAS");
        $hojaActiva->getStyle('C'.$celdin)->applyFromArray($styleArrayCentroFIRMASN);
        $hojaActiva->setCellValue('E'.$celdin,"NOMBRE JEFE RECURSOS HUMANOS");
        $hojaActiva->getStyle('E'.$celdin)->applyFromArray($styleArrayCentroFIRMASN);
        $celdin++;
        $hojaActiva->setCellValue('C'.$celdin,"PUESTO JEFE NOMINAS");
        $hojaActiva->getStyle('C'.$celdin)->applyFromArray($styleArrayCentroFIRMASN);
        $hojaActiva->setCellValue('E'.$celdin,"PUESTO JEFE RECURSOS HUMANOS");
        $hojaActiva->getStyle('E'.$celdin)->applyFromArray($styleArrayCentroFIRMASN);
    }
    
}


// $hojaActiva->setCellValue('A1','Codigos');
// $hojaActiva->setCellValue('B1','Sucursales');
// $hojaActiva->setCellValue('A2',$codigo);
// $hojaActiva->setCellValue('B2','kennedy');

// $conditional = new \PhpOffice\PhpSpreadsheet\Style\Conditional();
// $conditional->setConditionType(\PhpOffice\PhpSpreadsheet\Style\Conditional::CONDITION_CELLIS);
// $conditional->setOperatorType(\PhpOffice\PhpSpreadsheet\Style\Conditional::OPERATOR_GREATERTHAN);
// $conditional->addCondition(80);
// $conditional->getStyle()->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_DARKGREEN);
// $conditional->getStyle()->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
// $conditional->getStyle()->getFill()->getStartColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_GREEN);

// $conditionalStyles = $spreadsheet->getActiveSheet()->getStyle('A1:A1')->getConditionalStyles();
// $conditionalStyles[] = $conditional;

// $spreadsheet->getActiveSheet()->getStyle('A1:A1')->setConditionalStyles($conditionalStyles);




header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="PLANILLA.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');

// $writer = new Xlsx($spreadsheet);
// $writer->save('Mi excel11.xlsx');


?>