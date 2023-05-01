<?php
    require_once("../conexion/connect.php");
    $query="SELECT
	empleados911.CODIGO_EMPLEADO,
	empleados911.NOMBRE_EMPLEADO,  
	empleados911.PUESTO,
	tbl_regionales.regional
    FROM
	empleados911
	INNER JOIN tbl_regionales ON empleados911.REGIONAL =tbl_regionales.Id_regional
    WHERE empleados911.ESTADO = 1";
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
                                        <th>Nombre empleado</th>
                                        <th>Puesto</th>
                                        <th>Regional</th>
                                        <th>Cooperativa <br>ELGA</th>
                                        <th>Cooperativa <br>Sagrada Familia</th>
                                        <th>Banco <br>DAVIVIENDA</th>
                                        <th>Optica <br>INNOVA VISION</th>
                                        
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
                            <td><?php echo $row['NOMBRE_EMPLEADO'];?></td>
                            <td><?php echo $row['PUESTO'];?></td>
                            <td><?php echo $row['regional'];?></td>
                            <td><button type="button" class="btn btn-info" onclick="agregarElga(<?php echo $row['CODIGO_EMPLEADO'];?>);" data-toggle="modal" data-target="#elga">Editar</button></td>
                            <td><button type="button" class="btn btn-info"onclick="agregarSagradaFamilia(<?php echo $row['CODIGO_EMPLEADO'];?>);"  data-toggle="modal" data-target="#sagradaFamilia" >Editar</button></td>
                            <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#davivienda" onclick="agregarDavivienda(<?php echo $row['CODIGO_EMPLEADO'];?>);">Editar</button></td>
                            <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#optica" onclick="agregarOptica(<?php echo $row['CODIGO_EMPLEADO'];?>);">Editar</button></td>
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

        
          <!-- Modal -->
    <div class="modal fade" id="elga" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="color:black;">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" >COOPERATIVA ELGA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formDeduccionElga">
                   <input type="text" class="form-control" id="cod_empleadoAgrego" name="cod_empleadoAgrego" hidden readonly value="<?php echo $CODIGO_EMPLEADO; ?>">
                   <input type="text" hidden readonly name="accion" id="accion" value="2">
                    <input type="text" hidden readonly name="hoja" id="hoja" value="1">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Empleado: </label><br>
                                    <input type="text"  readonly="" name="codigoEmpleado" id="codigoEmpleado"><br><br>
                                </div>
                                <div class="col-sm-6">
                                    <label>Deducción actual: </label><br>
                                    <input type="number" name="deduccionElgaA" id="deduccionElgaA" readonly><br><br>
                                </div>
                            </div> <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Total a deducir: </label><br>
                                    <input type="number" name="deduccionElga" id="deduccionElga" value="0.00"> 
                                </div>
                            </div>
                        </div> 
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCancelar">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="guardarElga();">Guardar en planilla</button>
            </div>
            </div>
        </div>
    </div>

           <!-- Modal -->
    <div class="modal fade" id="sagradaFamilia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="color:black;">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" >COOPERATIVA SAGRADA FAMILIA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formSagradaFamilia">
                   <input type="text" class="form-control" id="cod_empleadoAgrego1" name="cod_empleadoAgrego1" hidden readonly value="<?php echo $CODIGO_EMPLEADO; ?>">
                    
                    <input type="text" hidden readonly name="accion1" id="accion1" value="2">
                    <input type="text" hidden readonly name="hoja1" id="hoja1" value="1">
                    
                    
                    <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Empleado: </label><br>
                                    <input type="text" readonly name="codigoEmpleado1" id="codigoEmpleado1"><br><br>
                                </div>
                                <div class="col-sm-6">
                                    <label>Deducción actual: </label><br>
                                    <input type="number" name="deduccionSagradaFamiliaA" id="deduccionSagradaFamiliaA" readonly><br><br>
                                </div>
                            </div> <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Total a deducir: </label><br>
                                    <input type="number" name="deduccionSagradaFamilia" id="deduccionSagradaFamilia" value="0.00"> 
                                </div>
                            </div>
                        </div> 
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCancelar1">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="guardarDeduccionSagradaFamilia();">Guardar en planilla</button>
            </div>
            </div>
        </div>
    </div>
            

        <!-- Modal -->
    <div class="modal fade" id="davivienda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="color:black;">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" >BANCO DAVIVIENDA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formDavivienda">
                   <input type="text" class="form-control" id="cod_empleadoAgrego2" name="cod_empleadoAgrego2" hidden readonly value="<?php echo $CODIGO_EMPLEADO; ?>">
                    
                    <input type="text" hidden readonly name="accion2" id="accion2" value="2">
                    <input type="text" hidden readonly name="hoja2" id="hoja2" value="1">
                   

                    <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Empleado: </label><br>
                                    <input type="text" readonly name="codigoEmpleado2" id="codigoEmpleado2"><br><br>
                                </div>
                                <div class="col-sm-6">
                                    <label>Deducción actual: </label><br>
                                    <input type="number" name="deduccionDaviviendaA" id="deduccionDaviviendaA" readonly><br><br>
                                </div>
                            </div> <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Total a deducir: </label><br>
                                    <input type="number" name="deduccionDavivienda" id="deduccionDavivienda" value="0.00"> 
                                </div>
                            </div>
                        </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCancelar2">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="guardarDeduccionDavivienda();">Guardar en planilla</button>
            </div>
            </div>
        </div>
    </div>

           <!-- Modal -->
    <div class="modal fade" id="optica" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="color:black;">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" >OPTICA INNOVA VISION </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formOpticaVision">
                    <input type="text" class="form-control" id="cod_empleadoAgrego3" name="cod_empleadoAgrego3" hidden readonly value="<?php echo $CODIGO_EMPLEADO; ?>">
                    
                    <input type="text" hidden readonly name="accion3" id="accion3" value="2">
                    <input type="text" hidden readonly name="hoja3" id="hoja3" value="1">
                    

                    <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Empleado: </label><br>
                                    <input type="text" readonly name="codigoEmpleado3" id="codigoEmpleado3"><br><br>
                                </div>
                                <div class="col-sm-6">
                                    <label>Deducción actual: </label><br>
                                    <input type="number" name="deduccionOpticaA" id="deduccionOpticaA" readonly><br><br>
                                </div>
                            </div> <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Total a deducir: </label><br>
                                    <input type="number" name="deduccionOptica" id="deduccionOptica" value="0.00"> 
                                </div>
                            </div>
                        </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCancelar3">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="guardarDeduccionOptica();">Guardar en planilla</button>
            </div>
            </div>
        </div>
    </div>
    <div id="resultado"></div>
