<?php
session_start();

require 'clases/config.php';
require 'clases/db.php';
require 'clases/grupo.php';
require 'clases/permiso.php';

use Clases\Config;
use Clases\Db;
use Clases\Grupo;
use Clases\Permiso;

if(isset($_POST['nref'])){	
	$idusuario = $_POST['idusuario'];
	$nref = $_POST['nref'];
		
		
	$objG = new Grupo();

	$guardar = $objG->actualizarRefBanco($idusuario,$nref);
		

	if($guardar == TRUE){
		header("Location: estudiantesxinscritos.php");
 		}
	else{
		}
	}