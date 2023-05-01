<?php
    $id = $_GET['id'];
    $sqlUser = "SELECT * FROM tbl_usuarios WHERE cod_empleado = '$id'";
    $queryUser = mysqli_query($conexion, $sqlUser);
    $resultUser = mysqli_fetch_array($queryUser); 

    if($resultUser['id_rol'] == 1){
        $rolUser = "Administrador";
    }else{
        $rolUser = "Auxiliar";
    }

    
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
                        <h4 class="card-title">Editar Perfil de Usuario</h4> <br>
                        <form id="frmEditUser">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="control-label">Codigo de Empleado:</label>
                                        <input type="number" class="form-control" id="codigoUser" name="codigoUser" readonly value="<?php echo $id; ?>"> 
                                        <!-- <input type="text" id="codigoViejo" name="codigoViejo" readonly hidden>  -->
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="control-label">Nombre de Empleado:</label>
                                        <input type="text" class="form-control" id="nombreUser" name="nombreUser" value="<?php echo $resultUser['nombre']; ?>">
                                    </div>
                                </div> <br>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="control-label">Número de Identidad:</label>
                                        <input type="text" class="form-control" id="identidadUser" name="identidadUser" value="<?php echo $resultUser['identidad']; ?>">
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="control-label">Usuario:</label>
                                        <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $resultUser['username']; ?>">
                                    </div>
                                </div> <br>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="control-label">Correo:</label>
                                        <input type="text" class="form-control" id="correoUser" name="correoUser" value="<?php echo $resultUser['correo']; ?>">
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="control-label">Rol:</label>
                                        <input type="text" class="form-control" id="rolUser" name="rolUser" value="<?php echo $rolUser; ?>" readonly>
                                    </div>
                                </div> <br>
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
                                    <button type="button" class="btn btn-dark" style="background-color:#bb8d10; color:white;" onclick="guardarCambiosUsuario();">Guardar Información</button>
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
    function guardarCambiosUsuario(){
        
        $.ajax({
            method:"POST",
            data:$('#frmEditUser').serialize(),
            url:"code_php/editarUsuario.php",
            success:function(respuesta){ 
                if(respuesta == 1){
                    Swal.fire({
                        icon: 'success',
                        title: '¡Su usuario ha sido modificado con éxito!',
                        showConfirmButton: false,
                        timer: 2000
                                })
                                setTimeout(function () {
                                    window.location = 'index.php?pagina=Inicio'
                                }, 2000);
                    // $(location).attr('href','index.php?pagina=planilla');
                } else{
                        Swal.fire({
                            icon: 'error',
                            title: '¡Ups, parece que ha habido un error!',
                            showConfirmButton: false,
                            timer: 3000
                                    });
                        
                }
            }
        });
    }

    
    
 </script>