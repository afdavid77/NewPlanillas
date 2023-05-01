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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form  action="#">
                                    <div class="form-body">
                                       <h4 class="card-title">Información del bien</h4>
                                       <hr>
                                        <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="control-label">Ítem</label>
                                                        <select class="form-control custom-select" id="inlineFormCustomSelect">
                                                            <option selected>Seleccione el Ítem</option>
                                                            <option value="1">Monitor</option>
                                                            <option value="2">CPU</option>
                                                            <option value="3">Armario</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            <div class="col-md-6">
                                                <label class="control-label">Descripción:<span class="help"></span></label>
                                                <input type="text" id="example-email" name="example-email" class="form-control" >
                                            </div>
                                       
                                            <div class="col-md-6">
                                                <label>Marca:</label>
                                                <select class="form-control custom-select">
                                                    <option value="">Dell</option>
                                                    <option value="">Samsung</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Modelo:</label>
                                                <select class="form-control custom-select">
                                                    <option value="">Optiplex7040</option>
                                                    <option value="">Optiplex3020</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Estado:</label>
                                                <select class="form-control custom-select">
                                                    <option value="">Nuevo</option>
                                                    <option value="">Usado</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Fotografía</label>
                                                <input type="file" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email">Número de serie:<span class="help"></span></label>
                                                <input type="text" id="example-email" name="numserie" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email">Número de factura:<span class="help"></span></label>
                                                <input type="text" id="example-email" name="numfactura" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Fecha de Compra</label>
                                                <input type="date" id="fechacompra" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email">Cheque:<span class="help"></span></label>
                                                <input type="text" id="example-email" name="cheque" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Fecha de cheque</label>
                                                <input type="date" id="fechacheque" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email">No. Acta de Recepción:<span class="help"></span></label>
                                                <input type="text" id="example-email" name="actarecepcion" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Fecha de de recepción</label>
                                                <input type="date" id="fecharecepcion" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email">Costo unitario:<span class="help"></span></label>
                                                <input type="text" id="example-email" name="costou" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email">Código Bines:<span class="help"></span></label>
                                                <input type="text" id="example-email" name="codbienes" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email">Número interno:<span class="help"></span></label>
                                                <input type="text" id="example-email" name="interno" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label>Fondos:</label>
                                                <select class="form-control custom-select">
                                                    <option value="">FINA</option>
                                                    <option value="">Tasa de Seguridad</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Proveedor:</label>
                                                <select class="form-control custom-select">
                                                    <option value="">Utiles de Honduras</option>
                                                    <option value="">Larach&cia</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Observaciones</label>
                                                <textarea class="form-control" rows="5"></textarea>
                                            </div>
                                            <h4 class="card-title">Información de empleado</h4>
                                            <div class="form-group">
                                                <label>Registrado por:</label>
                                                <input class="form-control" type="text" placeholder="Readonly input here…" readonly>
                                            </div>
                                            <div class="form-group">
                                                <fieldset disabled>
                                                    <label for="disabledTextInput">Puesto:</label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input">
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
                             </div>   
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