</div> 

<script type="text/javascript">
       function agregarElga(idEmpleado){
        $('#idEmpleado').val(idEmpleado);
           $.ajax({
            method:"POST",
            data:"idEmpleado=" + idEmpleado + "&accion=1",
            url:"code_php/guardarDeduccionElga.php",
            success:function(respuesta){
                
                respuesta = jQuery.parseJSON(respuesta);
               
                $('#codigoEmpleado').val(respuesta['codigo']);
                $('#deduccionElgaA').val(respuesta['elga']);
            
            }
        });
    }

    function guardarElga(){
        $.ajax({
            method:"POST",
            data:$('#formDeduccionElga').serialize(),
            url:"code_php/guardarDeduccionElga.php",
            success:function(respuesta){
                if(respuesta == 4){
                    Swal.fire({
                                    icon: 'success',
                                    title: '¡Deducción agregada!',
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                    document.getElementById("btnCancelar").click();
                    $('#deduccionElga').val("0.00");
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
</script>

<script type="text/javascript">
       function agregarSagradaFamilia(idEmpleado){
        $('#idEmpleado').val(idEmpleado);
         $.ajax({
            method:"POST",
            data:"idEmpleado=" + idEmpleado + "&accion1=1",
            url:"code_php/guardarDeduccionSagradaFamilia.php",
            success:function(respuesta){
                
                respuesta = jQuery.parseJSON(respuesta);
               
                // console.log(respuesta);
               
                $('#codigoEmpleado1').val(respuesta['codigo']);
                $('#deduccionSagradaFamiliaA').val(respuesta['sagrada']);
                
               
            }
        });
    }

    function guardarDeduccionSagradaFamilia(){
        $.ajax({
            method:"POST",
            data:$('#formSagradaFamilia').serialize(),
            url:"code_php/guardarDeduccionSagradaFamilia.php",
            success:function(respuesta){
                if(respuesta == 4){
                    Swal.fire({
                                    icon: 'success',
                                    title: '¡Deducción agregada!',
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                    document.getElementById("btnCancelar1").click();
                    $('#deduccionSagradaFamilia').val("0.00");
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
</script>

<script type="text/javascript">
       function agregarDavivienda(idEmpleado){
        $('#idEmpleado').val(idEmpleado);
         $.ajax({
            method:"POST",
            data:"idEmpleado=" + idEmpleado + "&accion2=1",
            url:"code_php/guardarDeduccionDavivienda.php",
            success:function(respuesta){
                
                respuesta = jQuery.parseJSON(respuesta);
               
                // console.log(respuesta);
               
                $('#codigoEmpleado2').val(respuesta['codigo']);
                $('#deduccionDaviviendaA').val(respuesta['davivienda']);
               
            }
        });
    }

    function guardarDeduccionDavivienda(){
        $.ajax({
            method:"POST",
            data:$('#formDavivienda').serialize(),
            url:"code_php/guardarDeduccionDavivienda.php",
            success:function(respuesta){
                if(respuesta == 4){
                    Swal.fire({
                                    icon: 'success',
                                    title: '¡Deducción agregada!',
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                    document.getElementById("btnCancelar2").click();
                    $('#deduccionDavivienda').val("0.00");
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
</script>

<script type="text/javascript">
       function agregarOptica(idEmpleado){
        $('#idEmpleado').val(idEmpleado);
         $.ajax({
            method:"POST",
            data:"idEmpleado=" + idEmpleado + "&accion3=1",
            url:"code_php/guardarDeduccionInnova.php",
            success:function(respuesta){
                
                respuesta = jQuery.parseJSON(respuesta);
               
                $('#codigoEmpleado3').val(respuesta['codigo']);
                $('#deduccionOpticaA').val(respuesta['optica']);
                
               
            }
        });
    }

    function guardarDeduccionOptica(){
        $.ajax({
            method:"POST",
            data:$('#formOpticaVision').serialize(),
            url:"code_php/guardarDeduccionInnova.php",
            success:function(respuesta){
                if(respuesta == 4){
                    Swal.fire({
                                    icon: 'success',
                                    title: '¡Deducción agregada!',
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                    document.getElementById("btnCancelar3").click();
                    $('#deduccionOptica').val("0.00");
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
</script>