<?php
session_start();

require 'clases/config.php';
require 'clases/db.php';
require 'clases/escuela.php';
require 'clases/permiso.php';

use Clases\Config;
use Clases\Db;
use Clases\Escuela;
use Clases\Permiso;

if(isset($_POST['nref'])){	
	$idpago = $_POST['idpago'];
	$idusuario = $_POST['idusuario'];
	$nref = $_POST['nref'];
	$cantidad = $_POST['cantidad'];
		
		
	$objG = new Escuela();
	$objP = new Permiso();

	$guardar = $objG->updatePago($idpago,$nref,$cantidad,1);
	$guardar = $objG->updateActivarAlumno($idusuario,1);
	
	$objP->updatePermisosUsuario($idusuario);
	
	$objP->agregarPermisoUsuarioGrupo($idusuario,6); // ESTUDIANTE
		

	if($guardar == TRUE){
		header("Location: pagoxlistado.php");
 		}
	else{
		}
	}