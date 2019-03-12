<?php

class CarouselController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /carousel
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Sentry::check() && Sentry::getUser()->inGroup(Sentry::findGroupByName('ADMINISTRADOR'))){
			$images = Image::where('estatus','=',1)->orderBy('order')->get();
			return View::make('carousel.index', compact('images'));
		}
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /carousel/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /carousel
	 *
	 * @return Response
	 */
	public function store()
	{
		if(Request::ajax()){
			$path = public_path().'/imagenes/carousel/';		
			$filename = '';
			if(!File::exists($path)){
                    File::makeDirectory($path);
           	}           	
            if (Input::hasFile('image')) {
            	$file = Input::file('image');
                if ($file->isValid()) {
                	$ext = $file->getClientOriginalExtension();
					if($ext == 'png'
				   		|| $ext == 'jpg'
				   		|| $ext == 'gif'
				   		|| $ext == 'jpeg'
				   		|| $ext == 'pjpeg'
					){
						$filename = Input::file('image')->getClientOriginalName();
                    	$file->move($path, $filename);
                    	DB::table('images')->insert(array('image'=>$filename, 'registrado_por'=>Sentry::getUser()->id));
                	}else
                	{
                		return Response::json(array('success'=>false, 'message'=>'Formato inválido'));
                	}
                }
            }
		}
	}

	/**
	 * Display the specified resource.
	 * GET /carousel/{id}
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
	 * GET /carousel/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /carousel/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	public function sort(){
		if (Request::ajax()) {
			$id_array = Input::get('ids');
			$count = 1;
			foreach ($id_array as $id){
				//$update = mysqli_query($this->connect,"UPDATE `images` SET `order` = $count WHERE id = $id");
				$update = DB::table('images')->where('id','=',$id)->update(array('order'=>$count));
				$count ++;    
			}
			return Response::json(array('success'=>true));
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /carousel/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		if(Request::ajax()){
			$id = Input::get('id');
			$result = DB::table('images')->where('id','=', $id)->delete();
			if($result)
				return Response::json(array('success'=>true));
			else
				return Response::json(array('success'=>false));
		}
	}

}