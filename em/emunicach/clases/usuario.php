<?php

namespace Clases;

use PDO;

class Usuario{

    public function __construct(){
    	}
		
    public function verificarUsuario($email){
        $stmt = Db::prepare("SELECT * FROM usuario WHERE email = :email AND activo = 1");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
		$datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if(count($datos) == 1)
			return TRUE;
		else
			return FALSE;
    	}

    public function verificarUsuarioDetalle($idusuario){
        $stmt = Db::prepare("SELECT * FROM usuariodet WHERE fkusuario = :fkusuario AND activo = 1");
        $stmt->bindParam(':fkusuario', $idusuario);
        $stmt->execute();
		$datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if(count($datos) == 1)
			return TRUE;
		else
			return FALSE;
    	}

    public function agregarUsuario($k, $nombre, $apellidos, $email, $pwd){
		try{
			$stmt = Db::prepare("INSERT INTO usuario SET 
									k = :k,
									nombre = :nombre, 
									apellidos = :apellidos, 
									email = :email, 
									pwd = :pwd");
			$stmt->bindParam(':k', $k);
			$stmt->bindParam(':nombre', $nombre);
			$stmt->bindParam(':apellidos', $apellidos);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':pwd', $pwd);
			$stmt->execute();
			$id = Db::lastInsertId();
			return $id;
			} 
		catch(PDOException $e){ 
			echo 'Error: ' . $e->getMessage(); 
			} 
		}

	public function agregarUsuarioDetalle($fkusuario, $fnacimiento, $sexo, $direccion, $ciudad, $estado, $cp, $telefono){
		try{
			$stmt = Db::prepare("INSERT INTO usuariodet SET 
									fkusuario = :fkusuario,
									fnacimiento = :fnacimiento, 
									sexo = :sexo, 
									direccion = :direccion,
									ciudad = :ciudad,
									estado = :estado,
									cp = :cp,
									telefono = :telefono");
			$stmt->bindParam(':fkusuario', $fkusuario);
			$stmt->bindParam(':fnacimiento', $fnacimiento);
			$stmt->bindParam(':sexo', $sexo);
			$stmt->bindParam(':direccion', $direccion);
			$stmt->bindParam(':ciudad', $ciudad);
			$stmt->bindParam(':estado', $estado);
			$stmt->bindParam(':cp', $cp);
			$stmt->bindParam(':telefono', $telefono);
			$stmt->execute();
			$id = Db::lastInsertId();
			return $id;
			} 
		catch(PDOException $e){ 
			echo 'Error: ' . $e->getMessage(); 
			} 
		}

	public function actualizarUsuarioDetalle($fkusuario, $fnacimiento, $sexo, $direccion, $ciudad, $estado, $cp, $telefono){
		try{
			$stmt = Db::prepare("UPDATE usuariodet SET 
									fnacimiento = :fnacimiento, 
									sexo = :sexo, 
									direccion = :direccion,
									ciudad = :ciudad,
									estado = :estado,
									cp = :cp,
									telefono = :telefono
									WHERE fkusuario = :fkusuario AND activo = 1");
			$stmt->bindParam(':fkusuario', $fkusuario);
			$stmt->bindParam(':fnacimiento', $fnacimiento);
			$stmt->bindParam(':sexo', $sexo);
			$stmt->bindParam(':direccion', $direccion);
			$stmt->bindParam(':ciudad', $ciudad);
			$stmt->bindParam(':estado', $estado);
			$stmt->bindParam(':cp', $cp);
			$stmt->bindParam(':telefono', $telefono);
			$stmt->execute();
			return TRUE;
			} 
		catch(PDOException $e){ 
			echo 'Error: ' . $e->getMessage(); 
			} 
		}

    public function getListadoUsuariosNuevos(){
        $stmt = Db::prepare("SELECT * FROM usuario");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    	}

    public function getUsuarioDetalle($idusuario){
        $stmt = Db::prepare("SELECT * FROM usuariodet WHERE fkusuario = :fkusuario");
		$stmt->bindParam(':fkusuario', $idusuario);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    	}

	}
?>