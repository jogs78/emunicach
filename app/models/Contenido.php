<?php

class Contenido extends \Eloquent {
	protected $table = 'contenido';
    public $timestamps = false;

    public function rules(){
    	return array(
    		'titulo'=> array('required', 'string','max:255'),			
			'conten'=> array('required', 'string')
    	);    	
    }

    public function attributeLabels(){
    	return array(
    		'titulo'=> 'Título',
			'conten'=> 'Contenido'
		);
    }

    public function saveContent($param){
        if(isset($param['id']))
            $contenido = Contenido::find($param['id']);
        else
            $contenido = new Contenido;

        DB::beginTransaction();
        try {
            $contenido->titulo=$param['titulo'];
            if(isset($param['descripcion']))
                $contenido->descrip=$param['descripcion'];
            $contenido->conten=$param['contenido'];
            if(isset($param['idMenu']))
                $contenido->idmenu=$param['idMenu'];
            if(isset($param['estatus']))
                $contenido->estatus = $param['estatus'];
            if(isset($param['registrado_por']))
                $contenido->registrado_por=$param['registrado_por'];
            if(isset($param['modificado_por']))
                $contenido->modificado_por=$param['modificado_por'];
            if(isset($param['fecha_modificacion']))
                $contenido->fecha_modificacion=$param['fecha_modificacion'];
            $contenido->save();
        }catch (ValidationException $e) {
            DB::rollback();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        DB::commit();
    }
}