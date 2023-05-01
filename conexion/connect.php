<?php 

$db_user = "root";
$db_password = "zwd7qWwwtcT5eCmYBKu2EApMGvr7XLt2";
$db_server = "192.168.101.121";
$db = "planillaSNE";

// $bdd = new PDO("mysql:host=localhost;dbname=solicitudes","root","!Sistemas911**");
$conexion = mysqli_connect($db_server, $db_user, $db_password, $db);
mysqli_set_charset($conexion,"utf8");
if (mysqli_connect_errno()) {
echo "fallo al conectar a la base de datos";
exit();
}

?>