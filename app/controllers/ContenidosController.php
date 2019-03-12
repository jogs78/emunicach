<?php

class ContenidosController extends \BaseController {

	public function index()
	{		
		if(Sentry::check())
		{
			date_default_timezone_set('America/Mexico_city');
			if(Sentry::getUser()->inGroup(Sentry::findGroupByName('ADMINISTRADOR')))
			{
				$menu = Menu::all();
				$contenido = Contenido::all();
			}elseif (Sentry::getUser()->inGroup(Sentry::findGroupByName('NORMAL'))) 
			{
				try
				{
				    $user = Sentry::getUser();
				    $permissions = $user->getPermissions();
				    foreach ($permissions as $key => $value) {	    	
				    	$aux[]= strstr($key, '.', true).'<br>';
				    }
				    $aux = array_unique ($aux);
				    $menu = DB::table('menu')->whereIn('id',$aux)->orWhereIn('padre',$aux)->get();
				    
					foreach ($menu as $key => $value) {
						$menuID[] = $value->id;
					}
					$contenido = DB::table('contenido')->whereIn('idmenu',$menuID)->get();
				}
				catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
				{
				    //'User was not found.';
				    return Redirect::to('login');
				}
			}else{
				return Redirect::to('login');
			}
			return View::make('contenidos.index', compact('menu','contenido'));
		}else
		{
			return Redirect::to('login');
		}
	}

	public function create(){
		if(Sentry::check())
		{
			date_default_timezone_set('America/Mexico_city');
			if(Sentry::getUser()->inGroup(Sentry::findGroupByName('ADMINISTRADOR')))
			{
				$query  = "SELECT menu.id, menu.nombre FROM menu WHERE menu.id NOT IN(SELECT menu.id FROM contenido JOIN menu ON menu.id=idmenu)";
				$menu = DB::select(DB::raw($query));
				$contenido = Contenido::all();
			}elseif (Sentry::getUser()->inGroup(Sentry::findGroupByName('NORMAL')))
			{
				try
				{
				    $user = Sentry::getUser();
				    $permissions = $user->getPermissions();
				    foreach ($permissions as $key => $value) {
				    	$aux[]= strstr($key, '.', true);
				    }
				    $aux = array_unique($aux);
				    $key = array_search("noticias", $aux);
				    unset($aux[$key]);

				    $query  = "SELECT menu.id, menu.nombre FROM menu WHERE menu.id IN(SELECT menu.id FROM menu WHERE menu.id IN(".implode(',', $aux).") OR padre IN(".implode(',', $aux).") ) ";
				    $query .= "AND menu.id NOT IN(SELECT menu.id FROM contenido JOIN menu ON menu.id=idmenu)";

				    $menu = DB::select(DB::raw($query));
				}
				catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
				{
				    //'User was not found.';
				    return Redirect::to('login');
				}
			}else{
				return View::make('errors.403');
			}

			return View::make('contenidos.create', compact('menu'));
		}else
		{
			return Redirect::to('login');
		}
	}

	public function store()
	{
		if(Request::ajax()){
			$contenido = new Contenido;
			$validator = Validator::make(Input::all(), $contenido->rules());
			$validator->setAttributeNames($contenido->attributeLabels());

            if ($validator->fails()) {
                return Response::json(array(
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray(),
                    'message' => 'Error al registrar'
                ));
            }else{
            	date_default_timezone_set('America/Mexico_city');    			
            	$estatus = 0;    			
            	$param = array('titulo'=>Input::get('titulo'), 'descripcion'=>Input::get('descripcion'), 'contenido'=>Input::get('conten'), 
            		'idMenu'=>Input::get('pestana'), 'estatus'=>$estatus, 'registrado_por'=>Sentry::getUser()->id);
				$contenido->saveContent($param);
				return Response::json(array(
					'success'=>true,
					'message'=>'Registrado Correctamente'
				));
            }
		}
	}

	public function imageUpload(){
		$dir = public_path().'/img/';
		$file = Input::file('file');
		if ($file->isValid()){
			$ext = $file->getClientOriginalExtension();
			if($ext == 'png'
			   || $ext == 'jpg'
			   || $ext == 'gif'
			   || $ext == 'jpeg'
			   || $ext == 'pjpeg'
			){
				// setting file's mysterious name
				$filename = md5(date('YmdHis')).'.'.$ext;
				// copying
				$file->move($dir, $filename);					
				// displaying file
				$array = array(
					'filelink' => asset('img').'/'.$filename
				);
				echo stripslashes(json_encode($array));
			}
		}
	}

	public function fileUpload(){
		$dir = public_path().'/files/';
		$file = Input::file('file');
		if ($file->isValid()){
			$ext = $file->getClientOriginalExtension();
			if($ext == 'pdf'
			   || $ext == 'doc'
			   || $ext == 'docx'
			   || $ext == 'xls'
			   || $ext == 'xlsx'
			   || $ext == 'ppt'
			   || $ext == 'pptx'
			   || $ext == '.txt'
			){
				// setting file's mysterious name				
				$filename = Input::file('file')->getClientOriginalName();
				// copying
				$file->move($dir, $filename);					
				// displaying file
				$array = array(
					'filelink' => asset('files').'/'.$filename,
					'filename' => $filename
				);
				echo stripslashes(json_encode($array));
			}
		}
	}

