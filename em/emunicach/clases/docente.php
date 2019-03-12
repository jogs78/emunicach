<?php

namespace Clases;

use PDO;

class Docente{

    public function __construct(){
    	}

    public function agregarDocente(){
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

    public function getListadoDocentes(){
        $stmt = Db::prepare("SELECT * FROM admusuariogrupo
								INNER JOIN usuario ON idusuario = fkusuario 
								WHERE usuario.activo = 1 AND fkgrupo = 5");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    	}

	}
?>