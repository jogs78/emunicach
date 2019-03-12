<?php

namespace Clases;

use PDO;

class Pestudio{

    public function __construct(){
    	}

    public function agregarPestudio($k,$nombre,$anio){
		try{
			$stmt = Db::prepare("INSERT INTO plandeestudio SET 
									k = :k, 
									nombre = :nombre, 
									anio = :anio");
			$stmt->bindParam(':k', $k);
			$stmt->bindParam(':nombre', $nombre);
			$stmt->bindParam(':anio', $anio);
			$stmt->execute();
			$id = Db::lastInsertId();
			return $id;
			} 
		catch(PDOException $e){ 
			echo 'Error: ' . $e->getMessage(); 
			} 
		}

    public function getListadoPestudio(){
        $stmt = Db::prepare("SELECT * FROM plandeestudio");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    	}

	}
?>