<?php
session_start();

require 'clases/config.php';
require 'clases/db.php';
require 'clases/escuela.php';

use Clases\Config;
use Clases\Db;
use Clases\Escuela;

if(isset($_POST['fkmateria'])){	
	$usuario = $_SESSION['idu'];
	$k = $_POST['k'];
	$idg = $_POST['idgrupo'];
	$idm = $_POST['fkmateria'];
	$idd = $_POST['fkdocente'];
	$d = $_POST['dia'];
	$hi = $_POST['hinicio'];
	$hf = $_POST['hfin'];

	$obj = new Escuela();
	$guardar = $obj->agregarHorario($idg,$idm,$idd,$d,$hi,$hf);

	if($guardar == TRUE){
		header("Location: horarioxr.php?k=$k");
 		}
	else{
		echo "Error";
		//header("Location:");
		}

	}
?>