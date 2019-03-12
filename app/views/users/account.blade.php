@extends('layouts.master')

@section('items')
<li><a href="{{url('users/account')}}"><span class="glyphicon glyphicon-user"></span> Mi cuenta</a></li>
<li><a href="{{url('admin/noticias')}}">Noticias</a></li>
<li><a href="{{url('admin/contenidos')}}">Publicaciones</a></li>
@if(Sentry::getUser()->inGroup(Sentry::findGroupByName('ADMINISTRADOR')))
<li><a href="{{url('admin/menu')}}">Agregar Pestaña</a></li>
<li><a href="{{url('admin/users')}}"> Usuarios</a></li>
<li><a href="{{url('admin/carousel')}}">Galería</a></li>
@endif
<li><a href="{{url('logout')}}">Cerrar Sesión</a></li>
@stop

@section('carousel')
@stop

@section('content')
<div class="form-horizontal">
	<div class="form-group">
		<label class="col-lg-3 control-label">Nombre de usuario:</label>
		<div class="col-lg-5"><input type="text" class="form-control" value="{{$user->email}}" readonly></div>
	</div>	
	{{Form::open(['method'=>'POST', 'url'=>'users/change-password', 'class'=>'form-horizontal', 'id'=>'passForm'])}}
	<div class="form-group">
		<label class="col-lg-3 control-label">Nombre:</label>
		<div class="col-lg-5"><input type="text" class="form-control" value="{{$user->first_name}}" name='name'></div>
		<div id="name_error" class="error_message"></div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">Contraseña Nueva:</label>
		<div class="col-lg-5"><input type="password" class="form-control" name="new_pass"></div>
		<div id="new_pass_error" class="error_message"></div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">Confirmar Contraseña:</label>
		<div class="col-lg-5"><input type="password" class="form-control" name="confirm_pass"></div>		
		<div id="confirm_pass_error" class="error_message"></div>
	</div>
	<div class="form-group">
		<div class="col-lg-3"></div>
		<button type="submit" class="btn btn-success">Guardar</button>
		<a href="{{url('admin/contenidos')}}" class="btn btn-danger">Cancelar</a>
	</div>
	{{Form::close()}}
</div>
@stop

@section('shared')
@stop

@section('script')
<script type="text/javascript" src="{{asset('js/users.js')}}"></script>
@stop