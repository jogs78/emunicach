<?php

namespace Clases;

use PDO;
session_start();
class Acceso{

    public function __construct(){
    	}
		
    public function login($email,$pwd){
        $stmt = Db::prepare("SELECT * FROM usuario WHERE email = :email AND pwd = :pwd");
        $stmt->bindParam(':email', $email);
		$stmt->bindParam(':pwd', $pwd);
        $stmt->execute();
		$datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if(count($datos) == 1){
			$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
			$_SESSION['nav'] = $_SERVER['HTTP_USER_AGENT'];
			$_SESSION["nsesion"] = "UNICACH20160801";
			$_SESSION['idu'] = $datos[0]['idusuario'];
			$_SESSION['nombre'] = $datos[0]['nombre'];
			$_SESSION['apellidos'] = $datos[0]['apellidos'];
			$_SESSION['email'] = $datos[0]['email'];
			return TRUE;
			}		
    	}

	}
?>