<?php
date_default_timezone_set("America/Tegucigalpa");
require_once("../../conexion/connect.php");
$fecha_creacion = date('Y-m-d H:i:s');
if (!empty($_POST["item"]) || (!empty($_POST["descripcionProducto"])) 
|| (!empty($_POST["marcaProducto"])) || (!empty($_POST["modeloProducto"])) || (!empty($_POST["ColorProducto"])) 
|| (!empty($_POST["EstadoProducto"]))|| (!empty($_POST["numeroSerie"])) || (!empty($_POST["numeroFactura"])) 
|| (!empty($_POST["fechaCompra"])) || (!empty($_POST["cheque"])) || (!empty($_POST["fechaCheque"])) || (!empty($_POST["numeroRecepcion"])) 
|| (!empty($_POST["fechaRecepcion"])) || (!empty($_POST["costoUnitario"])) || (!empty($_POST["codigoBienes"])) || (!empty($_POST["numeroInterno"])) 
|| (!empty($_POST["fondos"])) || (!empty($_POST["observaciones"]))) {
$item=$_POST["item"];
$descripcionProducto=$_POST["descripcionProducto"];
$marcaProducto=$_POST["marcaProducto"];
$modeloProducto = $_POST["modeloProducto"];
$ColorProducto = $_POST["ColorProducto"];
$EstadoProducto = $_POST["EstadoProducto"];
$numeroSerie = $_POST["numeroSerie"];
$numeroFactura = $_POST["numeroFactura"];
$fechaCompra = $_POST["fechaCompra"];
$cheque = $_POST["cheque"];
$fechaCheque = $_POST["fechaCheque"];
$numeroRecepcion = $_POST["numeroRecepcion"];
$fechaRecepcion = $_POST["fechaRecepcion"];
$costoUnitario = $_POST["costoUnitario"];
$codigoBienes = $_POST["codigoBienes"];
$numeroInterno = $_POST["numeroInterno"];
$fondos = $_POST["fondos"];
$observaciones = $_POST["observaciones"];
// $proveedor = $_POST["proveedor"];
// $nombre_imagen=$_FILES['imagen']['name'];
// $tipo_Imagen=$_FILES['imagen']['type'];
// $tamanio_imagen=$_FILES['imagen']['size'];
// $the_munipio=$_POST["cod_Muni"];
}else
{ echo "<div class='alert alert-danger'>
                    <strong>ERROR:</strong> vacio.
                </div>";
exit();
}

$sql="INSERT INTO tbl_registro_bienes(item, descripcionProducto, marcaProducto, modeloProducto, ColorProducto, EstadoProducto,numeroSerie, numeroFactura,
fechaCompra,cheque, fechaCheque,numeroRecepcion,fechaRecepcion,costoUnitario,codigoBienes,numeroInterno,fondos,observaciones) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
$resultados=mysqli_prepare($conexion,$sql);
mysqli_stmt_bind_param($resultados,"isiiiissssssssssis",$item,$descripcionProducto,$marcaProducto,$modeloProducto,$ColorProducto,$EstadoProducto,$numeroSerie,
$numeroFactura,$fechaCompra,$cheque,$fechaCheque,$numeroRecepcion,$fechaRecepcion,$costoUnitario,$codigoBienes,$numeroInterno,$fondos,$observaciones);
$ok=mysqli_stmt_execute($resultados);

// $hst="INSERT INTO historial(Fecha_Accion, Cod_empleado, Cod_Accion)VALUES
//   (?,?,?);";
// $resultadosH=mysqli_prepare($conexion,$hst);
// mysqli_stmt_bind_param($resultadosH,"sii",$fecha_creacion,$codigo_empleado,$codAccion);
// mysqli_stmt_execute($resultadosH);

if ($ok==false) {
 echo "<div class='alert alert-danger'>
                    <strong>ERROR:</strong> Hubo problemas al registrar su solicitud ,Vuelva Intentarlo o comuniquese con el administrador del sistema.
                </div>";
} else
{
 echo "<div class='alert alert-success'>
                    <strong>INFORMACIÓN:</strong> Registro ingresado.
                </div>
           <script type='text/javascript'>
            document.getElementById('aprobar').disabled=true;
         setTimeout(function(){window.location='index.php?pagina=registroBienes'} , 500);
           </script>";
   mysqli_close($conexion);        
}

?>