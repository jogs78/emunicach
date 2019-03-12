<?php

namespace Clases;

use PDO;

class Ciclo{

    public function __construct(){
    	}

    public function getListadoCiclos(){
        $stmt = Db::prepare("SELECT * FROM cicloescolar");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    	}

	}
?>