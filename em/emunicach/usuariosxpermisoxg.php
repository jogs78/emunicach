<?php
session_start();

require 'clases/config.php';
require 'clases/db.php';
require 'clases/escuela.php';

use Clases\Config;
use Clases\Db;
use Clases\escuela;

if(isset($_POST['idu'])){	
	$hoy = date("YmdHis");
	$k = strtoupper(md5($idu.$hoy));
	$idu = $_POST['idu'];
	$grupo = $_POST['grupo'];

	$obj = new Escuela();
	$obj->updateQuitarPermisosGrupo($idu);
	$guardar = $obj->addUsuarioPermiso($idu,$grupo);

	if($guardar == TRUE){
		header("Location: usuariosxlistado.php");
 		}
	else{
		echo "Error";
		//header("Location:");
		}

	}
?>