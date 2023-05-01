<?php 

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
                    <h4 class="text-themecolor">CREACION DE USUARIOS</h4>
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
                <!-- .row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            
                            <div class="card-body">
                                <form id="formularioCrearUsuarios" method="POST" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <h3 class="card-title">INFORMACION DEL BIEN</h3>
                                        <hr>
                                                <label class="control-label">Código de empleado:</label>
                                                <input type="text"  class="form-control" name="codEmpleado" id="codEmpleado">
                                            
                                            
                                                <label class="control-label">Usuario:</label>
                                                <input type="text"  class="form-control" name="Registrousuario" id="Registrousuario">
                                            
                                            
                                                <label class="control-label">Clave:</label>
                                                <input type="password"  class="form-control" name="contrasenia" id="contrasenia">
                                           
                                            
                                                <label class="control-label">Nombre de empleado:</label>
                                                <input type="text"  class="form-control" name="nombreEmpleado" id="nombreEmpleado">
                                           
                                             
                                                <label class="control-label">Rol:</label>
                                                <input type="text"  class="form-control" name="rolUsuario" id="rolUsuario">
                                          
                                        </div>
                                        <br><br>
                                        <!-- <div class="form-group">
                                        <h3 class="card-title">INFORMACIÓN DE EMPLEADO</h3>
                                        <hr>
                                        
                                            <div class="row">
                                            <div class="col-md-6">
                                                <label class="control-label">Empleado Asignado</label>
                                                <select class="form-control custom-select">
                                                     <option value="">Andrea Mejía</option>
                                                     <option value="">Samael Rodriguez</option>
                                                </select> 
                                           </div> 
                                            <div class="col-md-6">
                                                <label class="control-label">N° Identidad</label>
                                                <input type="text" id="numId" class="form-control">
                                            </div>
                                            
                                            <div class="col-md-6">
                                                    <label class="control-label">Cargo</label>
                                                    <input type="text" id="cargo" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                    <label class="control-label">Unidad</label>
                                                    <input type="text" id="unidad" class="form-control">
                                            </div>
                                           <div class="col-md-6">
                                                    <label class="control-label">Regional</label>
                                                    <input type="text" id="regional" class="form-control">
                                            </div>

                                            </div>
                                        </div>
                                        </div> -->

                                  </div>
                                    <div class="form-actions">
                                        <center><button type="button" id="enviar" name="enviar" class="btn btn-success"  onclick="ingresar();"> <i class="fa fa-check"></i> Guardar</button></center>
                                        
                                    </div>
                                    <div id="respuesta"></div>
                                </form>
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
<script>
function ingresar(){
  var  parametros = new FormData($("#formularioCrearUsuarios")[0]);
  $.ajax ({
 data:parametros,
 url:"code_php/guardarUsuarios.php",
 type:"POST",
 contentType:false,
 processData:false,
 success:function(datos){
  $("#respuesta").html(datos);
 }
  })
}
</script>