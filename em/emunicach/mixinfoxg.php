<?php
session_start();

$idusuario = $_SESSION['idu'];

require 'clases/config.php';
require 'clases/db.php';
require 'clases/usuario.php';

use Clases\Config;
use Clases\Db;
use Clases\Usuario;

if(isset($_POST['sexo'])){	
	$fnc = $_POST['fnacimiento'];
	$sex = $_POST['sexo'];
	$dir = $_POST['direccion'];
	$ciu = $_POST['ciudad'];
	$est = $_POST['estado'];
	$cp = $_POST['cp'];
	$tel = $_POST['tel'];	
		
	$obj = new Usuario();
	$existe = $obj->verificarUsuarioDetalle($idusuario);

	if($existe == TRUE){
		$usuariodet = $obj->actualizarUsuarioDetalle($idusuario,$fnc,$sex,$dir,$ciu,$est,$cp,$tel);
		if($usuariodet == TRUE){
			echo "El detalle del usuario se actualizo correctamente.";
			header("Location: mixinfo.php");
			}
		else
			echo "Error al actualizar del detalle del usuario.";
 		}
	else{
		$usuariodet = $obj->agregarUsuarioDetalle($idusuario,$fnc,$sex,$dir,$ciu,$est,$cp,$tel);
		if($usuariodet == TRUE){
			echo "El detalle del usuario se agrego correctamente.";
			header("Location: mixinfo.php");
			}
		else
			echo "Error al registrar del detalle del usuario.";
		//header("Location:");
		}

	}

?>