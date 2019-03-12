<?php

class UsuariosControler extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /usuarioscontroler
	 *
	 * @return Response
	 */
	public function index()
	{
		date_default_timezone_set('America/Mexico_city');
		if(Sentry::check()){
			$user = Sentry::getUser();
			$adminGroup = Sentry::findGroupByName('ADMINISTRADOR');
	  		if ( $user->inGroup($adminGroup) ){
	  			//$users=DB::table('users')->where( 'id','<>',$user->id )->get();
	  			/*$group = Sentry::findGroupByName('NORMAL');
	  			$users = Sentry::findAllUsersInGroup($group);*/
	  			$permissions = Menu::where('padre','=',0)->where('nombre','<>','Más')->where('estatus','=', 1)->get();
	  			$users = Sentry::findAllUsers();	  			
				return View::make('users.index')->with(compact('users','permissions'));
	  		}else{
	  			return View::make('contenidos.index');
	  		}
		}else{
			return View::make('login');
		}
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /usuarioscontroler/create
	 *
	 * @return Response
	 */
	public function create()
	{		
		if(Sentry::check()){
			$user = Sentry::getUser();
			$adminGroup = Sentry::findGroupByName('ADMINISTRADOR');
	  		if ( $user->inGroup($adminGroup) ){	  			
	  			$permissions = Menu::where('padre','=',0)->where('nombre','<>','Más')->where('estatus','=', 1)->get();
				return View::make('users.create')->with(compact('permissions'));
	  		}else{
	  			return View::make('contenidos.index');
	  		}
		}else{
			return View::make('login');
		}
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /usuarioscontroler
	 *
	 * @return Response
	 */
	public function store()
	{
		if(Request::ajax()){
			$user = new User;
			$validator = Validator::make(Input::all(), $user->rules());
			$validator->setAttributeNames($user->attributeLabels());
            if ($validator->fails()) {
            	return Response::json(array(
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray(),
                    'message' => 'Error al registrar'
                ));
            }else
            {
            	$aux = Input::get('permissions');
            	foreach ($aux as $key => $value) {
            		$permissions[$value] = 1;
            	}
            	$param = array('name'=>Input::get('name'), 'username'=>Input::get('username'), 'password'=>Input::get('password'), 
            				   'group'=>'NORMAL','permissions'=>$permissions);
            	$user->saveUser($param);
            	return Response::json(array(
					'success'=>true,
					'message'=>'Registrado correctamente',
					'permissions'=>$param
				));
            }
		}
	}

	/**
	 * Display the specified resource.
	 * GET /usuarioscontroler/{id}
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
	 * GET /usuarioscontroler/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if(Sentry::check()){
			$user = Sentry::getUser();
			$adminGroup = Sentry::findGroupByName('ADMINISTRADOR');
	  		if ($user->inGroup($adminGroup) ){
	  			$permissions = Menu::where('padre','=',0)->where('nombre','<>','Más')->where('estatus','=', 1)->get();
	  			$user = Sentry::findUserById($id);
				return View::make('users.edit')->with(compact('permissions', 'user'));
	  		}else{
	  			return View::make('contenidos.index');
	  		}
		}else{
			return View::make('login');
		}
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /usuarioscontroler/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if (Request::ajax()) {
			$rules = array(
				'name'=>array('required'),
				'username'=>array('required'),
				'permissions'=>array('required'),
			);
			$validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {
            	return Response::json(array(
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray(),
                    'message' => 'Error al registrar'
                ));
            }else{
            	try{
            		User::where('id','=', $id)->update(array('permissions'=>NULL));
            		$aux = Input::get('permissions');            		
            		$user = Sentry::findUserById($id);

					foreach ($aux as $key => $value) {
            			$permissions[$value] = 1;

            		}
					$user->first_name = Input::get('name');
					$user->email = Input::get('username');
					$user->permissions = $permissions;

					if(Input::has('password'))
						$user->password = Input::get('password');
					if($user->save())
						return Response::json(array('success'=>true, 'message'=>'Actualizado con éxito'));            		
            	}catch(Cartalyst\Sentry\Users\UserExistsException $e)
				{				
					return Response::json(array('success'=>false, 'message'=>'El usuario con éste username ya existe'));
				}
				catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
				{
					return Response::json(array('success'=>false, 'message'=>'Usuario no encontrado'));
				}
            }			
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /usuarioscontroler/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		if(Request::ajax()){
			$id = Input::get('id');
			$user = User::find($id);
			$result = $user->delete();
			if($result){
				return Response::json(array('success'=>true, 'message'=>'Usuario eliminado con éxito'));
			}else{
				return Response::json(array('success'=>false, 'message'=>'Error al eliminar'));
			}
		}
	}

	public function account(){
		$user = Sentry::getUser();
		return View::make('users.account', compact('user'));
	}

	public function changePassword(){
		if(Request::ajax()){
			$rules = array(
				'name'=>array('required'),
				'new_pass'=>array('required'),
				'confirm_pass'=>array('required', 'same:new_pass')
			);
			$labels = array(
				'name'=>'nombre',
				'new_pass'=>'Contraseña Nueva',
				'confirm_pass'=>'Confirmar Contraseña',
				);
			$validator = Validator::make(Input::all(), $rules);
			$validator->setAttributeNames($labels);
            if ($validator->fails()) {
            	return Response::json(array(
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray(),
                    'message' => 'Error al registrar',
                    'data'=>array('new_pass'=>Input::get('new_pass'), 'confirm_pass'=>Input::get('confirm_pass'))
                ));
            }else{
            	try{
            		$user = Sentry::getUser();
            		$user->first_name=Input::get('name');
            		$user->password = Input::get('new_pass');
            		if($user->save())
            			return Response::json(array('success'=>true, 'message'=>'Actualizado correctamente'));
            		else
            			return Response::json(array('success'=>false, 'message'=>'Error al actualizar'));
            	}catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
				{
    				return Response::json(array('success'=>false, 'message'=>'Usuario no encontrado'));
				}				
			}
		}
	}

	public function getRegister(){
		//Crear el usuario
	    try {
	      $user = Sentry::createUser(array(
	        'email' => 'admin',
	        'password' => 'admin',
	        'activated' => 1,
	        'first_name' =>'ERNESTO',
	        'last_name' =>'GRAMAJO'
	      ));
	        echo 'Registrado correctamente';
	    } catch (Cartalyst\Sentry\Users\UserExistsException $e) {
	        echo 'El usuario ya existe';
	    }

	    try
		{
		    // Crear los grupos
		    $admin = Sentry::createGroup(array(
		        'name'        => 'ADMINISTRADOR',
		        'permissions' => array(        
		            'users' => 1,
		        ),
		    ));

		    $normal = Sentry::createGroup(array(
		        'name'        => 'NORMAL',	        
		    ));
		    echo "Grupos creados correctamente";
		}
		catch (Cartalyst\Sentry\Groups\NameRequiredException $e)
		{
		    echo 'El nombre del grupo es requerido';
		}
		catch (Cartalyst\Sentry\Groups\GroupExistsException $e)
		{
		    echo 'El grupo ya existe';
		}

		try
		{
		    // Buscar el Usuario utilizando el email
		    $user = Sentry::findUserByLogin('admin');

		    // Buscar el grupo utilizando el nombre del grupo
		    $adminGroup = Sentry::findGroupByName('ADMINISTRADOR');

		    // Asignar el usuario al grupo ADMINISTRADOR
		    if ($user->addGroup($adminGroup))
		    {
		        echo 'Grupo asignado correctamente';
		    }
		    else
		    {
		        echo 'El grupo no fue asignado';
		    }
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		    echo 'Usuario no encontrado';
		}
		catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
		{
		    echo 'Grupo no encontrado';
		}
	}

}