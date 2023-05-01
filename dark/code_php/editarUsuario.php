<?php
date_default_timezone_set("America/Tegucigalpa");
require_once("../../conexion/connect.php");
    
    $codigo = $_POST['codigoEmpleado'];
    $nombre = $_POST['nombreUser'];
    $identidad = $_POST['identidadUser'];
    $usuario = $_POST['usuario'];
    $correo = $_POST['correoUser'];

    $sql = "UPDATE tbl_usuarios SET username = '$usuario', nombre = '$nombre', correo = '$correo', identidad = '$identidad', UNIDAD = '$unidadEmpleado' WHERE cod_empleado = '$codigo'";

    $result = mysqli_query($conexion,$sql);

    if($result){
        echo 1;
    } else{
        echo 0;
    }
?>