<?php
    $id = $_GET['id'];

    $sqlReg = "SELECT * FROM tbl_regionales";
    $queryReg = mysqli_query($conexion,$sqlReg);

    $sqlUni = "SELECT * FROM tbl_unidades";
    $queryUni = mysqli_query($conexion,$sqlUni);
    
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
                        <h4 class="card-title">Editar Empleado</h4> <br>
                        <form id="frmEditEmploye">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="control-label">Codigo Empleado:</label>
                                        <input type="text" id="userR" name="userR" value="<?php echo $_SESSION["UsuarioConectado"]; ?>" hidden readonly>
                                        <input type="number" class="form-control" id="codigoEmpleado" name="codigoEmpleado" readonly> 
                                        <input type="text" id="codigoViejo" name="codigoViejo" readonly hidden> 
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="control-label">Nombre Empleado:</label>
                                        <input type="text" class="form-control" id="nombreEmpleado" name="nombreEmpleado">
                                    </div>
                                </div> <br>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="control-label">Número de Identidad:</label>
                                        <input type="text" class="form-control" id="identidadEmpleado" name="identidadEmpleado">
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="control-label">Unidad a la que pertenece:</label>
                                        <!-- <input type="text" class="form-control" id="unidadEmpleado" name="unidadEmpleado"> -->
                                        <select class="form-control" name="unidadEmpleado" id="unidadEmpleado">
                                        <?php
                                            while($resultUni = mysqli_fetch_array($queryUni)){
                                        ?>
                                                <option value="<?php echo $resultUni['unidad'];?>"><?php echo $resultUni['unidad'];?></option>
                                        <?php
                                            }
                                        ?> 
                                        </select>
                                    </div>
                                </div> <br>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="control-label">Puesto que desempeña:</label>
                                        <input type="text" class="form-control" id="puestoEmpleado" name="puestoEmpleado">
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="control-label">Fecha de Ingreso:</label>
                                        <!-- <input type="text" class="form-control" id="fechaEmpleado" name="fechaEmpleado"> -->
                                        <input type="date" class="form-control" id="fechaEmpleado" name="fechaEmpleado">
                                    </div>
                                </div> <br>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="control-label">Planilla a la que pertenece: </label>
                                        <!-- <input type="text" class="form-control" id="regionalEmpleado" name="regionalEmpleado"> -->
                                        <select class="form-control" name="regionalEmpleado" id="regionalEmpleado">
                                        <?php
                                            while($result = mysqli_fetch_array($queryReg)){
                                        ?>
                                                <option value="<?php echo $result['Id_regional'];?>"><?php echo $result['regional'];?></option>
                                        <?php
                                            }
                                        ?>        
                                        </select>
                                    </div>
                                    <!-- <div class="col-lg-6">
                                        <label class="control-label">Comentarios: </label>
                                        <input type="text" class="form-control" id="" name="">
                                    </div> -->
                                </div>
                            </div>
                        </form>
                        <br> <br>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-9"></div>
                                <div class="col-lg-1">
                                    <a href="index.php?pagina=planilla"><button type="button" class="btn btn-dark">Volver Atrás</button></a>
                                </div>
                                <div class="col-lg-2">
                                    <button type="button" class="btn btn-dark" style="background-color:#bb8d10; color:white;" onclick="guardarCambios();">Guardar Información</button>
                                </div>
                            </div>
                        </div>
                        <!-- <button type="button" onclick="sweetPrueb();">sweetPrueba</button> -->
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

 <script src="../assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
 <script type="text/javascript">
    function infoEmpleado(){
        idEmp = <?php echo $id; ?>;
        $.ajax({
            method:"POST",
            data:"idEmpleado=" + idEmp,
            url:"code_php/infoEmpleado.php",
            success:function(respuesta){ 

                respuesta = jQuery.parseJSON(respuesta);

                $('#nombreEmpleado').val(respuesta['nombre']);
                $('#codigoEmpleado').val(respuesta['codigo']);
                $('#codigoViejo').val(respuesta['codigo']);
                $('#identidadEmpleado').val(respuesta['identidad']);
                $('#unidadEmpleado').val(respuesta['unidad']);
                $('#puestoEmpleado').val(respuesta['puesto']);
                $('#fechaEmpleado').val(respuesta['ingreso']);
                $('#regionalEmpleado').val(respuesta['regional']);

               
            }
        });
    }
    infoEmpleado();
 </script>

 <script type="text/javascript">
    function guardarCambios(){
        
        $.ajax({
            method:"POST",
            data:$('#frmEditEmploye').serialize(),
            url:"code_php/editarEmpleadoBackend.php",
            success:function(respuesta){ 
                if(respuesta == 1){
                    Swal.fire({
                        icon: 'success',
                        title: '¡Empleado modificado con éxito!',
                        showConfirmButton: false,
                        timer: 2000
                                })
                                setTimeout(function () {
                                    window.location = 'index.php?pagina=planilla'
                                }, 2000);
                    // $(location).attr('href','index.php?pagina=planilla');
                } else{ if(respuesta == 2){
                        Swal.fire({
                            icon: 'error',
                            title: '¡Ups, parece que ha habido un error! Código de error: 777',
                            showConfirmButton: false,
                            timer: 5000
                                    });
                        }else{ if(respuesta == 3){
                                Swal.fire({
                                    icon: 'error',
                                    title: '¡Ups, parece que ha habido un error! Código de error: 776',
                                    showConfirmButton: false,
                                    timer: 5000
                                            });
                                }else{ if(respuesta == 0){
                                            Swal.fire({
                                            icon: 'error',
                                            title: '¡Ups, parece que ha habido un error! Código de error: 775',
                                            showConfirmButton: false,
                                            timer:5000
                                                    });
                                        } else{
                                            Swal.fire({
                                            icon: 'error',
                                            title: '¡Ups, parece que ha habido un error! Código de error: 804',
                                            showConfirmButton: false,
                                            timer: 5000
                                                    });
                                        }
                                } 
                        }
                }
            }
        });
    }

    
    
 </script>