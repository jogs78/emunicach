<?php

namespace Clases;

use PDO;

class Materia{

    public function __construct(){
    	}

    public function agregarMateria($k,$fkplan,$fkmateriaant,$materia,$fkmateriasig,$creditos){
		try{
			$stmt = Db::prepare("INSERT INTO materia SET 
									k = :k, 
									fkplandeestudio = :fkplan, 
									fkmateriaant = :fkmateriaant, 
									materia = :materia, 
									fkmateriasig = :fkmateriasig,
									creditos = :creditos");
			$stmt->bindParam(':k', $k);
			$stmt->bindParam(':fkplan', $fkplan);
			$stmt->bindParam(':fkmateriaant', $fkmateriaant);
			$stmt->bindParam(':materia', $materia);
			$stmt->bindParam(':fkmateriasig', $fkmateriasig);
			$stmt->bindParam(':creditos', $creditos);
			$stmt->execute();
			$id = Db::lastInsertId();
			return $id;
			} 
		catch(PDOException $e){ 
			echo 'Error: ' . $e->getMessage(); 
			} 
		}

    public function getListadoMateria(){
        $stmt = Db::prepare("SELECT idmateria, nombre, materia, creditos 
							FROM materia
							INNER JOIN plandeestudio ON fkplandeestudio = idplandeestudio 
							WHERE materia.activo = 1");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    	}
		
    public function getListadoMateriaxDoc($iddocente){
        $stmt = Db::prepare("SELECT fkgrupo, nombre, materia FROM horario
							INNER JOIN materia ON fkmateria = idmateria
							INNER JOIN plandeestudio ON idplandeestudio = fkplandeestudio WHERE fkdocente = :iddocente");
		$stmt->bindParam(':iddocente', $iddocente);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    	}
		
    public function getListadoMateriasxPlan($idplandeestudio){
        $stmt = Db::prepare("SELECT idmateria, nombre, materia, creditos 
							FROM materia
							INNER JOIN plandeestudio ON fkplandeestudio = idplandeestudio 
							WHERE materia.activo = 1 AND idplandeestudio = :idplandeestudio");
		$stmt->bindParam(':idplandeestudio', $idplandeestudio);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    	}

	}
?>