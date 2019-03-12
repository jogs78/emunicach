<?php

class NoticiasController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /noticias
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Sentry::check()){
			date_default_timezone_set('America/Mexico_city');
			if(Sentry::getUser()->inGroup(Sentry::findGroupByName('ADMINISTRADOR')))
			{
				$noticia = Noticia::all();
			}elseif (Sentry::getUser()->inGroup(Sentry::findGroupByName('NORMAL'))) 
			{
				$noticia = DB::table('noticias')->where('registrado_por','=',Sentry::getUser()->id)->get();
			}else{
				return Redirect::to('login');
			}
			return View::make('noticias.index', compact('noticia'));
		}else{
			return Redirect::to('login');
		}
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /noticias/create
	 *
	 * @return Response
	 */
	public function create()
	{
		if(Sentry::check()){
			return View::make('noticias.create');
		}		
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /noticias
	 *
	 * @return Response
	 */
	public function store()
	{
		if(Request::ajax()){
			$rules = array('noticia'=>array('required', 'string'));
			$validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {
                return Response::json(array(
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray(),
                    'message' => 'Error al registrar'
                ));
            }else{
            	$noticia = new Noticia;
            	date_default_timezone_set('America/Mexico_city');
            	$param = array('titulo'=>Input::get('titulo'), 'enlace'=>Input::get('enlace'), 'noticia'=>Input::get('noticia'), 
            		'estatus'=>0, 'registrado_por'=>Sentry::getUser()->id);
				$noticia->saveNew($param);
				return Response::json(array(
					'success'=>true,
					'message'=>'Registrado Correctamente'
				));
            }			
		}
	}

	/**
	 * Display the specified resource.
	 * GET /noticias/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /noticias/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if(Sentry::check()){
			if (Sentry::getUser()->inGroup(Sentry::findGroupByName('NORMAL')) && !Sentry::getUser()->hasAccess(array("noticias.update")))
	           		return View::make('errors.403');
			$noticia = Noticia::find($id);
			return View::make('noticias.edit', compact('noticia'));
		}
		else
		{
			return Redirect::to('login');
		}
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /noticias/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if(Request::ajax()){
			$noticia = Noticia::find($id);
			$rules = array('noticia'=>array('required', 'string'));
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
            	$param = array('id'=>$id,'titulo'=>Input::get('titulo'), 'enlace'=>Input::get('enlace'), 'noticia'=>Input::get('noticia'), 
            		'modificado_por'=>Sentry::getUser()->id, 'fecha_modificacion'=>$dt->format('Y-m-d H:i:s'));
				$noticia->saveNew($param);
				return Response::json(array(
					'success'=>true,
					'message'=>'Actualizado Correctamente',
				));
			}
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /noticias/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if(Request::ajax()){
			$user = Sentry::getUser();			
			if( ($user->hasAnyAccess(array('noticias.delete'))) || (Sentry::getUser()->inGroup(Sentry::findGroupByName('ADMINISTRADOR')))){
				$noticia = Noticia::find($id);
				if($noticia->delete())
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

	public function publish(){
		if(Request::ajax()){
			$id = Input::get('id');
            $status = Input::get('option');
            if($status)
            	$message = 'Publicado con éxito';
            else
            	$message = 'La noticia se ha dejado de publicar';
            $noticia = Noticia::find($id);
            $noticia->estatus = $status;
            if($noticia->save()){
            	return Response::json(array('success'=>true,'message' => $message));
            }else{
            	return Response::json(array('success'=>false,'message' => $message));
            }
		}
	}

	public function preview($id){
		if(Sentry::check()){
			date_default_timezone_set('America/Mexico_city');
	        $menu = Menu::where('padre','=', 0)->where('estatus', '=', 1)->get();
	        $hijas = array();
	        foreach ($menu as $key => $value) {
	            $padre =  $value->id;
	            $aux = DB::table('menu')->where('padre','=', $padre)->where('estatus', '=', 1)->get();
	            if(!empty($aux))
	                $hijas[$padre] = $aux;
	        }
	        $noticias = Noticia::where('id','=',$id)->get();
	        return View::make('index',compact('menu','hijas','noticias'));
    	}else{
    		return Redirect::to('login');
    	}
	}
}