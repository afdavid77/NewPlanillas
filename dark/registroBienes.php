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
                    <h4 class="text-themecolor">REGISTRO DE BIENES</h4>
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
                                <form id="formularioIngresarBienes" method="POST" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <h3 class="card-title">INFORMACION DEL BIEN</h3>
                                        <hr>

                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-6">
                                                 <label class="control-label">Seleccione el bien:</label>
                                                 <select class="form-control custom-select" id="item" name="item">
                                                    <?php
                                                        $listaItems = "SELECT
                                                        tbl_item.id_item, 
                                                        tbl_item.item, 
                                                        tbl_item.estado_item
                                                        FROM
                                                        tbl_item";
                                                        $resultadolistaItems = mysqli_query($conexion,$listaItems);
                                                        ?>
                                                        <option value="">--Seleccione el bien---</option>
                                                        <?php 
                                                        while($registroItems = mysqli_fetch_array($resultadolistaItems)){
                                                        ?>
                                                        <option value="<?php echo $registroItems['id_item']; ?>"><?php echo $registroItems['item']; ?></option>
                                                        <?php 
                                                        }
                                                    ?> 
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label">Descripción:</label>
                                                <input type="text"  class="form-control" id="descripcionProducto" name="descripcionProducto" placeholder="Altura, Ancho">
                                            </div>
                                            <div class="col-md-6">
                                                 <label class="control-label">Marca:</label>
                                                 <select class="form-control custom-select" name="marcaProducto" id="marcaProducto">
                                                    <?php
                                                            $listaMarca = "SELECT
                                                            tbl_marca.id_marca, 
                                                            tbl_marca.marca, 
                                                            tbl_marca.estado
                                                            FROM
                                                            tbl_marca";
                                                            $resultadolistaMarca = mysqli_query($conexion,$listaMarca);
                                                            ?>
                                                            <option value="">--Seleccione una opción---</option>
                                                            <?php 
                                                            while($registroMarcas = mysqli_fetch_array($resultadolistaMarca)){
                                                            ?>
                                                            <option value="<?php echo $registroMarcas['id_marca']; ?>"><?php echo $registroMarcas['marca']; ?></option>
                                                            <?php 
                                                            }
                                                        ?>
                                                 </select> 
                                            </div>
                                            <div class="col-md-6">
                                            <label class="control-label">Modelo:</label>
                                            
                                                <select class="form-control custom-select" name="modeloProducto" id="modeloProducto">
                                                    <?php
                                                            $listaModelos = "SELECT
                                                            tbl_modelo.id_modelo, 
                                                            tbl_modelo.modelo, 
                                                            tbl_modelo.id_marca
                                                            FROM
                                                            tbl_modelo";
                                                            $resultadolistaModelos = mysqli_query($conexion,$listaModelos);
                                                            ?>
                                                            <option value="">--Seleccione una opción---</option>
                                                            <?php 
                                                            while($registroModelos = mysqli_fetch_array($resultadolistaModelos)){
                                                            ?>
                                                            <option value="<?php echo $registroModelos['id_modelo']; ?>"><?php echo $registroModelos['modelo']; ?></option>
                                                            <?php 
                                                            }
                                                        ?>
                                                </select> 
                                            </div> 
                                            <div class="col-md-6">
                                                <label class="control-label">Color:</label>
                                                <select class="form-control custom-select" name="ColorProducto" id="ColorProducto">
                                                <?php
                                                            $listaColores = "SELECT
                                                            tbl_color.id_color, 
                                                            tbl_color.color
                                                             FROM
                                                            tbl_color";
                                                            $resultadolistacolores = mysqli_query($conexion,$listaColores);
                                                            ?>
                                                            <option value="">--Seleccione una opción---</option>
                                                            <?php 
                                                            while($registroColores = mysqli_fetch_array($resultadolistacolores)){
                                                            ?>
                                                            <option value="<?php echo $registroColores['id_color']; ?>"><?php echo $registroColores['color']; ?></option>
                                                            <?php 
                                                            }
                                                        ?>
                                                </select>
                                           </div> 
                                           <div class="col-md-6">
                                                <label class="control-label">Estado:</label>
                                                <select class="form-control custom-select" name="EstadoProducto" id="EstadoProducto">
                                                <?php
                                                            $listaEstados = "SELECT
                                                            tbl_estado.id_estado, 
                                                            tbl_estado.estado
                                                            FROM
                                                            tbl_estado";
                                                            $resultadolistaEstados = mysqli_query($conexion,$listaEstados);
                                                            ?>
                                                            <option value="">--Seleccione una opción---</option>
                                                            <?php 
                                                            while($registroEstados = mysqli_fetch_array($resultadolistaEstados)){
                                                            ?>
                                                            <option value="<?php echo $registroEstados['id_estado']; ?>"><?php echo $registroEstados['estado']; ?></option>
                                                            <?php 
                                                            }
                                                     ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label">No. serie:</label>
                                                <input type="text"  class="form-control" name="numeroSerie" id="numeroSerie">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label">No. Factura:</label>
                                                <input type="text"  class="form-control" name="numeroFactura" id="numeroFactura">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label">Fecha de compra:</label>
                                                <input type="date"  class="form-control" name="fechaCompra" id="fechaCompra">
                                            </div> 
                                            <div class="col-md-6">
                                                <label class="control-label">Cheque:</label>
                                                <input type="text"  class="form-control" name="cheque" id="cheque">
                                            </div>
                                             <div class="col-md-6">
                                                <label class="control-label">Fecha de cheque:</label>
                                                <input type="date"  class="form-control" name="fechaCheque" id="fechaCheque">
                                           </div>  
                                           <div class="col-md-6">
                                                <label class="control-label">No. acta de Recepción:</label>
                                                <input type="text"  class="form-control" name="numeroRecepcion" id="numeroRecepcion">
                                           </div>
                                            <div class="col-md-6">
                                                <label class="control-label">Fecha de recepción:</label>
                                                <input type="date"  class="form-control" name="fechaRecepcion" id="fechaRecepcion">
                                           </div>
                                           <div class="col-md-6">
                                                <label class="control-label">Costo unitario:</label>
                                                <input type="text"  class="form-control" name="costoUnitario" id="costoUnitario">
                                           </div>
                                           <div class="col-md-6">
                                                <label class="control-label">código bienes:</label>
                                                <input type="text" class="form-control" name="codigoBienes" id="codigoBienes">
                                           </div>
                                           <div class="col-md-6">
                                                <label class="control-label">No. interno:</label>
                                                <input type="text"  class="form-control" name="numeroInterno" id="numeroInterno">
                                           </div>
                                           <div class="col-md-6">
                                                 <label class="control-label">Fondos:</label>
                                                 <select class="form-control custom-select" name="fondos" id="fondos">
                                                 <?php
                                                            $listaProveedor = "SELECT
                                                            tbl_fondos.id_fondos, 
                                                            tbl_fondos.nombre_fondos
                                                            FROM
                                                            tbl_fondos";
                                                            $resultadolistaProveedor = mysqli_query($conexion,$listaProveedor);
                                                            ?>
                                                            <option value="">--Seleccione una opción---</option>
                                                            <?php 
                                                            while($registroProveedor = mysqli_fetch_array($resultadolistaProveedor)){
                                                            ?>
                                                            <option value="<?php echo $registroProveedor['id_fondos']; ?>"><?php echo $registroProveedor['nombre_fondos']; ?></option>
                                                            <?php 
                                                            }
                                                     ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                 <label class="control-label">Proveedores:</label>
                                                 <select class="form-control custom-select" name="proveedores" id="proveedores">
                                                 <?php
                                                            $listaProveedores = "SELECT
                                                            tbl_proveedores.ID, 
                                                            tbl_proveedores.nombre_empresa
                                                            FROM
                                                            tbl_proveedores";
                                                            $resultadolistaProveedores = mysqli_query($conexion,$listaProveedores);
                                                            ?>
                                                            <option value="">--Seleccione una opción---</option>
                                                            <?php 
                                                            while($registroProveedores = mysqli_fetch_array($resultadolistaProveedores)){
                                                            ?>
                                                            <option value="<?php echo $registroProveedores['ID']; ?>"><?php echo $registroProveedores['nombre_empresa']; ?></option>
                                                            <?php 
                                                            }
                                                     ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                 <label class="control-label">Regional:</label>
                                                 <select class="form-control custom-select" name="regional" id="regional">
                                                 <?php
                                                            $listaRegionales = "SELECT
                                                            tbl_regionales.codigo_municipio,
                                                            tbl_regionales.municipio
                                                            FROM
                                                            tbl_regionales";
                                                            $resultadolistaRegionales = mysqli_query($conexion,$listaRegionales);
                                                            ?>
                                                            <option value="">--Seleccione una opción---</option>
                                                            <?php 
                                                            while($registroRegionales = mysqli_fetch_array($resultadolistaRegionales)){
                                                            ?>
                                                            <option value="<?php echo $registroRegionales['codigo_municipio']; ?>"><?php echo $registroRegionales['municipio']; ?></option>
                                                            <?php 
                                                            }
                                                     ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                 <label class="control-label">Observaciones:</label>
                                                 <input type="text" class="form-control" name="observaciones" id="observaciones">
                                            </div>
                                         
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
                                        <center><button type="button" id="aprobar" name="aprobar" class="btn btn-success" onclick="ingresar();"> <i class="fa fa-check"></i> Guardar</button></center>
                                        
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
  var  parametros = new FormData($("#formularioIngresarBienes")[0]);
  $.ajax ({
 data:parametros,
 url:"code_php/GuardarBienes.php",
 type:"POST",
 contentType:false,
 processData:false,
 success:function(datos){
  $("#respuesta").html(datos);
 }
  })
}
</script>