<?php
   date_default_timezone_set("America/Tegucigalpa");
   require_once("../../conexion/connect.php");

   $codigoViejo = $_POST['codigoViejo']; 
   $codigoEmpleado = $_POST['codigoEmpleado'];
   $nombreEmpleado = $_POST['nombreEmpleado'];
   $identidadEmpleado = $_POST['identidadEmpleado'];
   $unidadEmpleado = $_POST['unidadEmpleado'];
   $puestoEmpleado = $_POST['puestoEmpleado'];
   $fechaEmpleado = $_POST['fechaEmpleado'];
   $regionalEmpleado = $_POST['regionalEmpleado'];

   $userR = $_POST['userR'];
    $insert = "11";
    $fecha_accion = date('Y-m-d H:i:s');

   $existe = "SELECT salario_nominal FROM tbl_planilla_oficial WHERE codigo_empleado = '$codigoViejo'";
   $existeResult = mysqli_query($conexion,$existe);

   if(mysqli_num_rows($existeResult)>0){
    $sql = "UPDATE empleados911 SET CODIGO_EMPLEADO = '$codigoEmpleado', NOMBRE_EMPLEADO = '$nombreEmpleado', PUESTO = '$puestoEmpleado', NO_IDENTIDAD = '$identidadEmpleado', UNIDAD = '$unidadEmpleado', FECHA_INGRESO = '$fechaEmpleado', REGIONAL = '$regionalEmpleado' WHERE CODIGO_EMPLEADO = '$codigoViejo'";

    $result = mysqli_query($conexion,$sql);
 
     if($result){
         $sqlS = "UPDATE tbl_planilla_oficial SET codigo_empleado = '$codigoEmpleado' WHERE codigo_empleado = '$codigoViejo'";
         $resultS = mysqli_query($conexion,$sqlS);
 
         if($resultS){
             echo 1;
             $sqlUser = "SELECT * FROM tbl_usuarios WHERE username = '$userR'";
             $resultUser = mysqli_query($conexion,$sqlUser);
             $rrr = mysqli_fetch_array($resultUser);
             $userRR = $rrr['cod_empleado'];
     
             $sqlBitacora="INSERT INTO tbl_bitacora(accion,usuario_realizo,fecha)VALUES(?,?,?);";
             $resultBitacora=mysqli_prepare($conexion,$sqlBitacora);
             mysqli_stmt_bind_param($resultBitacora,"sss",$insert,$userRR,$fecha_accion);
             mysqli_stmt_execute($resultBitacora); 
         }else{
             echo 2; //codigo error 777, no se actualizo en la tabla tbl_planilla_oficial, solo en empleados911
         }
     }else{
         echo 3; //codigo error 776, no se actualizo en la tabla empleados911 ni en tbl_planilla_oficial
     }
   } else{
    echo 0; //codigo error 775, no se encontro el empleado en tbl_planilla_oficial
   }

   //codigo de error 804, no sé :'v

    

?>