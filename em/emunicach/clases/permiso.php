<?php

namespace Clases;

use PDO;

class Permiso{

    public function __construct(){
    	}

public function validar($idmodulo,$idusuario){
		$permiso = 0;
		
        $stmt = Db::prepare("SELECT admpermiso.fkmodulo FROM admusuariogrupo
								INNER JOIN admpermiso ON admusuariogrupo.fkgrupo = admpermiso.fkgrupo
								WHERE admpermiso.fkmodulo = :idmodulo AND admusuariogrupo.fkusuario = :idusuario 
								AND admpermiso.activo = 1 AND admusuariogrupo.activo = 1");
        $stmt->bindParam(':idmodulo', $idmodulo);
		$stmt->bindParam(':idusuario', $idusuario);
        $stmt->execute();
		$datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if(count($datos) == 1){
			$permiso = 1;
			return TRUE;
			}

        $stmt = Db::prepare("SELECT fkmodulo FROM admusuariomodulo 
								WHERE fkmodulo = :idmodulo AND fkusuario = :idusuario AND activo = 1");
        $stmt->bindParam(':idmodulo', $idmodulo);
		$stmt->bindParam(':idusuario', $idusuario);
        $stmt->execute();
		$datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if(count($datos) == 1){
			$permiso = 1;
			}
		
		if($permiso == 1){
			return TRUE;
			}
		if($permiso == 0){
			return FALSE;
			}
		
    	}

    public function agregarPermisoUsuarioGrupo($idusuario, $idgrupo){
		try{
			$stmt = Db::prepare("INSERT INTO admusuariogrupo SET 
									fkgrupo = :fkgrupo, 
									fkusuario = :fkusuario");
			$stmt->bindParam(':fkgrupo', $idgrupo);
			$stmt->bindParam(':fkusuario', $idusuario);
			$stmt->execute();
			$id = Db::lastInsertId();
			return $id;
			} 
		catch(PDOException $e){ 
			echo 'Error: ' . $e->getMessage(); 
			} 
		}

	}
?>