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
                    <h4 class="text-themecolor">SISTEMA DE BIENES NACIONALES</h4>
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
                    <div class="col-sm-12">
                        <div class="card card-body">
                            <h4 class="card-title">Información del bien prestar</h4>
                            <form class="form-horizontal mt-4">
                                <div class="form-group">
                                    <label>Número interno:</label>
                                    <select class="form-control custom-select">
                                        <option value="">Optiplex7040</option>
                                        <option value="">Optiplex3020</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <fieldset disabled>
                                        <label for="disabledTextInput">Ítem:</label>
                                        <input type="text" id="item" class="form-control" placeholder="">
                                    </fieldset>
                                </div>
                                <div class="form-group">
                                    <fieldset disabled>
                                        <label for="disabledTextInput">Decripción:</label>
                                        <input type="text" id="descripcion" class="form-control" placeholder="">
                                    </fieldset>
                                </div>
                                <div class="form-group">
                                    <fieldset disabled>
                                        <label for="disabledTextInput">Marca:</label>
                                        <input type="text" id="marca" class="form-control" placeholder="">
                                    </fieldset>
                                </div>
                                <div class="form-group">
                                    <fieldset disabled>
                                        <label for="disabledTextInput">Modelo:</label>
                                        <input type="text" id="modelo" class="form-control" placeholder="">
                                    </fieldset>
                                </div>
                                <div class="form-group">
                                    <fieldset disabled>
                                        <label for="disabledTextInput">Estado:</label>
                                        <input type="text" id="estado" class="form-control" placeholder="">
                                    </fieldset>
                                </div>
                                <div class="form-group">
                                    <fieldset disabled>
                                        <label for="disabledTextInput">Número de serie:</label>
                                        <input type="text" id="numseriep" class="form-control" placeholder="">
                                    </fieldset>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Fecha inicio</label>
                                     <input type="date" id="fechacompra" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Fecha final</label>
                                     <input type="date" id="fechacheque" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Observaciones</label>
                                    <textarea class="form-control" rows="5"></textarea>
                                </div>
                                <h4 class="card-title">Información del empleado</h4>
                                <div class="form-group">
                                    <label>Nombre del responsable:</label>
                                    <select class="form-control custom-select Selecoption" id="Nombreresp" onchange="myFunction();">
                                        <option value="" selected>Seleccionar Opcion</option>
                                        <option value="0">Otros</option>
                                        <option value="1">Lidea Desiree Pineda</option>
                                        <option value="2">Lilian Carolina Padgett</option>
                                    </select>
                                    <input type="text" id="nombreRespFuera" name="nombreRespFuera" class="form-control" hidden>

                                </div>
                                 <div class="form-group">
                                    <label for="example-email">Número identidad:<span class="help"></span></label>
                                    <input type="text" id="numeroID" name="numeroID" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="example-email">Cargo:<span class="help"></span></label>
                                    <input type="text" id="cargo" name="cargo" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="example-email">Dirección/Gerencia:<span class="help"></span></label>
                                    <input type="text" id="direccion" name="direccion" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="example-email">Área/Unidad:</label>
                                    <input type="text" id="area" name="area" class="form-control" placeholder="">
                                </div>
                                <div>
                                    <label for="example-email">Institución</label>
                                    <input type="text" id="institucion" name="institucion" class="form-control">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            
 
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
 </div> 

 <script type="text/javascript">
$(document).ready(function() {
    $('#numeroID').attr('readonly', true);
    $('#cargo').attr('readonly', true);
    $('#direccion').attr('readonly', true);
    $('#area').attr('readonly', true);
    $('#institucion').attr('readonly', true);
});



function myFunction() {
 var nombreR = $("#Nombreresp").val();
 if(nombreR == 0){
    $('#nombreRespFuera').attr('hidden', false);
    $('#numeroID').attr('readonly', false);
    $('#cargo').attr('readonly', false);
    $('#direccion').attr('readonly', false);
    $('#area').attr('readonly', false);
    $('#institucion').attr('readonly', false);
 }else{
    $('#nombreRespFuera').attr('hidden', true);
    $('#numeroID').attr('readonly', true);
    $('#cargo').attr('readonly', true);
    $('#direccion').attr('readonly', true);
    $('#area').attr('readonly', true);
    $('#institucion').attr('readonly', true);
 }
}
 </script>