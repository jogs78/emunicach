<?php

namespace Clases;

use PDO;

class Escuela{

    public function __construct(){
    	}

    public function getIdUsuario($k){
        $stmt = Db::prepare("SELECT * FROM usuario WHERE k = :k");
        $stmt->bindParam(':k', $k);
        $stmt->execute();
		$datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if(count($datos) == 1){			
			return $datos[0]['idusuario'];;
			}		
    	}

    public function getIdGrupoxIdUsuario($idusuario){
        $stmt = Db::prepare("SELECT * FROM grupousuario WHERE fkusuario = :idusuario AND verificado = 1 AND activo = 1");
        $stmt->bindParam(':idusuario', $idusuario);
        $stmt->execute();
		$datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if(count($datos) == 1){			
			return $datos[0]['fkgrupo'];;
			}		
    	}

    public function getIdPago($k){
        $stmt = Db::prepare("SELECT * FROM pago WHERE k = :k");
        $stmt->bindParam(':k', $k);
        $stmt->execute();
		$datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if(count($datos) == 1){			
			return $datos[0]['idpago'];;
			}		
    	}

    public function addInscribirCursoUsuario($idgrupo,$idusuario,$verificado){
		try{
			$stmt = Db::prepare("INSERT INTO grupousuario SET 
									fkgrupo = :fkgrupo, 
									fkusuario = :fkusuario, 
									verificado = :verificado");
			$stmt->bindParam(':fkgrupo', $idgrupo);
			$stmt->bindParam(':fkusuario', $idusuario);
			$stmt->bindParam(':verificado', $verificado);
			$stmt->execute();
			$id = Db::lastInsertId();
			return $id;
			} 
		catch(PDOException $e){ 
			echo 'Error: ' . $e->getMessage(); 
			} 
		}
		
    public function addUsuarioPermiso($idusuario,$idgrupo){
		try{
			$stmt = Db::prepare("INSERT INTO admusuariogrupo SET
									fkusuario = :idusuario, 
									fkgrupo = :idgrupo, 
									activo = 1");
			$stmt->bindParam(':idusuario', $idusuario);
			$stmt->bindParam(':idgrupo', $idgrupo);
			$stmt->execute();
			$id = Db::lastInsertId();
			return $id;
			} 
		catch(PDOException $e){ 
			echo 'Error: ' . $e->getMessage(); 
			} 
		}

    public function addPago($k,$idusuario,$concepto,$cantidad,$pagado){
		try{
			$stmt = Db::prepare("INSERT INTO pago SET 
									k = :k,
									fkusuario = :idusuario, 
									concepto = :concepto, 
									cantidad = :cantidad, 
									pagado = :pagado");
			$stmt->bindParam(':k', $k);
			$stmt->bindParam(':idusuario', $idusuario);
			$stmt->bindParam(':concepto', $concepto);
			$stmt->bindParam(':cantidad', $cantidad);
			$stmt->bindParam(':pagado', $pagado);
			$stmt->execute();
			$id = Db::lastInsertId();
			return $id;
			} 
		catch(PDOException $e){ 
			echo 'Error: ' . $e->getMessage(); 
			} 
		}

    public function agregarHorario($idgrupo,$idmateria,$iddocente,$dia,$horai,$horaf){
		try{
			$stmt = Db::prepare("INSERT INTO horario SET 
									fkgrupo = :idgrupo, 
									fkmateria = :idmateria, 
									fkdocente = :iddocente, 
									fkdia = :dia, 
									horai = :horai, 
									horaf = :horaf");
			$stmt->bindParam(':idgrupo', $idgrupo);
			$stmt->bindParam(':idmateria', $idmateria);
			$stmt->bindParam(':iddocente', $iddocente);
			$stmt->bindParam(':dia', $dia);
			$stmt->bindParam(':horai', $horai);
			$stmt->bindParam(':horaf', $horaf);
			$stmt->execute();
			$id = Db::lastInsertId();
			return $id;
			} 
		catch(PDOException $e){ 
			echo 'Error: ' . $e->getMessage(); 
			} 
		}

    public function getListadoDias(){
        $stmt = Db::prepare("SELECT * FROM dia WHERE activo = 1");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    	}
		
    public function getHorariosListadoMateriasXGrupo($idgrupo){
        $stmt = Db::prepare("SELECT dia, horai, horaf, materia, CONCAT(nombre,' ',apellidos) AS profesor 
								FROM horario
								INNER JOIN materia ON idmateria = fkmateria
								INNER JOIN usuario ON fkdocente = idusuario
								INNER JOIN dia ON fkdia = iddia
								WHERE horario.activo = 1 AND fkgrupo = :idgrupo
								ORDER BY fkdia, horai ASC");
		$stmt->bindParam(':idgrupo', $idgrupo);
	    $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    	}
		
    public function getHorariosListadoMateriasXDocente($idusuario){
        $stmt = Db::prepare("SELECT dia, horai, horaf, materia, CONCAT(nombre,' ',apellidos) AS profesor 
								FROM horario
								INNER JOIN materia ON idmateria = fkmateria
								INNER JOIN usuario ON fkdocente = idusuario
								INNER JOIN dia ON fkdia = iddia
								WHERE horario.activo = 1 AND idusuario = :idusuario
								ORDER BY fkdia, horai ASC");
		$stmt->bindParam(':idusuario', $idusuario);
	    $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    	}
		
    public function getListadoDePagosPendientes(){
        $stmt = Db::prepare("SELECT idpago, pago.k, concepto, CONCAT(nombre,' ',apellidos) AS alumno 
								FROM pago
								INNER JOIN usuario ON fkusuario = idusuario
								WHERE pago.activo = 1 AND pagado = 0");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    	}

    public function getListadoDePagosHistorico(){
        $stmt = Db::prepare("SELECT idpago, pago.k, concepto, CONCAT(nombre,' ',apellidos) AS alumno 
								FROM pago
								INNER JOIN usuario ON fkusuario = idusuario
								WHERE pago.activo = 1 AND pagado = 1");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    	}
		
    public function getDetallePago($idpago){
        $stmt = Db::prepare("SELECT idpago, pago.k, fkusuario, concepto, CONCAT(nombre,' ',apellidos) AS alumno 
								FROM pago
								INNER JOIN usuario ON fkusuario = idusuario
								WHERE pago.activo = 1 AND idpago = :idpago");
		$stmt->bindParam(':idpago', $idpago);
		$stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    	}

    public function getTiposdeUsuarios(){
        $stmt = Db::prepare("SELECT * FROM admgrupo WHERE activo = 1");
		$stmt->bindParam(':idpago', $idpago);
		$stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    	}

	public function updatePago($idpago, $ref, $cantidad, $pagado){
		try{
			$stmt = Db::prepare("UPDATE pago SET 
									ref = :ref,
									cantidad = :cantidad,
									pagado = :pagado
									WHERE idpago = :idpago");
			$stmt->bindParam(':ref', $ref);
			$stmt->bindParam(':cantidad', $cantidad);
			$stmt->bindParam(':pagado', $pagado);
			$stmt->bindParam(':idpago', $idpago);
			$stmt->execute();
			return TRUE;
			} 
		catch(PDOException $e){ 
			echo 'Error: ' . $e->getMessage(); 
			} 
		}
		
	public function updateQuitarPermisosGrupo($idusuario){
		try{
			$stmt = Db::prepare("UPDATE admusuariogrupo SET 
									activo = 0
									WHERE fkusuario = :idusuario");
			$stmt->bindParam(':idusuario', $idusuario);
			$stmt->execute();
			return TRUE;
			} 
		catch(PDOException $e){ 
			echo 'Error: ' . $e->getMessage(); 
			} 
		}

	public function updateActivarAlumno($idusuario, $verificado){
		try{
			$stmt = Db::prepare("UPDATE grupousuario SET
									verificado = :verificado
									WHERE fkusuario = :idusuario");
			$stmt->bindParam(':idusuario', $idusuario);
			$stmt->bindParam(':verificado', $verificado);
			$stmt->execute();
			return TRUE;
			} 
		catch(PDOException $e){ 
			echo 'Error: ' . $e->getMessage(); 
			} 
		}

	}
?>