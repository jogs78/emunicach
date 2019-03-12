<?php
session_start();

require 'clases/config.php';
require 'clases/db.php';
require 'clases/materia.php';

use Clases\Config;
use Clases\Db;
use Clases\Materia;

if(isset($_POST['fkplan'])){	
	$idu = $_SESSION['idu'];
	$hoy = date("YmdHis");
	$k = strtoupper(md5($idu.$hoy));
	$fkplan = $_POST['fkplan'];
	$fkmateriaant = $_POST['fkmateriaant'];
	$materia = $_POST['materia'];
	$fkmateriasig = $_POST['fkmateriasig'];
	$creditos = $_POST['creditos'];
	
	$obj = new Materia();
	$guardar = $obj->agregarMateria($k,$fkplan,$fkmateriaant,$materia,$fkmateriasig,$creditos);

	if($guardar == TRUE){
		header("Location: materiaxlistado.php");
 		}
	else{
		echo "Error";
		//header("Location:");
		}

	}
?>