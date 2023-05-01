<?php
    require_once("../conexion/connect.php");
    $query="SELECT
    empleados911.CODIGO_EMPLEADO,
    empleados911.CODIGO_PUESTO,
    empleados911.SEXO,    
    empleados911.NOMBRE_EMPLEADO,
    empleados911.NO_IDENTIDAD,
    empleados911.PUESTO,
    empleados911.FECHA_INGRESO,
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
    tbl_planilla_oficial.salario_neto
    FROM
    tbl_planilla_oficial
    INNER JOIN empleados911 ON tbl_planilla_oficial.codigo_empleado = empleados911.CODIGO_EMPLEADO
    WHERE  (empleados911.ESTADO = 1 AND empleados911.REGIONAL=1)";
    $resultado=$conexion->query($query);
  

?> 



<div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h4 class="text-themecolor">SISTEMA DE PLANILLAS SNE</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <!-- <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard 1</li>  -->
                        </ol>
                        <!-- <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button> -->
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Vista de planillas del Sistema Nacional de Emergencia 9-1-1</h4>
                        <button type="button"  class="btn btn-dark" onclick="imprimirExcel();">Imprimir planilla en excel</button>
                        <div class="table-responsive m-t-40">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th> CODIGO <br>EMPLEADO</th>
                                        <th>CODIGO <br>PUESTO</th>
                                        <th>NOMBRE EMPLEADO</th>
                                        <th>No. DE IDENTIDAD</th>
                                        <th>PUESTO</th>
                                        <th>FECHA <br>DE INGRESO</th>
                                        <th>SEXO</th>
                                        <th>SALARIO<br> NOMINAL</th>
                                        <th>SALARIO<br> ANUAL</th>
                                        <th>DIAS <br>TRABAJADOS</th>
                                        <th>Dias que<br> debio trabajar</th>
                                        <th>SALARIO<br> DIARIO</th>
                                        <th>SALARIO<br> DEVENGADO</th>
                                        <th>HORAS EXTRAS <br>DIURNAS</th>
                                        <th>HORAS EXTRAS<br> NOCTURNAS</th>
                                        <th>TOTAL <br>HORAS EXTRAS</th>
                                        <th>Deduccion <br>por Incapacidad (Dias)</th>
                                        <th>Total deducido<br> por incapacidad</th>
                                        <th>Deduccion <br> por Inasistencia (Dias)</th>
                                        <th>Total  <br>Inasistencia</th>
                                        <th>ISR/2019 ANUAL </th>
                                        <th>ISR  MENSUAL</th>
                                        <th>IVM</th>
                                        <th>EM</th>
                                        <th>IHSS</th>
                                        <th>TOTAL RECIBIDO  <br>EN EL  AÑO</th>
                                        <th>IMP. VECINAL 2021</th>
                                        <th>DESCUENTO DE 10%<br> IMPUESTO VECINAL</th>
                                        <th>COSTO DE EMISION <br>SOLVENCIA MUNICIPAL</th>
                                        <th> OPTICA <br>INNOVA VISION</th>
                                        <th>APORTACION <br>VOLUNTARIA</th>
                                        <th>COOPERATIVA ELGA </th>
                                        <th>AJUSTE  PENDIENTE <br>DE PAGO DE EMBARGO</th>
                                        <th> COOPERATIVA <br>SAGRADA FAMILIA </th>
                                        <th>BANCO <br>DAVIVIENDA </th>
                                        <th>EMBARGOS</th>
                                        <th>TOTAL<br> DEUCCIONES</th>
                                        <th>TIEMPO<br> TARDIO </th>
                                        <th>SALARIO NETO </th>
                                    </tr>
                                </thead>
                                <!-- <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </tfoot> -->
                                <tbody>
                                <?php while($row=$resultado->fetch_assoc())
                                    {?>

                                                 <tr>
                                        <td><?php echo $row['CODIGO_EMPLEADO'];?></td>
                                        <td><?php echo $row['CODIGO_PUESTO'];?></td>
                                        <td><?php echo $row['NOMBRE_EMPLEADO'];?></td>
                                        <td><?php echo $row['NO_IDENTIDAD'];?></td>
                                        <td><?php echo $row['PUESTO'];?></td>
                                        <td><?php echo $row['FECHA_INGRESO'];?></td>
                                        <td><?php echo $row['SEXO'];?></td>
                                        <td><?php echo $row['salario_nominal'];?></td>
                                        <td><?php echo $row['salario_anual'];?></td>
                                        <td><?php echo $row['dias_trabajados'];?></td>
                                        <td><?php echo $row['dias_que_debio_trabajar'];?></td>
                                        <td><?php echo $row['salario_diario'];?></td>
                                        <td><?php echo $row['salario_devengado'];?></td>
                                        <td><?php echo $row['horas_extras_diurnas'];?></td>
                                        <td><?php echo $row['horas_extras_nocturnas'];?></td>
                                        <td><?php echo $row['total_horas_extras'];?></td>
                                        <td><?php echo $row['deduccion_por_incapacidad_dia'];?></td>
                                        <td><?php echo $row['total_deducido_incapacidad'];?></td>
                                        <td><?php echo $row['deduccion_por_inasistencia_dia'];?></td>
                                        <td><?php echo $row['inasistencias'];?></td>
                                        <td><?php echo $row['ISR_anual'];?></td>
                                        <td><?php echo $row['ISR_mensual'];?></td> 
                                        <td><?php echo $row['IVM'];?></td>
                                        <td><?php echo $row['EM'];?></td>
                                        <td><?php echo $row['IHSS'];?></td>
                                        <td><?php echo $row['total_recibido_anio'];?></td>
                                        <td><?php echo $row['impuesto_vecinal'];?></td>
                                        <td><?php echo $row['descuento_impuesto_vecinal'];?></td>
                                        <td><?php echo $row['costo_emicion_solvencia'];?></td>
                                        <td><?php echo $row['optica_INNOVA'];?></td>
                                        <td><?php echo $row['aportacion_voluntaria'];?></td>
                                        <td><?php echo $row['cooperativa_ELGA'];?></td>
                                        <td><?php echo $row['ajuste_pendiente_embargo'];?></td>
                                        <td><?php echo $row['cooperativa_sagrada_familia'];?></td>
                                        <td><?php echo $row['banco_davivienda'];?></td>
                                        <td><?php echo $row['embargos'];?></td>
                                        <td><?php echo $row['total_deducciones'];?></td>
                                        <td><?php echo $row['tiempo_tardio'];?></td>
                                        <td><?php echo $row['salario_neto'];?></td>     
                                                 </tr>
                                       <?php 
                                      }                                        
                                       ?>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            
 
            <!-- .right-sidebar -->
            <div class="right-sidebar">
                <div class="slimscrollright">
                    <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                    <div class="r-panel-body">
                        <ul id="themecolors" class="m-t-20">
                            <li><b>With Light sidebar</b></li>
                            <li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme">1</a></li>
                            <li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>
                            <li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>
                            <li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme">4</a></li>
                            <li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a></li>
                            <li><a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme">6</a></li>
                            <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                            <li><a href="javascript:void(0)" data-skin="skin-default-dark" class="default-dark-theme working">7</a></li>
                            <li><a href="javascript:void(0)" data-skin="skin-green-dark" class="green-dark-theme">8</a></li>
                            <li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a></li>
                            <li><a href="javascript:void(0)" data-skin="skin-blue-dark" class="blue-dark-theme">10</a></li>
                            <li><a href="javascript:void(0)" data-skin="skin-purple-dark" class="purple-dark-theme">11</a></li>
                            <li><a href="javascript:void(0)" data-skin="skin-megna-dark" class="megna-dark-theme ">12</a></li>
                        </ul>
                        <!-- <ul class="m-t-20 chatonline">
                            <li><b>Chat option</b></li>
                            <li>
                                <a href="javascript:void(0)"><img src="../assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="../assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="../assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="../assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="../assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="../assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="../assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="../assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                            </li>
                        </ul> -->
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Right sidebar -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        
</div> 

<script type="text/javascript">
    function imprimirExcel(){
        // alert("hola");
        window.open("archivoExcel.php"); 
    }
</script>