	public function show()
	{
		date_default_timezone_set('America/Mexico_city');
		$idpubli= $_GET['ip'];
        $menu = Menu::where('padre','=', 0)->where('estatus', '=', 1)->get();
        $hijas = array();
        foreach ($menu as $key => $value) {
            $padre =  $value->id;            
            $aux = DB::table('menu')->where('padre','=', $padre)->where('estatus', '=', 1)->get();
            if(!empty($aux))
                $hijas[$padre] = $aux;
        }
		$contenido = Contenido::where('idMenu','=', $idpubli)->where('estatus','=',1)->get();
		return View::make('contenidos.show', compact('menu','hijas','contenido'));
	}

	public function preview(){
		if(Sentry::check())
		{
			$idpubli= $_GET['ip'];
			
			$menu = Menu::where('padre','=', 0)->where('estatus', '=', 1)->get();
			$hijas = array();
			foreach ($menu as $key => $value) {
				$padre =  $value->id;            
				$aux = DB::table('menu')->where('padre','=', $padre)->where('estatus', '=', 1)->get();
				if(!empty($aux))
					$hijas[$padre] = $aux;
			}

			date_default_timezone_set('America/Mexico_city');
			if(Sentry::getUser()->inGroup(Sentry::findGroupByName('ADMINISTRADOR')))
			{				
				$contenido = Contenido::where('idMenu','=', $idpubli)->get();
			}elseif (Sentry::getUser()->inGroup(Sentry::findGroupByName('NORMAL'))) 
			{
				try
				{
				    $user = Sentry::getUser();
				    $permissions = $user->getPermissions();
				    foreach ($permissions as $key => $value) {
				    	$aux[]= strstr($key, '.', true).'<br>';
				    }
				    $aux = array_unique ($aux);
				    $pestanas = DB::table('menu')->whereIn('id',$aux)->orWhereIn('padre',$aux)->get();
				    
					foreach ($pestanas as $key => $value)
						$menuID[] = $value->id;
					
					if(in_array($idpubli, $menuID))
					{
						$contenido = Contenido::where('idMenu','=', $idpubli)->get();
					}else
					{
						return View::make('errors.403');
					}
					
				}
				catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
				{
				    //'User was not found.';
				    return Redirect::to('login');
				}
			}else{
				return Redirect::to('login');
			}		
			return View::make('contenidos.show', compact('menu','hijas','contenido'));
		}else
		{
			return Redirect::to('login');
		}
	}

	public function edit($id)
	{
		if(Sentry::check()){
			if(Sentry::getUser()->inGroup(Sentry::findGroupByName('ADMINISTRADOR')))
			{
				
			}elseif (Sentry::getUser()->inGroup(Sentry::findGroupByName('NORMAL'))) 
			{
				$permissions = DB::table('contenido')
	            		->join('menu', 'menu.id', '=', 'idmenu')
	            		->select('menu.id', 'padre')
	            		->where('contenido.id','=', $id)
	            		->first();	            
	           	if(!Sentry::getUser()->hasAnyAccess(array($permissions->id.'.update', $permissions->padre.'.update')))
	           		return View::make('errors.403');
			}else
			{
				return Redirect::to('login');
			}

			$contenido = DB::table('contenido')
							 ->join('menu', 'menu.id','=', 'idmenu')
							 ->where('contenido.id', '=', $id)
							 ->select('contenido.*', 'menu.id as menu', 'menu.nombre')
							 ->first();
			return View::make('contenidos.edit', compact('contenido'));
		}		
	}

	public function update($id)
	{
		if(Request::ajax()){
			$contenido = new Contenido;
			$validator = Validator::make(Input::all(), $contenido->rules());
			$validator->setAttributeNames($contenido->attributeLabels());

            if ($validator->fails()) {
                return Response::json(array(
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray(),
                    'message' => 'Error al registrar'
                ));
            }else{
            	date_default_timezone_set('America/Mexico_city');
            	$dt = new DateTime();
            	$param = array('id'=>$id,'titulo'=>Input::get('titulo'), 'descripcion'=>Input::get('descripcion'), 'contenido'=>Input::get('conten'), 
            		'modificado_por'=>Sentry::getUser()->id, 'fecha_modificacion'=>$dt->format('Y-m-d H:i:s'));
				$contenido->saveContent($param);
				return Response::json(array(
					'success'=>true,
					'message'=>'Actualizado Correctamente',
				));
			}
		}
	}

	public function publish(){
		if(Request::ajax()){
			$id = Input::get('id');
            $status = Input::get('option');

            if($status)
            	$message = 'Publicado con éxito';
            else
            	$message = 'El contenido se ha dejado de publicar';
            $contenido = Contenido::find($id);
            $contenido->estatus = $status;
            if($contenido->save()){
            	return Response::json(array(
            		'success'=>true,
            		'message' => $message
            	));
            }else{
            	return Response::json(array(
            		'success'=>false,
            		'message' => $message
            	));
            }
		}
	}

	public function destroy($id)
	{
		if(Request::ajax()){
			$user = Sentry::getUser();
			$permissions = DB::table('contenido')
	            		->join('menu', 'menu.id', '=', 'idmenu')
	            		->select('menu.id', 'padre')
	            		->where('contenido.id','=', $id)
	            		->first();
			if( ($user->hasAnyAccess(array($permissions->id.'.delete', $permissions->padre.'.delete'))) || (Sentry::getUser()->inGroup(Sentry::findGroupByName('ADMINISTRADOR')))){
				$contenido = Contenido::find($id);
				if($contenido->delete())
					return Response::json(array('success'=>true));
				else
					return Response::json(array('success'=>false));
			}else{
				
				return Response::json(array(
					'success'=>false
				));
			}	
		}
	}

}