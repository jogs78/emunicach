<?php
session_start();

require 'clases/config.php';
require 'clases/db.php';
require 'clases/grupo.php';

use Clases\Config;
use Clases\Db;
use Clases\Grupo;

if(isset($_POST['idg'])){	
	$idusuario = $_SESSION['idu'];
	$idgrupo = $_POST['idgrupo'];
	
	$obj = new Grupo();
	echo $guardar = $obj->inscribirxaCurso($idgrupo,$idusuario,"");

	if($guardar == TRUE){
		header("Location: principal.php");
 		}
	else{
		echo "Error";
		//header("Location:");
		}

	}
?>