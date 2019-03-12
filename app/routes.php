<?php

/*Route::when('*', 'csrf', ['post']);*/

Route::get('/', 'HomeController@index');
Route::get('login', 'HomeController@login');
Route::get('logout', 'HomeController@logout');

Route::controller('home', 'HomeController');


Route::group(['prefix' => 'admin/menu'], function() {
	Route::get('/', 'MenuController@index');
	Route::post('/','MenuController@store');
	Route::get('/show', 'MenuController@show');
	Route::put('/update', 'MenuController@update');
  	Route::get('/delete/{id}', 'MenuController@destroy');

});

Route::get('verpubli', 'ContenidosController@show');
Route::get('preview', 'ContenidosController@preview');

Route::group(['prefix' => 'admin/contenidos'], function() {
	Route::get('/', 'ContenidosController@index');
	Route::get('/create', 'ContenidosController@create');
	Route::post('/','ContenidosController@store');
	Route::post('/publish','ContenidosController@publish');
	Route::get('/{id}/edit', 'ContenidosController@edit');
	Route::put('/{id}', 'ContenidosController@update');
	Route::post('/imageUpload','ContenidosController@imageUpload');
	Route::post('/fileUpload','ContenidosController@fileUpload');
	Route::get('/{id}/delete', 'ContenidosController@destroy');
});

Route::group(['prefix' => 'admin/noticias'], function() {
	Route::get('/', 'NoticiasController@index');
	Route::get('create', 'NoticiasController@create');
	Route::post('/','NoticiasController@store');
	Route::get('/{id}/edit', 'NoticiasController@edit');
	Route::get('/{id}', 'NoticiasController@show');
	Route::put('/{id}', 'NoticiasController@update');
	Route::post('/publish','NoticiasController@publish');
	Route::get('/{id}/delete', 'NoticiasController@destroy');
});
Route::get('noticias/preview/{id}', 'NoticiasController@preview');

Route::group(['prefix' => 'admin/users'], function() {
	Route::get('/', 'UsuariosControler@index');
	Route::post('/', 'UsuariosControler@store');
	Route::get('/create', 'UsuariosControler@create');
	Route::get('/{id}/edit', 'UsuariosControler@edit');
	Route::put('/{id}', 'UsuariosControler@update');
	Route::post('/delete', 'UsuariosControler@destroy');
});

Route::group(['prefix' => 'admin/carousel'], function() {
	Route::get('/', 'CarouselController@index');
	Route::post('/', 'CarouselController@store');
	//Route::get('/create', 'UsuariosControler@create');
	//Route::get('/{id}/edit', 'UsuariosControler@edit');
	//Route::put('/{id}', 'CarouselController@update');
	Route::post('/sort', 'CarouselController@sort');
	Route::post('/delete', 'CarouselController@destroy');
});

Route::get('users/account', 'UsuariosControler@account');
Route::post('users/change-password', 'UsuariosControler@changePassword');

/*Route::get('admin/carousel', function() {
	
});*/