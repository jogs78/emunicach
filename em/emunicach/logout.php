<?php
session_start();
 
// EVITAMOS SUPLANTACION DE SESSIONES
if($_SESSION['ip'] != $_SERVER['REMOTE_ADDR'] || $_SESSION['nav'] != $_SERVER['HTTP_USER_AGENT']){
    header("Location: index.php");	
	}

// VALIDAMOS SESION DE SISTEMA
if($_SESSION['nsesion'] != "RMSG20160707"){
    header("Location: index.php");	
	}

// VERIFICA SESSION ACTIVA
if(!isset($_SESSION['idu'])){	
	header("Location: index.php");
	}
else{
	// Destruir todas las variables de sesión.
	$_SESSION = array();
	if(ini_get("session.use_cookies")){
		$params = session_get_cookie_params();
		setcookie(session_name(), '', time() - 42000,
		$params["path"], $params["domain"],
		$params["secure"], $params["httponly"]);
		}	
	// Finalmente, destruir la sesión.
	$fecha =  date ("Y-m-d"); 	
	$hora =  date ("H:i:s");

	if(session_destroy()){ 
		header("location: index.php");
		}	
	}
?>