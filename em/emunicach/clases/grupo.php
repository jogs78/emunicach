<?php

namespace Clases;

use PDO;

class Grupo{

    public function __construct(){
    	}

    public function getIdGrupo($k){
        $stmt = Db::prepare("SELECT * FROM grupo WHERE k = :k");
        $stmt->bindParam(':k', $k);
        $stmt->execute();
		$datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if(count($datos) == 1){			
			return $datos[0]['idgrupo'];;
			}		
    	}

    public function inscribirxaCurso($idgrupo,$idusuario,$refbanco){
		try{
			$stmt = Db::prepare("INSERT INTO grupousuario SET 
									fkgrupo = :fkgrupo, 
									fkusuario = :fkusuario, 
									refbanco = :refbanco");
			$stmt->bindParam(':fkgrupo', $idgrupo);
			$stmt->bindParam(':fkusuario', $idusuario);
			$stmt->bindParam(':refbanco', $refbanco);
			$stmt->execute();
			$id = Db::lastInsertId();
			return $id;
			} 
		catch(PDOException $e){ 
			echo 'Error: ' . $e->getMessage(); 
			} 
		}

    public function getListadoGrupoActivosInscripcion(){
        $stmt = Db::prepare("SELECT k, ciclo, modalidad, nombre, turno FROM unicach.grupo 
							INNER JOIN cicloescolar ON idcicloescolar = fkcicloescolar
							INNER JOIN modalidad ON idmodalidad = fkmodalidad
							INNER JOIN ofertaeducativa ON idofertaeducativa = fkofertaeducativa
							INNER JOIN turno ON idturno = fkturno
							WHERE grupo.activo = 1 AND finscripcioni <= now() AND finscripcionf >= now()");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    	}

	}
?>