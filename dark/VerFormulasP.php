<?php


$sqlTablaForm = "SELECT * FROM tbl_formulas";
$result = mysqli_query($conexion,$sqlTablaForm);




   



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
                        <h4 class="card-title">FORMULAS</h4>
                        <div class="table-responsive m-t-40">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Formula</th>
                                        <th>Campo</th>
                                        <th>Valor</th>
                                        <th>Modificar Valor</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    while($mostrar = mysqli_fetch_array($result)){
                                        $idFormula = $mostrar['id'];
                                        $formu = $mostrar['formula'];
                                        $valorF = $mostrar['valorModificable'];
                                        $nameForm = $mostrar['nombreFormula'];
                                ?>
                                    <tr>
                                        <td><?php echo $nameForm; ?></td>
                                        <td><?php echo $formu; ?></td>
                                        <td style="color:#d68f25;font-weight: bold;"><?php echo $valorF; ?>
                                    
                                    </td>
                                        <td>
                                            <button type="button" class="btn btn-dark" onclick="obtenerInfoFormula(<?php echo $idFormula; ?>)" data-toggle="modal" data-target="#modificarFormula">Modificar</button>
                                        </td>
                                        
                                    </tr>
                                    <?php
                                            }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                            <!-- Button trigger modal -->
                            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                 calculo incapacidad
                            </button> -->

                            
                        
                    </div>
                </div>
            
 
                                                    <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Días de Incapacidad</h5>
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
                                        <input readonly type="text" name="techoIncapacidad" id="techoIncapacidad" value="<?php echo $techoIncapacidad; ?>">
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-primary" onclick="enviarForm();">Enviar</button>
                                </div>
                                </div>
                            </div>
                            </div>


                <!-- Button trigger modal -->
                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modificarFormula">
                        Launch demo modal
                        </button> -->

                        <!-- Modal -->
                        <div class="modal fade" id="modificarFormula" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modificacion de variables</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="frmModificar">
                                        <input type="text" hidden readonly name="idFormula" id="idFormula">
                                        <input type="text" hidden readonly name="accion" id="accion" value="2">
                                        <input type="text" id="userR" name="userR" value="<?php echo $_SESSION["UsuarioConectado"]; ?>" hidden readonly>
                                        <label> Valor actual: </label> <br>
                                        <input type="text" name="valorObt" id="valorObt" readonly><br><br>
                                        <label> Ingrese el nuevo valor: </label> <br>
                                        <input type="number" name="newValue" id="newValue" ><br><br>
                                        <label> Confirme el nuevo valor: </label> <br>
                                        <input type="number" name="newValueC" id="newValueC" >
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCancelar">Cerrar</button>
                                <button type="button" class="btn btn-primary" onclick="modificarFormula();">Modificar</button>
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

function enviarForm(){
        $.ajax({
            method:"POST",
            data:$('#frmIncapacidad').serialize(),
            url:"code_php/formulitas.php",
            success:function(respuesta){
                
                console.log(respuesta);
               
            }
        });
    }

function obtenerInfoFormula(idFormula){
             $('#idFormula').val(idFormula);
    $.ajax({
            method:"POST",
            data:"idFormula=" + idFormula + "&accion=1",
            url:"code_php/obtenerInfoFormula.php",
            success:function(respuesta){
                
                // respuesta = jQuery.parseJSON(respuesta);
               
                console.log(respuesta);
               
                $('#valorObt').val(respuesta);
                
               
            }
        });
}

function modificarFormula(){
    valU = $('#newValue').val();
    valC = $('#newValueC').val();

    if(valU != "" && valC != ""){
        if(valU == valC){
                $.ajax({
                method:"POST",
                data:$('#frmModificar').serialize(),
                url:"code_php/obtenerInfoFormula.php",
                success:function(respuesta){
                    if(respuesta == 1){
                    Swal.fire({
                                    icon: 'success',
                                    title: '¡Formula modificada con éxito!',
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                        document.getElementById("btnCancelar").click();
                        $('#newValue').val("");
                        $('#newValueC').val("");
                        location.reload();
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
        }else{ 
            Swal.fire({
                       icon: 'error',
                       title: '¡Los valores no coinciden!',
                       showConfirmButton: false,
                       timer: 3000
                         });
        }
    }else{ 
            Swal.fire({
                       icon: 'error',
                       title: '¡Debe llenar ambos campos!',
                       showConfirmButton: false,
                       timer: 3000
                         });
        // alert("llene ambos campos");
    }

    

}

 </script>