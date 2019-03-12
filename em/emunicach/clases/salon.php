<?php

namespace Clases;

use PDO;

class Salon{
	
    private $idsalon;
    private $salon;
    private $descripcion;
    private $ubicacion;
    private $cupo;
    private $activo;

    public function __construct($salon = null, $descripcion = null, $ubicacion =  null, $cupo = null, $activo = null){
        $this->idingreso = null;
        $this->salon = $salon;
		$this->descripcion = $descripcion;
        $this->ubicacion = $ubicacion;
        $this->cupo = $cupo;
        $this->activo = $activo;
    	}

    public function agregarSalon(){
		try{
			$stmt = Db::prepare("INSERT INTO salon SET 
									salon = :salon, 
									descripcion = :descripcion, 
									ubicacion = :ubicacion, 
									cupo = :cupo");
			$stmt->bindParam(':salon', $this->salon);
			$stmt->bindParam(':descripcion', $this->descripcion);
			$stmt->bindParam(':ubicacion', $this->ubicacion);
			$stmt->bindParam(':cupo', $this->cupo);
			$stmt->execute();
			$id = Db::lastInsertId();
			return $id;
			} 
		catch(PDOException $e){ 
			echo 'Error: ' . $e->getMessage(); 
			} 
		}

    public function getListadoSalones(){
        $stmt = Db::prepare("SELECT * FROM salon");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    	}

	}
?>