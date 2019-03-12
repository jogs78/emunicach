<?php
require 'clases/config.php';
require 'clases/db.php';
require 'clases/acceso.php';

use Clases\Config;
use Clases\Db;
use Clases\Acceso;

if(isset($_POST['email'])){	
	$email = $_POST['email'];
	$pwd = md5($_POST['pwd']);
	
	$obj = new Acceso();
	$acceso = $obj->login($email,$pwd);

	if($acceso == TRUE){
		header("Location:principal.php");
 		}
	else{
		header("Location:index.php");		
		}
	}
?>