<?php

class Noticia extends \Eloquent {
	protected $table = 'noticias';
    public $timestamps = false;

    public function saveNew($param){
        if(isset($param['id']))
            $noticia = Noticia::find($param['id']);
        else
            $noticia = new Noticia;

        DB::beginTransaction();
        try {
            $noticia->titulo=$param['titulo'];
            $noticia->enlace=$param['enlace'];
            $noticia->noticia=$param['noticia'];            
            if(isset($param['estatus']))
                $noticia->estatus = $param['estatus'];
            if(isset($param['registrado_por']))
                $noticia->registrado_por=$param['registrado_por'];
            if(isset($param['modificado_por']))
                $noticia->modificado_por=$param['modificado_por'];
            if(isset($param['fecha_modificacion']))
                $noticia->fecha_modificacion=$param['fecha_modificacion'];
            $noticia->save();
        }catch (ValidationException $e) {
            DB::rollback();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        DB::commit();
    }
}