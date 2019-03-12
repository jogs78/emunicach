<?php
session_start();

require 'clases/config.php';
require 'clases/db.php';
require 'clases/pestudio.php';

use Clases\Config;
use Clases\Db;
use Clases\Pestudio;

if(isset($_POST['nplan'])){	
	$idu = $_SESSION['idu'];
	$hoy = date("YmdHis");
	$k = strtoupper(md5($idu.$hoy));
	$nplan = strtoupper($_POST['nplan']);
	$anio = $_POST['anio'];
	
	$obj = new Pestudio();
	$guardar = $obj->agregarPestudio($k,$nplan,$anio);

	if($guardar == TRUE){
		header("Location: pestudioxlistado.php");
 		}
	else{
		echo "Error";
		//header("Location:");
		}

	}
?>