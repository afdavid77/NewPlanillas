<?php
	$db_user = "sistema.ubn";
	$db_password = "conKEREprONE";
	$db_server = "192.168.100.100";
	$db = "solicitudes";

    // $bdd = new PDO("mysql:host=localhost;dbname=solicitudes","root","!Sistemas911**");
	$conexion = mysqli_connect($db_server, $db_user, $db_password, $db);
    mysqli_set_charset($conexion,"utf8");
    if (mysqli_connect_errno()) {
	echo "fallo al conectar a la base de datos";
	exit();
}
?>