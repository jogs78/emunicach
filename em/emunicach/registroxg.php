<?php
session_start();

require 'clases/config.php';
require 'clases/db.php';
require 'clases/usuario.php';
require 'clases/permiso.php';

use Clases\Config;
use Clases\Db;
use Clases\Usuario;
use Clases\Permiso;

if(isset($_POST['nombre'])){	
	$nom = ucwords($_POST['nombre']);
	$ape = ucwords($_POST['apellidos']);
	$email = $_POST['email'];
	$pwd = md5($_POST['pwd']);
	$hoy = date("YmdHis");
	$k = strtoupper(md5($hoy.$email));		
		
	$objU = new Usuario();
	$objP = new Permiso();
	
	$guardar = $objU->verificarUsuario($email);

	if($guardar == TRUE){
		$resultado = 1; // USUARIO YA EXISTE
 		}
	else{
		$usuario = $objU->agregarUsuario($k,$nom,$ape,$email,$pwd);
		$objP->agregarPermisoUsuarioGrupo($usuario,6); // ESTUDIANTE
		
		if($usuario == TRUE)
			$resultado = 2; //EL USUARIO SE AGREGO CORRECTAMENTE
		else
			$resultado = 3; //ERROR AL REGISTRAR USUARIO
		}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Escuela de Música Unicach<</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />
<!-- BEGIN CORE CSS FRAMEWORK -->
<link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
<!-- END CORE CSS FRAMEWORK -->
<!-- BEGIN CSS TEMPLATE -->
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
<!-- END CSS TEMPLATE -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="error-body no-top">
<div class="error-wrapper container">
<div class="row">
    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-offset-1 col-xs-10">
	 <div class="error-container" >
		
		<?php if($resultado == 1){ ?>		
        <div class="error-main">
		  <div class="error-description" > Error </div>
		  <div class="error-description-mini"> Ya existe un usuario con esta información, intentalo nuevamente. </div>
		  <br>
		  <div class="row">
			<div class="input-with-icon col-md-12"> <i class="icon-search"></i>
			</div>
		  </div>
		  <br>
		  <a href="registro.php"><button class="btn btn-primary btn-cons" type="button">Registrarse</button></a>
		</div>
		<?php } ?>

		<?php if($resultado == 2){ ?>		
        <div class="error-main">
		  <div class="error-description" > Bienvenido </div>
		  <div class="error-description-mini"> El usuario se registró correctamente, ya puedes ingresar al portal. </div>
		  <br>
		  <div class="row">
			<div class="input-with-icon col-md-12"> <i class="icon-search"></i>
			</div>
		  </div>
		  <br>
		  <a href="index.php"><button class="btn btn-primary btn-cons" type="button">Ingresa al Portal</button></a>
		</div>
		<?php } ?>

		<?php if($resultado == 3){ ?>		
        <div class="error-main">
		  <div class="error-description" > Error </div>
		  <div class="error-description-mini"> Ocurrio un error al registrar al usuario, intentalo nuevamente. </div>
		  <br>
		  <div class="row">
			<div class="input-with-icon col-md-12"> <i class="icon-search"></i>
			</div>
		  </div>
		  <br>
		  <a href="registro.php"><button class="btn btn-primary btn-cons" type="button">Registrarse</button></a>
		</div>
		<?php } ?>

	  </div>
	</div>
</div>
</div>
<!-- END CONTAINER -->
<!-- BEGIN CORE JS FRAMEWORK-->
<script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<!-- BEGIN CORE TEMPLATE JS -->
<!-- END CORE TEMPLATE JS -->
</body>
</html>
<?php
	}
?>