<?php
    require_once("../conexion/connect.php");
    $query="SELECT
	empleados911.CODIGO_EMPLEADO,
    empleados911.NO_IDENTIDAD,	
	empleados911.NOMBRE_EMPLEADO,  
	empleados911.UNIDAD, 
	empleados911.PUESTO,
    empleados911.ESTADO
    FROM
	empleados911
	WHERE empleados911.REGIONAL = 1 AND empleados911.ESTADO = 1;";
    $resultado=$conexion->query($query);

    $sqlModalIncapacidad = "SELECT * FROM tbl_formulas WHERE formula = 'Techo'";
    $resultModalIncapacidad = mysqli_query($conexion,$sqlModalIncapacidad);
    $rModalIncapacidad = mysqli_fetch_array($resultModalIncapacidad);
    $techoIncapacidad = $rModalIncapacidad['valorModificable'];


  

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
                            <li class="breadcrumb-item active">Dashboard 1</li> 
                        </ol>
                        <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>-->
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Registro de planillas del Sistema Nacional de Emergencia 9-1-1</h4>
                        <div class="table-responsive m-t-40">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Código empleado</th>
                                        <th>Identidad</th>
                                        <th>Nombre empleado</th>
                                        <th>Unidad</th>
                                        <th>Puesto</th>
                                        <th>Editar Sueldo</th>
                                        <th>Editar planilla</th>
                                        <th>Editar empleado</th>
                                        <th>Eliminar</th>
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
                                        <th>Editar planilla</th>
                                        <th>Editar empleado</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </tfoot> -->
                                <tbody>
                                <?php while($row=$resultado->fetch_assoc())
                                    {?>

                                                 <tr>
                            <td><?php echo $row['CODIGO_EMPLEADO'];?></td>
                            <td><?php echo $row['NO_IDENTIDAD'];?></td>
                            <td><?php echo $row['NOMBRE_EMPLEADO'];?></td>
                            <td><?php echo $row['UNIDAD'];?></td>
                            <td><?php echo $row['PUESTO'];?></td>
                            <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#sueldoModal" onclick="asignarIDSueldo(<?php echo $row['CODIGO_EMPLEADO'];?>);">Sueldo</button></td>
                            <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#calculoFormulas" onclick="infoEmpleado(<?php echo $row['CODIGO_EMPLEADO'];?>);">Editar</button></td>
                            <td><a href="index.php?pagina=editarEmpleado&id=<?php echo $row['CODIGO_EMPLEADO'];?>" style="color:white;"><button type="button" class="btn btn-info  passingID" >Editar</button></a></td>
                            <td><button type="button" class="btn btn-info  passingID" onclick="eliminarEmpleado(<?php echo $row['CODIGO_EMPLEADO'];?>);">Eliminar</button></td>      
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

         <!-- Modal Asignar Sueldo -->
         <div class="modal fade" id="sueldoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="color:black;">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" >Asignación de sueldo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmAsignarSueldo">
                    <input type="text" hidden readonly name="codigoEmpleado" id="codigoEmpleado">
                    <input type="text" hidden readonly name="accion" id="accion" value="2">
                    <input type="text" hidden readonly name="hoja" id="hoja" value="1">
                    <label>Ingrese el sueldo del empleado: </label><br>
                    <input type="number" name="sueldoAsignar" id="sueldoAsignar" value="0.00">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCancelar">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="guardarEnPlanilla();">Guardar en planilla</button>
            </div>
            </div>
        </div>
        </div>
         
</div> 

    
    <!-- sample modal content -->
        <!-- /.modal --> 
        <div style="overflow-y: scroll;"  id="calculoFormulas" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-xl" role="document" style="color:blacK;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">DATOS Y DEDUCCIONES</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                       
                        <form id="frmDeduccionPrincipal">
                            <div class="row">
                                <div class="col-md-12">
                                        <div class="card-body">
                                            <h4 class="card-title">Información del empleado</h4>
                                            <div id="education_fields"></div>
                                            <div class="row">
                                                <div class="col-sm-3 nopadding">
                                                    <div class="form-group">
                                                        <input type="text" id="userR" name="userR" value="<?php echo $_SESSION["UsuarioConectado"]; ?>" hidden readonly>
                                                        <label class="control-label">Nombre del empleado:</label>
                                                        <!-- <input type="text" class="form-control" id="" name="" value=""   readonly="readonly"> -->
                                                        <div id="nameEmpleado" name="nameEmpleado"></div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 nopadding">
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Codigo empleado:</label>
                                                        <input type="text" class="form-control" id="codiguinEmpleado" name="codiguinEmpleado" hidden readonly="readonly">
                                                        <div id="codigooEmpleado" name="codigooEmpleado"></div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 nopadding">
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Puesto del empleado:</label>
                                                        <!-- <input type="text" class="form-control" id="" name="" value=""   readonly="readonly"> -->
                                                        <div id="puestoEmpleado" name="puestoEmpleado"></div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 nopadding">
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Salario Nominal:</label>
                                                        <!-- <input type="text" class="form-control" id="" name="" value="" readonly="readonly"> -->
                                                        <div id="salarioNominal" name="salarioNominal"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <h4 class="card-title">Deducciones</h4>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label">Días trabajados:</label>
                                        <!-- <input type="text"  class="form-control is-valid" name="diasTrabajados" id="diasTrabajados"> -->
                                        <select name="diasTrabajados" id="diasTrabajados" class="form-control">
                                                <option value="30" selected>30</option>
                                            <?php for($i = 29; $i >= 1; $i--){ ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Días que debio trabajar:</label>
                                        <input type="text"  class="form-control" name="diasDTrabajar" id="diasDTrabajar" readonly="readonly">
                                    </div>
                                    
                                </div><hr style="height:1px;border:none;color:black;background-color:black;">
                            </div>
                            <div class="col-md-12">
                                <div  class="row">
                                    <div class="col-md-6">
                                        <label class="control-label">Deducción por inasistencias(días):</label>
                                        <input type="number"  class="form-control is-valid" name="deduccionInasistencia" id="deduccionInasistencia" placeholder="0" oninput="calculoInasistencia();">
                                        <input type="text" name="deduccionInasistenciaActual" id="deduccionInasistenciaActual" hidden readonly="readonly">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label class="control-label">Total inasistencia:</label>
                                                <input type="text"  class="form-control" name="totalInasistencia" id="totalInasistencia" placeholder="0.00" readonly="readonly">
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="control-label">Valor actual deducción: </label>
                                                <input type="text"  class="form-control" name="totalInasistenciaActual" id="totalInasistenciaActual" placeholder="0.00" readonly="readonly">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div> <hr style="height:1px;border:none;color:black;background-color:black;">
                            <div class="col-md-12">
                                <div  class="row">
                                    <div class="col-md-6">
                                        <label class="control-label"> Cálculo ISR anual:</label>
                                        <input type="number"  class="form-control is-valid" name="isrAnual" id="isrAnual" placeholder="0.00" oninput="calculoISR();">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label class="control-label">ISR mensual:</label>
                                                <input type="text"  class="form-control" name="isrMensual" id="isrMensual" readonly="readonly">
                                                <input type="text" name="isrMensualActual" id="isrMensualActual" hidden readonly="readonly">
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="control-label">ISR anual valor actual:</label>
                                                <input type="number"  class="form-control" name="isrAnualActual" id="isrAnualActual" placeholder="0.00" readonly="readonly" oninput="calculoISR();">
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                            </div> <hr style="height:1px;border:none;color:black;background-color:black;">
                            <div class="col-md-12">
                                <div  class="row">
                                    <div class="col-md-6">
                                        <input type="text" hidden readonly id="guardarDiasIncapacidad" name="guardarDiasIncapacidad">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label class="control-label">Deducción incapacidad(días):</label> 
                                                <button type="button" class="btn btn-rounded btn-block btn-light" placeholder="0.00" data-toggle="modal" data-target="#modalIncapacidades" >Editar</button>
                                                 
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="control-label">Valor actual deducción:</label> 
                                                <input type="text"  class="form-control" name="totalIncapacidadActual" id="totalIncapacidadActual" placeholder="0.00" readonly="readonly">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Total deducido por incapacidad:</label>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <input type="text"  class="form-control" name="totalIncapacidad" id="totalIncapacidad" placeholder="0.00" readonly="readonly">
                                            </div>
                                            <div class="col-sm-6">
                                                <button type="button" class="btn btn-rounded btn-block btn-dark" onclick="limpiarIncapacidad();">Limpiar Campo</button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div> <hr style="height:1px;border:none;color:black;background-color:black;">
                            <div class="col-md-12">
                                <div  class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label class="control-label">Tiempo tardio:</label> 
                                                <button type="button" class="btn btn-rounded btn-block btn-light" data-toggle="modal" data-target="#modalTiempoTardio">Editar</button>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="control-label">Valor actual deducción:</label>
                                                <input type="text"  class="form-control" name="totalTiempoTardioActual" id="totalTiempoTardioActual" placeholder="0.00" readonly="readonly">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Total deducido por tiempo tardío:</label>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <input type="text"  class="form-control" name="totalTiempoTardio" id="totalTiempoTardio" placeholder="0.00" readonly="readonly">
                                            </div>
                                            <div class="col-sm-6">
                                                <button type="button" class="btn btn-rounded btn-block btn-dark" onclick="limpiarTiempoTardio();">Limpiar Campo</button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div> <hr style="height:1px;border:none;color:black;background-color:black;">
                            <div class="col-md-12">
                                <div  class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label class="control-label">Embargos:</label>
                                                    <input type="number"  class="form-control is-valid" name="embargos" id="embargos" placeholder="0.00" oninput="embargoYaportacion();">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="control-label">Valor actual deducción:</label>
                                                    <input type="number"  class="form-control" name="embargosActual" id="embargosActual" readonly="readonly" placeholder="0.00">
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label class="control-label">Aportación Voluntaria:</label>
                                                    <input type="number"  class="form-control is-valid" name="voluntaria" id="voluntaria" placeholder="0.00" oninput="embargoYaportacion();">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="control-label">Aportación Voluntaria Actual:</label>
                                                    <input type="number"  class="form-control" name="voluntariaActual" id="voluntariaActual" placeholder="0.00" readonly="readonly">
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div> <hr style="height:1px;border:none;color:black;background-color:black;">
                            
                            <div class="col-md-12">
                                <div  class="row">
                                    <div class="col-md-3">
                                    <label class="control-label">Salario anual:</label> 
                                        <input type="text"  class="form-control" name="salarioAnual" id="salarioAnual" readonly="readonly">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label">Salario diario:</label>
                                        <input type="text"  class="form-control" name="salarioDiario" id="salarioDiario" readonly="readonly">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label">Salario devengado:</label>
                                        <input type="text"  class="form-control" name="devengado" id="devengado" readonly="readonly">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label">Deducción por IHSS</label>
                                        <input type="text"  class="form-control" name="deduccionIHSS" id="deduccionIHSS" readonly="readonly">
                                    </div>
                                </div>
                            </div> <hr> 
                            
                            <div class="col-md-12">
                                <div  class="row">
                                <div class="col-md-3">
                                    <label class="control-label">Cooperativa Sagrada Familia:</label>
                                    <input type="text"  class="form-control" name="copSagrada" id="copSagrada" readonly="readonly">
                                </div>
                                <div class="col-md-3">
                                    <label class="control-label">Optica innova visión:</label>
                                    <input type="text"  class="form-control" name="optica" id="optica" readonly="readonly">
                                </div>
                                <div class="col-md-3">
                                    <label class="control-label">Banco Davivienda:</label>
                                    <input type="text"  class="form-control" name="davivienda" id="davivienda" readonly="readonly">
                                </div>
                                <div class="col-md-3">
                                    <label class="control-label">Cooperativa ELGA:</label>
                                    <input type="text"  class="form-control" name="copElga" id="copElga" readonly="readonly">
                                </div>
                            </div>
                            </div> <hr>
                            <div class="col-md-12">
                                <div  class="row">
                                    <div class="col-md-4">
                                        <label class="control-label">Total recibido en el año:</label>
                                        <input type="text"  class="form-control" name="totalRecibido" id="totalRecibido" readonly="readonly">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label">Salario neto:</label>
                                        <input type="text" hidden readonly name="netoS" id="netoS">
                                        <input type="text"  class="form-control" name="salarioNeto" id="salarioNeto" readonly="readonly" style="background-color: #3c723b;">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label">Total deducciones:</label> 
                                        <input type="text" hidden readonly id="totaldedcc" name="totaldedcc">
                                        <input type="text"  class="form-control" name="totalDeducciones" id="totalDeducciones" readonly="readonly" style="background-color: #8b0c12;">
                                        <button hidden type="button" id="btntotidedu" onclick="totiDedu();">hiouhuoijhlk</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                       
                    </div>
                    <div class="modal-footer">
                        
                        <button  type="button" class="btn waves-effect waves-light btn-outline-success" onclick="guardarDeduccionEnPlanilla();">Guardar</button>
                        <button type="button" class="btn waves-effect waves-light btn-outline-danger" data-dismiss="modal" id="btnCerrar" onclick="cerrarModalPrincipal();">Cerrar</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
             
        </div>
        <!-- Modal Incapacidad-->
        <div class="modal fade" id="modalIncapacidades" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document" style="color:black;">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Días de Incapacidad</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="frmIncapacidad">
                                        <input type="text" hidden readonly id="codigoEmpleadoIncapacidad" name="codigoEmpleadoIncapacidad">
                                        <input type="text" hidden readonly id="accion" name="accion" value="1">
                                        <label>Escriba la cantidad total de dias de incapacidad:</label><br>
                                        <input type="number" name="diasIncapacidad" id="diasIncapacidad" placeholder="0"><br><br>
                                        <label>Escriba la fecha en que inicio la incapacidad:</label> <br>
                                        <input type="date" name="fechaInicioIncapacidad" id="fechaInicioIncapacidad"><br><br>
                                        <label>Techo definido:</label><br>
                                        <input readonly type="text" name="techoIncapacidad" id="techoIncapacidad" value="<?php echo $techoIncapacidad; ?>">
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <!-- <button type="button" class="btn btn-primary"  onclick="enviarIncapacidad();" onclick="modalFlotante1();">Limpiar</button> -->
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCancelar11" onclick="limpiarModalesMenores();">Cerrar</button>
                                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="limpiarModalesMenores();" >Cerrar</button> -->
                                    <button type="button" class="btn btn-primary"  onclick="enviarIncapacidad();" >Enviar</button>
                                </div>
                                </div>
                            </div>
                            </div>

                            <!-- Modal Tiempo Tardío-->
                            <div class="modal fade" id="modalTiempoTardio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document" style="color:black;">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Cálculo de Tiempo Tardío</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="frmTiempoTardio">
                                        <input type="text" hidden readonly id="codigoEmpleadoTiempoTardio" name="codigoEmpleadoTiempoTardio">
                                        <input type="text" hidden readonly name="sNominal" id="sNominal">
                                        <input type="text" hidden readonly id="accion" name="accion" value="2">
                                        <label>Escriba la cantidad de horas tarde:</label><br>
                                        <input type="number" name="horasTarde" id="horasTarde" placeholder="0"><br><br>
                                        <label>Escriba la cantidad de minutos tarde: </label> <br>
                                        <input type="number" name="minutosTarde" id="minutosTarde" placeholder="0"><br><br>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCancelar12" onclick="limpiarModalesMenores();">Cerrar</button>
                                    <button type="button" class="btn btn-primary"  onclick="enviarTiempoTardio();">Enviar</button>
                                </div>
                                </div>
                            </div>
                            </div>
                                
    
    

       

<script type="text/javascript">

    // $(document).on('hidden.bs.modal', function (event) {
    // if ($('.modal:visible').length) {
    //     $('body').addClass('modal-open');
    // }
    // });

    // function cerrarModalin(){
    //     console.log("sss");
        // $("#modalIncapacidades").removeData("bs.modal");
        // $("#modalIncapacidades").modal('hide');
        // $('#modalIncapacidades').on('hide.bs.modal', function (event) {
        //     $("#modalIncapacidades").removeData("bs.modal");
			//event.target apunta a la fuente
			 // Agrega un atributo a cada elemento de evento que hace clic para cerrar, y luego filtra y juzga cuando lo procesas aquí ...
			//event.target.getAttribute("aaa");
        // });
        
    // }

    // function modalFlotante(){
    //     // $('body').addClass('modal-open');
    //     // document.getElementById("btnCerrar").click();
    //     $('#calculoFormulas').modal('hide');
    //     // $('#calculoFormulas').modal('show');
    // }
    // function modalFlotante1(){
    //     // $('body').addClass('modal-open');
    //     // document.getElementById("btnCerrar").click();
    //     // $('#calculoFormulas').modal('hide');
    //     $('#calculoFormulas').modal('show');
    // }

    function asignarIDSueldo(idEmpleado){
        $('#idEmpleado').val(idEmpleado);
    $.ajax({
            method:"POST",
            data:"idEmpleado=" + idEmpleado + "&accion=1",
            url:"code_php/asignarSueldo.php",
            success:function(respuesta){
               
                // console.log(respuesta);
               
                $('#codigoEmpleado').val(respuesta);
                
               
            }
        });
    }

    function guardarEnPlanilla(){
        $.ajax({
            method:"POST",
            data:$('#frmAsignarSueldo').serialize(),
            url:"code_php/asignarSueldo.php",
            success:function(respuesta){
                if(respuesta == 4){
                    Swal.fire({
                                    icon: 'success',
                                    title: '¡Sueldo agregado con éxito!',
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                    document.getElementById("btnCancelar").click();
                    $('#sueldoAsignar').val("0.00");
                } else{
                    Swal.fire({
                                                    icon: 'error',
                                                    title: '¡Ups, parece que ha habido un error!',
                                                    showConfirmButton: false,
                                                    timer: 3000
                                                });
                }
                // console.log(respuesta);
               
            }
        });
    }  

    function infoEmpleado(idEmp){
        // $('#idEmpleado').val(idEmp);
    $.ajax({
            method:"POST",
            data:"idEmpleado=" + idEmp,
            url:"code_php/infoEmpleado.php",
            success:function(respuesta){ 

                respuesta = jQuery.parseJSON(respuesta);
                // console.log(respuesta['codigo']);

                nombre = respuesta['nombre'];
                codigo = respuesta['codigo'];
                puesto = respuesta['puesto'];
                salarioNominal = respuesta['salario_nominal']; 

                document.getElementById('nameEmpleado').innerHTML = '';
                document.getElementById('codigooEmpleado').innerHTML = '';
                document.getElementById('puestoEmpleado').innerHTML = '';
                document.getElementById('salarioNominal').innerHTML = '';

                document.getElementById('nameEmpleado').innerHTML += 
                    `<p>${nombre}</p>`;
                document.getElementById('codigooEmpleado').innerHTML += 
                    `<p>${codigo}</p>`;
                document.getElementById('puestoEmpleado').innerHTML += 
                    `<p>${puesto}</p>`;
                document.getElementById('salarioNominal').innerHTML += 
                    `<p>${salarioNominal}</p>`;

                $('#codiguinEmpleado').val(codigo);
                $('#diasDTrabajar').val('30');
                $('#isrMensual').val(respuesta['ISR_mensual']);
                $('#salarioAnual').val(respuesta['salario_anual']);
                $('#salarioDiario').val(respuesta['salario_diario']);
                $('#devengado').val(respuesta['salario_devengado']);
                $('#deduccionIHSS').val(respuesta['IHSS']);
                $('#copSagrada').val(respuesta['cooperativa_sagrada_familia']);
                $('#optica').val(respuesta['optica_INNOVA']);
                $('#davivienda').val(respuesta['banco_davivienda']);
                $('#copElga').val(respuesta['cooperativa_ELGA']);
                $('#totalRecibido').val(respuesta['total_recibido_anio']);
                $('#deduccionInasistenciaActual').val(respuesta['deduccion_por_inasistencia_dia']);
                
                $('#totalIncapacidad').val("0.00");
                $('#totalTiempoTardio').val("0.00");
                $('#totalInasistencia').val("0.00");

                isrAnualActual = respuesta['ISR_anual'];
                embargosActual = respuesta['embargos'];
                voluntariaActual = respuesta['voluntaria'];
                totalIncapacidadActual = respuesta['total_deducido_incapacidad'];
                totalTiempoTardioActual = respuesta['tiempo_tardio'];
                totalInasistenciaActual = respuesta['total_inasistencia'];
                totalDeducciones = respuesta['total_deducciones'];
                salarioNeto = respuesta['salario_neto'];

                $('#isrAnualActual').val(isrAnualActual);
                $('#embargosActual').val(embargosActual);
                $('#voluntariaActual').val(voluntariaActual);
                $('#totalIncapacidadActual').val(totalIncapacidadActual);
                $('#totalTiempoTardioActual').val(totalTiempoTardioActual);
                $('#totalInasistenciaActual').val(totalInasistenciaActual);
                $('#salarioNeto').val(salarioNeto);
                $('#netoS').val(salarioNeto);
                $('#totalDeducciones').val(totalDeducciones);
                $('#totaldedcc').val(totalDeducciones);
                $('#isrMensualActual').val(respuesta['ISR_mensual']);

                //Inasistencia
                // diaInasis = respuesta['inasistenciaDia'];
                // if(diaInasis != "0.00"){ $('#deduccionInasistencia').val(diaInasis);}


                //Modal incapacidad
                $('#codigoEmpleadoIncapacidad').val(codigo); 

                // diasIncap = respuesta['incapacidadDia'];

                // if(diasIncap != "0.00"){ $('#diasIncapacidad').val(diasIncap);}


                //Modal Tiempo Tardio
                $('#codigoEmpleadoTiempoTardio').val(codigo);
                $('#sNominal').val(salarioNominal);


            }
        });
    }

    function enviarIncapacidad(){
        if($('#diasIncapacidad').val() == "0"){
                        $('#diasIncapacidad').val("");
                        $('#fechaInicioIncapacidad').val("");  
                        
                        dedu = $('#totalDeducciones').val();
                        neti = $('#salarioNeto').val();
                        dedu = parseFloat(dedu);
                        neti = parseFloat(neti);

                        total = $('#totalIncapacidad').val(); 
                        total = parseFloat(total);
                        incaA = $('#totalIncapacidadActual').val();
                        incaA = parseFloat(incaA);

                        if(total>0){
                            nuevaDedu = dedu - total;
                            nuevaDedu = Number(nuevaDedu.toFixed(2));

                            nuevaNeti = neti + total;
                            nuevaNeti = Number(nuevaNeti.toFixed(2));

                            $('#totalDeducciones').val(nuevaDedu);
                            $('#salarioNeto').val(nuevaNeti);
                            $('#totaldedcc').val(nuevaDedu);
                            $('#netoS').val(nuevaNeti);

                        } else{
                            if(incaA>0){
                                nuevaDedu = dedu - incaA;
                                nuevaDedu = Number(nuevaDedu.toFixed(2));

                                nuevaNeti = neti + incaA;
                                nuevaNeti = Number(nuevaNeti.toFixed(2));

                                $('#totalDeducciones').val(nuevaDedu);
                                $('#salarioNeto').val(nuevaNeti);
                                $('#totaldedcc').val(nuevaDedu);
                                $('#netoS').val(nuevaNeti);

                            }
                        }

                        $('#totalIncapacidad').val("0.00");
                        $('#totalIncapacidadActual').val("0.00");
                        $('#guardarDiasIncapacidad').val("0.00");
                        
                        document.getElementById("btnCancelar11").click();
                        // document.getElementById("btntotidedu").click();
        } else{
                if($('#diasIncapacidad').val() != "" &&  $('#fechaInicioIncapacidad').val() != ""){
                    $.ajax({
                    method:"POST",
                    data:$('#frmIncapacidad').serialize(),
                    url:"code_php/calculoDeducciones.php",
                    success:function(respuesta){
                        
                        respuesta = jQuery.parseJSON(respuesta);

                        $('#diasIncapacidad').val("");
                        $('#fechaInicioIncapacidad').val("");    

                        $('#totalIncapacidad').val(respuesta['totalI']);
                        $('#guardarDiasIncapacidad').val(respuesta['diasI']);
                        
                        document.getElementById("btnCancelar11").click();
                        document.getElementById("btntotidedu").click();
                        
                    
                        }
                    });
                } else{
                        Swal.fire({
                            icon: 'error',
                            title: '¡Debe llenar ambos campos!',
                            showConfirmButton: false,
                            timer: 3000
                                    });
                        }
        }
        
        
    }

    function enviarTiempoTardio(){
             if($('#horasTarde').val() == "0" && $('#minutosTarde').val() == "0"){
                        $('#horasTarde').val("");
                        $('#minutosTarde').val("");  
                        
                        dedu = $('#totalDeducciones').val();
                        neti = $('#salarioNeto').val();
                        dedu = parseFloat(dedu);
                        neti = parseFloat(neti);

                        total = $('#totalTiempoTardio').val(); 
                        total = parseFloat(total);
                        incaA = $('#totalTiempoTardioActual').val();
                        incaA = parseFloat(incaA);

                        if(total>0){
                            nuevaDedu = dedu - total;
                            nuevaDedu = Number(nuevaDedu.toFixed(2));

                            nuevaNeti = neti + total;
                            nuevaNeti = Number(nuevaNeti.toFixed(2));

                            $('#totalDeducciones').val(nuevaDedu);
                            $('#salarioNeto').val(nuevaNeti);
                            $('#totaldedcc').val(nuevaDedu);
                            $('#netoS').val(nuevaNeti);

                        } else{
                            if(incaA>0){
                                nuevaDedu = dedu - incaA;
                                nuevaDedu = Number(nuevaDedu.toFixed(2));

                                nuevaNeti = neti + incaA;
                                nuevaNeti = Number(nuevaNeti.toFixed(2));

                                inasiAct = $('#totalInasistenciaActual').val();
                                inasiAct = parseFloat(inasiAct);

                                if(inasiAct>0){ 
                                    inasiAct -= incaA;
                                    $('#totalInasistenciaActual').val(inasiAct);
                                }

                                $('#totalDeducciones').val(nuevaDedu);
                                $('#salarioNeto').val(nuevaNeti);
                                $('#totaldedcc').val(nuevaDedu);
                                $('#netoS').val(nuevaNeti);

                            }
                        }


                        $('#totalTiempoTardio').val("0.00");
                        $('#totalTiempoTardioActual').val("0.00");
                        
                        document.getElementById("btnCancelar12").click();
                        // document.getElementById("btntotidedu").click();
             } else{
                if($('#horasTarde').val() != "" &&  $('#minutosTarde').val() != ""){
                    $.ajax({
                        method:"POST",
                        data:$('#frmTiempoTardio').serialize(),
                        url:"code_php/calculoDeducciones.php",
                        success:function(respuesta){
                            
                            $('#horasTarde').val("");
                            $('#minutosTarde').val("");

                            $('#totalTiempoTardio').val(respuesta);
                            // console.log(respuesta);
                            document.getElementById("btnCancelar12").click();
                            document.getElementById("btntotidedu").click();
                        
                        }
                    });
                } else{
                        Swal.fire({
                            icon: 'error',
                            title: '¡Debe llenar ambos campos!',
                            showConfirmButton: false,
                            timer: 3000
                                    });
                        }
            }
        
        
    }

    function calculoInasistencia(){
        
        inasistencia = $('#deduccionInasistencia').val();
        salarioNomi = $('#sNominal').val();
        idinasi = $('#codigoEmpleadoIncapacidad').val();

        if(inasistencia != ""){
            $.ajax({
            method:"POST",
            data:"inasistencia="+inasistencia+"&accion=3&salarioNomi="+salarioNomi+"&id="+idinasi,
            url:"code_php/calculoDeducciones.php",
            success:function(respuesta){

                $('#totalInasistencia').val(respuesta);
                document.getElementById("btntotidedu").click();
                // $('#totalDeducciones').val(respuesta['totalDeduccion']);
                
                     }
             });

                

        } else{
            $('#totalInasistencia').val("0.00");
            document.getElementById("btntotidedu").click();
            // deduc = $('#totaldedcc').val();
            // $('#totalDeducciones').val(deduc);
                
        } 
    }
    // cnt = 0;

    function calculoISR(){
        isr = $('#isrAnual').val();
     
        if(isr != ""){
            $.ajax({
            method:"POST",
            data:"isr="+isr+"&accion=4",
            url:"code_php/calculoDeducciones.php",
            success:function(respuesta){
                
                $('#isrMensual').val(respuesta);
                // console.log(respuesta);
                document.getElementById("btntotidedu").click();
                
                     }
             });
        } else{
            $('#isrMensual').val("0.00");
            document.getElementById("btntotidedu").click();
            // $('#totalDeducciones').val(retenerReal);

        } 
    }


    function embargoYaportacion(){
        document.getElementById("btntotidedu").click();
    }

    

    function totiDedu(){
        console.log("click");

        isrMensualActual = $('#isrMensualActual').val();
        embargosActual = $('#embargosActual').val();
        voluntariaActual = $('#voluntariaActual').val();
        totalIncapacidadActual = $('#totalIncapacidadActual').val();
        totalTiempoTardioActual = $('#totalTiempoTardioActual').val();
        totalInasistenciaActual = $('#totalInasistenciaActual').val();

        isrMensualActual = parseFloat(isrMensualActual);
        embargosActual = parseFloat(embargosActual);
        voluntariaActual = parseFloat(voluntariaActual);
        totalIncapacidadActual = parseFloat(totalIncapacidadActual);
        totalTiempoTardioActual = parseFloat(totalTiempoTardioActual);
        totalInasistenciaActual = parseFloat(totalInasistenciaActual);
        
        isr = $('#isrMensual').val();
            if(isr == ""){ isr = "0.00";}
            // if(isr == "" && isrAnualActual<0){ isr = 0.00;}
            // if(isr == "" && isrAnualActual>0){ isr = isrAnualActual;}

        inasistencia = $('#totalInasistencia').val();
            if(inasistencia == ""){ inasistencia = "0.00";}
            // if(inasistencia == "" && totalInasistenciaActual<0){ inasistencia = 0.00;}
            // if(inasistencia == "" && totalInasistenciaActual>0){ inasistencia = totalInasistenciaActual;}

        incapacidad = $('#totalIncapacidad').val();
            if(incapacidad == ""){ incapacidad = "0.00";}
            // if(incapacidad == "" && totalIncapacidadActual<0){ incapacidad = 0.00;}
            // if(incapacidad == "" && totalIncapacidadActual>0){ incapacidad = totalIncapacidadActual;}

        tiempoTardio = $('#totalTiempoTardio').val();
            if(tiempoTardio == ""){ tiempoTardio = "0.00";}
            // if(tiempoTardio == "" && totalTiempoTardioActual<0){ tiempoTardio = 0.00;}
            // if(tiempoTardio == "" && totalTiempoTardioActual>0){ tiempoTardio = totalTiempoTardioActual;}

        embargos = $('#embargos').val();
            if(embargos == ""){ embargos = "0.00";}
            // if(embargos == "" && embargosActual<0){ embargos = 0.00;}
            // if(embargos == "" && embargosActual>0){ embargos = embargosActual;}

        voluntaria = $('#voluntaria').val();
            if(voluntaria == ""){ voluntaria = "0.00";}
            // if(voluntaria == "" && voluntariaActual<0){ voluntaria = 0.00;}
            // if(voluntaria == "" && voluntariaActual>0){ voluntaria = voluntariaActual;}

        totidedu = $('#totaldedcc').val();
        totidedu = parseFloat(totidedu);

        salarioNeto = $('#netoS').val();
        salarioNeto = parseFloat(salarioNeto);

        // isr = parseFloat(isr);

                if(isrMensualActual>0 && isr != ""){
                    totidedu = totidedu - isrMensualActual;
                    salarioNeto = salarioNeto + isrMensualActual;
                }
                if(embargosActual>0 && embargos != ""){
                    totidedu = totidedu - embargosActual;
                    salarioNeto = salarioNeto + embargosActual;
                    // console.log("entró");
                }
                if(voluntariaActual>0 && voluntaria != ""){
                    totidedu = totidedu - voluntariaActual;
                    salarioNeto = salarioNeto + voluntariaActual;
                }
                if(totalIncapacidadActual>0 && incapacidad != ""){
                    totidedu = totidedu - totalIncapacidadActual;
                    salarioNeto = salarioNeto + totalIncapacidadActual;
                }
                if(totalTiempoTardioActual>0 && tiempoTardio != ""){
                    totidedu = totidedu - totalTiempoTardioActual;
                    salarioNeto = salarioNeto + totalTiempoTardioActual;
                }
                if(totalInasistenciaActual>0 && inasistencia != ""){
                    totidedu = totidedu - totalInasistenciaActual;
                    salarioNeto = salarioNeto + totalInasistenciaActual;
                }

            $.ajax({
                method:"POST",
                data:"inasistencia="+inasistencia+"&isr="+isr+"&incapacidad="+incapacidad+"&tiempo="+tiempoTardio+"&embargo="+embargos+"&voluntaria="+voluntaria+"&totaldedu="+totidedu+"&neto="+salarioNeto+"&totalInasistenciaActual="+totalInasistenciaActual+"&isrMensualActual="+isrMensualActual+"&totalIncapacidadActual="+totalIncapacidadActual+"&totalTiempoTardioActual="+totalTiempoTardioActual+"&embargosActual="+embargosActual+"&voluntariaActual="+voluntariaActual,
                url:"code_php/totalDeduccion.php",
                success:function(respuesta){
                    console.log(respuesta);
                    respuesta = jQuery.parseJSON(respuesta);

                    $('#totalDeducciones').val(respuesta['totalDeduccion']);
                    $('#salarioNeto').val(respuesta['salarioNeto']);
                    // console.log(respuesta);
                    
                        }
                });

            //  console.log(embargosActual);
    }

    function guardarDeduccionEnPlanilla(){
        $.ajax({
            method:"POST",
            data:$('#frmDeduccionPrincipal').serialize(),
            url:"code_php/guardarDeduccionesEnPlanilla.php",
            success:function(respuesta){
                console.log(respuesta);
                if(respuesta == 1){
                    Swal.fire({
                        icon: 'success',
                        title: '¡Deducciones agregadas con éxito a la planilla!',
                        showConfirmButton: false,
                        timer: 2000
                                });
                    document.getElementById("btnCerrar").click();
                    $('#diasTrabajados').val("30");
                    $('#deduccionInasistencia').val("");
                    $('#totalInasistencia').val("");
                    $('#isrAnual').val("");
                    $('#isrMensual').val("");
                    $('#totalIncapacidad').val("");
                    $('#totalTiempoTardio').val("");
                    $('#embargos').val("");
                    $('#voluntaria').val("");
                    $('#diasIncapacidad').val("");
                    $('#fechaInicioIncapacidad').val("");
                    $('#horasTarde').val("");
                    $('#minutosTarde').val("");
                    
                    
                } else{
                    Swal.fire({
                        icon: 'error',
                        title: '¡Ups, parece que ha habido un error!',
                        showConfirmButton: false,
                        timer: 3000
                                });
                }
                // console.log(respuesta);
                
            }
        });
    }

    function cerrarModalPrincipal(){
                    $('#diasTrabajados').val("30");
                    $('#deduccionInasistencia').val("");
                    $('#totalInasistencia').val("");
                    $('#isrAnual').val("");
                    $('#isrMensual').val("");
                    $('#totalIncapacidad').val("");
                    $('#totalTiempoTardio').val("");
                    $('#embargos').val("");
                    $('#voluntaria').val("");
                    $('#diasIncapacidad').val("");
                    $('#fechaInicioIncapacidad').val("");
                    $('#horasTarde').val("");
                    $('#minutosTarde').val("");
                   
    }

    function limpiarIncapacidad(){
       
            limpiar = $('#totalIncapacidad').val(); 
            limpiar = parseFloat(limpiar);
            inca = $('#totalIncapacidadActual').val();
            inca = parseFloat(inca);

            if(inca>0){
                // console.log("mayor 0");
                // limpiar = parseFloat(limpiar);
                if(limpiar != "" || limpiar != "0.00" || limpiar != "0.0" || limpiar != "0" || limpiar != 0){
                    
                    dedu = $('#totalDeducciones').val();
                    neti = $('#salarioNeto').val();
                    dedu = parseFloat(dedu);
                    neti = parseFloat(neti);

                    nuevaDedu = dedu - limpiar;
                    nuevaDedu += inca;
                    nuevaDedu = Number(nuevaDedu.toFixed(2));

                    nuevaNeti = neti + limpiar;
                    nuevaNeti -= inca;
                    nuevaNeti = Number(nuevaNeti.toFixed(2));

                    $('#totalDeducciones').val(nuevaDedu);
                    $('#salarioNeto').val(nuevaNeti);
                    $('#totaldedcc').val(nuevaDedu);
                    $('#netoS').val(nuevaNeti);

                    $('#totalIncapacidad').val("0.00");
                    $('#diasIncapacidad').val("");

                    console.log("limpiando");
                } else{

                        Swal.fire({
                                icon: 'error',
                                title: '¡El campo ya esta limpio >:v !',
                                showConfirmButton: false,
                                timer: 2000
                                });
    
                        }
                
            } else{
                if(limpiar != "" || limpiar != "0.00" || limpiar != "0.0" || limpiar != "0" || limpiar != 0){

                    dedu = $('#totalDeducciones').val();
                    dedu = parseFloat(dedu);
                    neti = $('#salarioNeto').val();
                    neti = parseFloat(neti);

                    nuevaDedu = dedu - limpiar;
                    nuevaNeti = neti + limpiar;

                    nuevaDedu = Number(nuevaDedu.toFixed(2));
                    nuevaNeti = Number(nuevaNeti.toFixed(2));

                    $('#totalDeducciones').val(nuevaDedu);
                    $('#salarioNeto').val(nuevaNeti);

                    $('#totalIncapacidad').val("0.00");
                    $('#diasIncapacidad').val("");

                    console.log("limpiando");
                } else{

                        Swal.fire({
                                    icon: 'error',
                                    title: '¡El campo ya esta limpio >:v !',
                                    showConfirmButton: false,
                                    timer: 2000
                                            });
                    
                        }
            }

            

       
    }

    function limpiarTiempoTardio(){
            limpiar = $('#totalTiempoTardio').val();

            limpiar = $('#totalTiempoTardio').val(); 
            limpiar = parseFloat(limpiar);
            inca = $('#totalTiempoTardioActual').val();
            inca = parseFloat(inca);

            if(inca>0){
                // console.log("mayor 0");
                // limpiar = parseFloat(limpiar);
                if(limpiar != "" || limpiar != "0.00" || limpiar != "0.0" || limpiar != "0" || limpiar != 0){
                    
                    dedu = $('#totalDeducciones').val();
                    neti = $('#salarioNeto').val();
                    dedu = parseFloat(dedu);
                    neti = parseFloat(neti);

                    nuevaDedu = dedu - limpiar;
                    nuevaDedu += inca;
                    nuevaDedu = Number(nuevaDedu.toFixed(2));

                    nuevaNeti = neti + limpiar;
                    nuevaNeti -= inca;
                    nuevaNeti = Number(nuevaNeti.toFixed(2));

                    $('#totalDeducciones').val(nuevaDedu);
                    $('#salarioNeto').val(nuevaNeti);
                    $('#totaldedcc').val(nuevaDedu);
                    $('#netoS').val(nuevaNeti);

                    $('#totalTiempoTardio').val("0.00");
                    $('#horasTarde').val("");
                    $('#minutosTarde').val("");

                    console.log("limpiando");
                } else{

                        Swal.fire({
                                icon: 'error',
                                title: '¡El campo ya esta limpio >:v !',
                                showConfirmButton: false,
                                timer: 2000
                                });
    
                        }
                
            } else{
                if(limpiar != "" || limpiar != "0.00" || limpiar != "0.0" || limpiar != "0" || limpiar != 0){

                    dedu = $('#totalDeducciones').val();
                    dedu = parseFloat(dedu);
                    neti = $('#salarioNeto').val();
                    neti = parseFloat(neti);

                    nuevaDedu = dedu - limpiar;
                    nuevaNeti = neti + limpiar;

                    nuevaDedu = Number(nuevaDedu.toFixed(2));
                    nuevaNeti = Number(nuevaNeti.toFixed(2));

                    $('#totalDeducciones').val(nuevaDedu);
                    $('#salarioNeto').val(nuevaNeti);

                    $('#totalTiempoTardio').val("0.00");
                    $('#horasTarde').val("");
                    $('#minutosTarde').val("");

                    console.log("limpiando");
                } else{

                        Swal.fire({
                                    icon: 'error',
                                    title: '¡El campo ya esta limpio >:v !',
                                    showConfirmButton: false,
                                    timer: 2000
                                            });
                    
                        }
            }        
    }

    function limpiarModalesMenores(){
        $('#diasIncapacidad').val("");
        $('#fechaInicioIncapacidad').val("");
        $('#horasTarde').val("");
        $('#minutosTarde').val("");
    }



    function eliminarEmpleado(idEliminar){

        user = "<?php echo $_SESSION["UsuarioConectado"]; ?>";

        $.ajax({
            method:"POST",
            data:"idEmpleado=" + idEliminar,
            url:"code_php/infoEmpleado.php",
            success:function(respuesta){ 

                respuesta = jQuery.parseJSON(respuesta);
                name = respuesta['nombre'];
                codi = respuesta['codigo'];

                Swal.fire({
                title: '¿Seguro que quiere dar de baja en el sistema de planillas al siguiente empleado?',
                text: "Nombre: "+name+", Código de empleado: "+codi,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Sí, eliminelo!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method:"POST",
                        data:"idEmpleado=" + idEliminar + "&userR=" + user,
                        url:"code_php/eliminarEmpleado.php",
                        success:function(respuesta){ 
                            if(respuesta==1){
                                // console.log("hecho");
                                // Swal.fire(
                                //     '¡Eliminado!',
                                //     'El empleado ha sido eliminado del sistema de planillas.',
                                //     'success'
                                // );
                                Swal.fire({
                                icon: 'success',
                                title: '¡Empleado eliminado con éxito del sistema de planillas.!',
                                showConfirmButton: false,
                                timer: 3000
                                        })
                                        setTimeout(function () {
                                            location.reload();
                                        }, 3001);
                                
                            } else{
                                Swal.fire(
                                    'Error!',
                                    'Código de error: 69.',
                                    'error'
                                );
                            }
                        }
                    });
                }
                });
            }
        });
        
    }


</script>
