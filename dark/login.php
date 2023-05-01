<?php
if (isset($_POST["entrar"])) {
    require_once("../conexion/connect.php");
    $user=$_POST["user"];
    $clave=$_POST["pwd"];
    $q="SELECT
	tbl_usuarios.*
    FROM
	tbl_usuarios
	WHERE tbl_usuarios.username = '$user' AND tbl_usuarios.activo =1";
    $r = mysqli_query($conexion, $q);
    $n = mysqli_num_rows($r);
    
    if ($n==1) {
    
    $rw = mysqli_fetch_array($r);
    $hash= $rw['clave'];

    if (password_verify($clave, $hash)) {
           session_start();
    
            $_SESSION["UsuarioConectado"] = $_POST["user"];
            $_SESSION["last_time"] =  time();
            header("location: index.php");
    
    
    } else {
        echo 'La contraseña no es válida.';
     }
    } 
    else {
          
      echo 'usuario incorrecto';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/911/favicon-16x16.png">
    <title>ULAB 9-1-1</title>
    
    <!-- page css -->
    <link href="dist/css/pages/login-register-lock.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="skin-default card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">ULAB 9-1-1</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image:url(../assets/images/background/gris2.jpg);">
            <div class="login-box card">
                    <div class="card-header pb-0 text-start colorFondo">
                    <br> 
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-4">
                            <img src="../assets/images/911/911R.PNG" alt="" width="90px" style="margin-top:0px; color: #ced6db;">
                            </div>
                            <div class="col-sm-8">
                            <h4 class="font-weight-bolder" style="margin-top:25px;">SISTEMA DE PLANILLAS</h4>
                            </div>
                        </div>
                    </div> <br><br>
                <div class="card-body">
                    
                    <form class="form-horizontal form-material" action="login.php" method="post">
                      
                        <h3 class="text-center m-b-20">INICIO DE SESIÓN</h3>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" placeholder="Usuario" name="user" id="user" autocomplete="off" autofocus required > 
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password"  placeholder="Contraseña" name="pwd" id="pwd" autocomplete="off" required>
                             </div>
                        </div>
                        <!-- <div class="form-group row">
                            <div class="col-md-12">
                                <div class="d-flex no-block align-items-center">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Remember me</label>
                                    </div> 
                                    <div class="ml-auto">
                                        <a href="javascript:void(0)" id="to-recover" class="text-muted"><i class="fas fa-lock m-r-5"></i> Forgot pwd?</a> 
                                    </div>
                                </div>
                            </div>
                        </div> -->
                                <br>
                                <div class="form-group text-center">
                                    <div class="col-xs-12 p-b-20">
                                    <input type="submit" class="btn btn-block btn-lg btn-info btn-rounded" id="entrar" name="entrar" value="Ingresar">
                                    </div>
                                </div>
                        
                      
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                                <!-- <div class="social">
                                    <button class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fab fa-facebook-f"></i> </button>
                                    <button class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fab fa-google-plus-g"></i> </button>
                                </div> -->
                            </div>
                        </div>
                        <div class="form-group m-b-0">
                            <!-- <div class="col-sm-12 text-center">
                                Don't have an account? <a href="pages-register.html" class="text-info m-l-5" ><b></b></a>
                            </div> -->
                        </div>
                    </form>
                    <form class="form-horizontal" id="recoverform" action="index.html">
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <h3>Recover Password</h3>
                                <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" placeholder="Email"> </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/node_modules/popper/popper.min.js"></script>
    <script src="../assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!--Custom JavaScript -->
    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
        // ============================================================== 
        // Login and Recover Password 
        // ============================================================== 
        $('#to-recover').on("click", function() {
            $("#    ").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>
    
</body>

</html>