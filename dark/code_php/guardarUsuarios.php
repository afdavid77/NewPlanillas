<?php
date_default_timezone_set("America/Tegucigalpa");
require_once("../../conexion/connect.php");
$fecha_creacion = date('Y-m-d H:i:s');
if (!empty($_POST["codEmpleado"]) || (!empty($_POST["Registrousuario"])) 
|| (!empty($_POST["contrasenia"])) || (!empty($_POST["nombreEmpleado"])) || (!empty($_POST["rolUsuario"]))) 
{
    $codEmpleado=$_POST["codEmpleado"];
    $usuario=$_POST["Registrousuario"];
    $pass=$_POST["contrasenia"];
    $pass_cifrado=password_hash($pass,PASSWORD_DEFAULT);
    $nombreEmpleado=$_POST["nombreEmpleado"];
    $rolUsuario=$_POST["rolUsuario"];
 
}
else
{ echo "<div class='alert alert-danger'>
                    <strong>ERROR:</strong> vacio.
                </div>";
exit();
}
$query4="SELECT
tbl_info_empleado.identidad
FROM
tbl_info_empleado
WHERE tbl_info_empleado.codigo_empleado ='$codEmpleado'";
$r = mysqli_query($conexion, $query4);
$rw = mysqli_fetch_array($r);
$NumeroIdentidad= $rw['identidad'];


$buscar="SELECT
tbl_usuarios.*
FROM
tbl_usuarios
WHERE tbl_usuarios.username ='$usuario'";
$existe=$conexion->query($buscar);
$verificar=mysqli_num_rows($existe);

if ($verificar==1) {

echo "<div class='alert alert-warning'>
                    <strong>ADVERTENCIA:</strong> Usuario ya Existe En la base de Datos.
                </div>";


} else {

$sql="INSERT INTO tbl_usuarios(cod_empleado, username, clave, nombre, id_rol) VALUES(?,?,?,?,?);";
    $resultados=mysqli_prepare($conexion,$sql);
    $ok=mysqli_stmt_bind_param($resultados,"sssss",$codEmpleado,$usuario,$pass_cifrado,$nombreEmpleado,$rolUsuario);
    $ok=mysqli_stmt_execute($resultados);

if ($ok==false) {
echo "<div class='alert alert-danger'>
                    <strong>ERROR:</strong> Hubo problemas al registrar su solicitud ,Vuelva Intentarlo o comuniquese con el administrador del sistema .
                </div>";
} else {
echo "<div class='alert alert-success'>
                    <strong>INFORMACIÓN:</strong> Empleado Ingresado correctamente.
                </div>
        <script type='text/javascript'>
        document.getElementById('guardar').disabled=true;
        setTimeout(function(){window.location='index.php?pagina=crearUsuarios'} , 500);
        </script>";
mysqli_close($conexion);        
}
}


?>