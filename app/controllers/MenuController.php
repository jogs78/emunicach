<?php

class MenuController extends \BaseController {

	public function index()
	{
		if(Sentry::check()){
			date_default_timezone_set('America/Mexico_city');
			$pestanas = Menu::all();
			$padres = Menu::where('padre','=',0)->where('estatus','=',1)->get();
			return View::make('pestana.index',compact('pestanas','padres'));
		}else{
			return View::make('login');
		}
	}
	
	public function store()
	{		
		if(Request::ajax()){
			$rules=array(
				'nombre'=>array('required', 'string', 'max:45'),
			);			
			$validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {
                return Response::json(array(
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray(),
                    'message' => 'Error al registrar'
                ));
            }else{
				$pest = new Menu;
				$pest->nombre=Input::get('nombre');
				$pest->padre=Input::get('padre');
				$pest->estatus=1;
				$pest->registrado_por=Sentry::getUser()->id;
				$pest->save();
				return Response::json(array(
					'success' => true,
                    'message' => 'Registrado Correctamente',
				));
            }
		}
	}

	public function show(){
		if(Request::ajax()){
			$id = Input::get('id');
			$pestana = Menu::find($id);

			$papa = 'Raíz';
			if($pestana->padre != 0)
				$papa = Menu::find($pestana->padre)->pluck('nombre');

			$datos = array(
				'success' => true,
				'id' => $id,
				'nombre' => $pestana->nombre,
				'idpadre' => $pestana->padre,
				'padre' => $papa
			);
			return Response::json($datos);
		}
	}

	public function update()
	{
		if(Request::ajax()){
			$id=Input::get('id');
			$rules=array(
				'nombre'=>array('required', 'string', 'max:45'),
			);			
			$validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {
                return Response::json(array(
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray(),
                    'message' => 'Error al registrar'
                ));
            }else{
            	date_default_timezone_set('America/Mexico_city');
            	$dt = new DateTime();
				/*$pest = new Menu;*/
				$pest = Menu::find($id);
				$pest->nombre=Input::get('nombre');
				$pest->padre=Input::get('padre');
				$pest->estatus=1;
				$pest->modificado_por=Sentry::getUser()->id;
				$pest->fecha_modificacion = $dt->format('Y-m-d H:i:s');
				$pest->save();
				return Response::json(array(
					'success' => true,
                    'message' => 'Registrado Correctamente',
				));
            }
		}
	}

/*	public function deleteIfChild($id){		
		$hijas = Menu::where('padre', '=', $id)->get();
		$flag = true;
		foreach ($hijas as $hija) {
			$estatus = Contenido::where('id',$hija->id)->pluck('estatus');
			if($estatus)
				$flag = false;
		}

		if($flag){
			$data = array('success'=>true, 'message'=>'Eliminar pestañas hijas y su contenido');			
		}
		else{
			$data = array('success'=>false, 'message'=>'Tiene pestañas hijas con contenido publicado');
		}
		return $data;
		foreach ($hijas as $hija) {
					$borrar = Menu::find($hija->id);
					$borrar->delete();
				}
	}*/

	public function destroy($id)
	{
		if(Request::ajax()){			
			$flagConte = Contenido::where('idmenu', $id)->exists();
			if($flagConte){//Verificar si tiene contenido
				$estatus = Contenido::where('idmenu',$id)->pluck('estatus');
				if($estatus){//si el contenido está publicado NO elimiar
					return Response::json(array('success'=>false, 'message'=>'Tiene contenido publicado'));
				}else{//Si no está publicado verificar que no tenga hijas con contenido publicado
					$flagHijas = Menu::where('padre', '=', $id)->exists();
					if($flagHijas){//verifica que tenga hijas
						return Response::json(array('success'=>false, 'message'=>'Tiene pestañas hijas'));
					}else{//si no tiene pestaña hijas, lo elimina
						$pest = Menu::find($id);
						$pest->delete();
						DB::table('contenido')->where('idmenu','=',$id)->delete();
						return Response::json(array('success'=>true, 'message'=>'Eliminado con Éxito'));
					}
				}
			}else{
				//verificar si tiene pestañas hijas con contenido
				$flagHijas = Menu::where('padre', '=', $id)->exists();
				if($flagHijas){
					return Response::json(array('success'=>false, 'message'=>'Tiene pestañas hijas'));
				}else{//si no tiene pestaña hijas lo elimina
					$pest = Menu::find($id);
					$result = $pest->delete();
					return Response::json(array('success'=>true, 'message'=>'Eliminado con Éxito'));
				}
			}
		}
	}

}