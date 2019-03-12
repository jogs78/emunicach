<?php
session_start();

require 'clases/config.php';
require 'clases/db.php';
require 'clases/salon.php';

use Clases\Config;
use Clases\Db;
use Clases\Salon;

if(isset($_POST['salon'])){	
	$usuario = $_SESSION['idu'];
	$salon = strtoupper($_POST['salon']);
	$desc = $_POST['descripcion'];
	$ubi = strtoupper($_POST['ubicacion']);
	$cupo = $_POST['cupo'];
	
	$obj = new Salon($salon,$desc,$ubi,$cupo);
	$guardar = $obj->agregarSalon();

	if($guardar == TRUE){
		header("Location: salonesxlistado.php");
 		}
	else{
		echo "Error";
		//header("Location:");
		}

	}
?>