<?php


$sqlRegionales = "SELECT * FROM tbl_regionales";
$resultReg = mysqli_query($conexion,$sqlRegionales);

$sqlUnidades = "SELECT * FROM tbl_unidades";
$resultUni = mysqli_query($conexion,$sqlUnidades);


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
                    <h4 class="text-themecolor">SISTEMA DE PLANILLAS 911</h4>
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
                        
                        <div class="row">
                            <div class="col-sm-10">
                                <h4 class="card-title">Formulario para agregar nuevo empleado</h4>
                            </div>
                            <div class="col-sm-2">
                            
                            </div>
                        </div>  <br><br><br>
                        
                        
                        <form id="frmAgregarEmpleado">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre del empleado:</label><br>
                                        <input type="text" name="accion" id="accion" value="2" hidden readonly>
                                        <input type="text" hidden readonly name="hoja" id="hoja" value="2">
                                        <input type="text" id="userR" name="userR" value="<?php echo $_SESSION["UsuarioConectado"]; ?>" hidden readonly>
                                        <input class="form-control" type="text" name="nombreEmpleado" id="nombreEmpleado">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Código de empleado:</label><br>
                                        <input class="form-control" type="number" name="codigoEmpleado" id="codigoEmpleado">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Número de identidad:</label><br>
                                        <input class="form-control" type="text" name="identidadEmpleado" id="identidadEmpleado">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Unidad donde trabaja:</label><br>
                                        <!-- <input class="form-control" type="text" name="unidadEmpleado" id="unidadEmpleado"> -->
                                        <select class="form-control" name="unidadEmpleado" id="unidadEmpleado" style="color:white;">
                                        <option value="" selected></option>
                                            <?php 
                                                while($uni = mysqli_fetch_array($resultUni)){
                                                    $idUnidad = $uni['id_unidad'];
                                                    $unidades = $uni['unidad'];
                                            ?>
                                            <option value="<?php echo $unidades; ?>"><?php echo $unidades; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Puesto:</label><br>
                                        <input class="form-control" type="text" name="puestoEmpleado" id="puestoEmpleado">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Código de Puesto:</label><br>
                                        <input class="form-control" type="text" name="CodigoPuestoEmpleado" id="CodigoPuestoEmpleado">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sexo:</label><br>
                                        <select name="sexo" id="sexo" style="color:white;" class="form-control">
                                                    <option value="M">Masculino</option>
                                                    <option value="F">Femenino</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Fecha de ingreso:</label><br>
                                        <input class="form-control" type="date" name="fechaIngresoEmpleado" id="fechaIngresoEmpleado">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Planilla a agregar:</label><br>
                                        <select class="form-control" name="planillaEmpleado" id="planillaEmpleado" style="color:white;">
                                        <option value="" selected></option>
                                            <?php 
                                                while($peg = mysqli_fetch_array($resultReg)){
                                                    $idRegional = $peg['Id_regional'];
                                                    $regionalS = $peg['regional'];
                                            ?>
                                            <option value="<?php echo $idRegional; ?>"><?php echo $regionalS; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sueldo Nominal:</label><br>
                                        <input class="form-control" type="number" name="sueldoEmpleado" id="sueldoEmpleado" placeholder="0.00">
                                    </div>
                                </div>
                            </div>
                        </form> <br>

                                <div class="row">
                                    <div class="col-sm-5">
                                        <h4 class="card-title"></h4>
                                    </div>
                                    <div class="col-sm-7">
                                        <button type="button" class="btn btn-primary" onclick="agregarEnPlanilla();">Guardar Información</button>
                                    </div>
                                </div>

                        
                        
                        
                    </div>
                </div>
            
                                                        <!-- button: data-toggle="modal" data-target="#agregaEmpleado" -->
                                                    <!-- Modal -->
                            <div class="modal fade" id="agregaEmpleado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo Empleado</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="frmIncapacidad">
                                        <label>Escriba la cantidad total de dias de incapacidad:</label><br>
                                        <input type="number" name="diasIncapacidad" id="diasIncapacidad"><br><br>
                                        <label>Escriba la fecha en que inicio la incapacidad:</label> <br>
                                        <input type="date" name="fechaInicioIncapacidad" id="fechaInicioIncapacidad"><br><br>
                                        <label>Techo definido:</label><br>
                                        <input readonly type="text" name="techoIncapacidad" id="techoIncapacidad" value="">
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-primary" onclick="enviarForm();">Enviar</button>
                                </div>
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

function agregarEnPlanilla(){
        
        if($('#nombreEmpleado').val() != "" && $('#codigoEmpleado').val() != "" && $('#identidadEmpleado').val() != "" && $('#unidadEmpleado').val() != "" && $('#puestoEmpleado').val() != "" && $('#fechaIngresoEmpleado').val() != "" && $('#planillaEmpleado').val() != "" && $('#sueldoEmpleado').val() != ""){
            
                    $.ajax({
                        method:"POST",
                        data:$('#frmAgregarEmpleado').serialize(),
                        url:"code_php/agregarEmpleadoC.php",
                        success:function(respuesta){
                            respuesta = respuesta.trim();
                            if(respuesta == 14){ //empleado agregado exitosamente
                                Swal.fire({
                                    icon: 'success',
                                    title: '¡Empleado agregado con exito a las planillas!',
                                    showConfirmButton: false,
                                    timer: 2500
                                });
                                $('#nombreEmpleado').val("");
                                $('#codigoEmpleado').val("");
                                $('#identidadEmpleado').val("");
                                $('#unidadEmpleado').val("");
                                $('#puestoEmpleado').val("");
                                $('#fechaIngresoEmpleado').val("");
                                $('#planillaEmpleado').val("");
                                $('#sueldoEmpleado').val("");
                                $('#sexo').val("");
                                $('#CodigoPuestoEmpleado').val("");
                            
                            } else{ if(respuesta == 0){ //error empleado ya registrado
                                        Swal.fire({
                                            icon: 'error',
                                            title: '¡Este empleado ya está registrado!',
                                            showConfirmButton: false,
                                            timer: 3000
                                        });

                                    } else{ if(respuesta == 2 || respuesta == 3){ //error al guardar en base de datos
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: '¡Ups, parece que ha habido un error!',
                                                    showConfirmButton: false,
                                                    timer: 3000
                                                });

                                            } else{ // :'v
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: '¡Error, intentelo de nuevo!',
                                                    showConfirmButton: false,
                                                    timer: 3000
                                                });
                                            }

                                    }
                                
                                }
                                    console.log(respuesta);
                        
                        }
                    });  

        } else{

            Swal.fire({
                        icon: 'error',
                        title: '¡Debe llenar todos los campos!',
                        showConfirmButton: false,
                        timer: 2500
                    });

        }
    
        
    }



 </script>