<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ULAB</title>
	 <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
</head>
<body style="background:#002940; color:white;">
<div>
	<?php
	

	session_start();
	   $_SESSION["UsuarioConectado"];
	   session_unset();
	   ?>
		 <div class="jumbotron">
			 <div class="container">
					  <center><h1>Sistema Cerrado</h1></center>
						<center><p> ULAB</p></center>
				</div>
		 </div>
		 <?php
	   header('Refresh: 1; URL = login.php');
	?>
</div>
</body>
</html>