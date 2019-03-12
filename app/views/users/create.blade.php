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
{{Form::open(['method'=>'POST', 'url'=>['admin/users'], 'id'=>'formUser', 'class'=>'form-horizontal','role'=>'form'])}}
	<div class="form-group">
		<label class="col-lg-3 control-label" class="col-lg-2 control-label">Nombre y Apellidos:</label>
		<div class="col-lg-5">
			<input class="form-control" type="text" name="name"  autofocus >
			<div id="name_error" class="error_message"></div>
		</div>		
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">Nombre de Usuario:</label>
		<div class="col-lg-5">
			<input class="form-control" type="text" name="username"  >
			<div id="username_error" class="error_message"></div>
		</div>		
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">Contraseña:</label>
		<div class="col-lg-5">
			<input class="form-control" type="password" name="password"  >
			<div id="password_error" class="error_message"></div>
		</div>						
	</div>
	<div class="form-group">
		<div class="col-lg-3"></div>
		<div class="col-lg-5 text-center">
			<label>Permisos</label>
		</div>
	</div>	
	@if($permissions)
	<div class="form-group">
		<div class="col-lg-3"></div>
		<div class="col-lg-5"><div id="permissions_error" class="error_message"></div></div>	
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">Noticias</label>
		<div class="col-lg-6">
			<div class="input-group">
				<div class="col-sm-4">
					<div class="input-group">
						<span class="input-group-addon">
							<input type="checkbox" name="permissions[]" value="noticias.create">
						</span>
						<input type="text" class="form-control" value="Agregar" readonly>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="input-group">
						<span class="input-group-addon">
							<input type="checkbox" name="permissions[]" value="noticias.update">
						</span>
						<input type="text" class="form-control" value="Editar" readonly>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="input-group">
						<span class="input-group-addon">
							<input type="checkbox" name="permissions[]" value="noticias.delete">
						</span>
						<input type="text" class="form-control" value="Eliminar" readonly>
					</div>
				</div>
			</div>
		</div>
	</div>
	@foreach($permissions as $row)
	<div class="form-group">
		<label class="col-lg-3 control-label">{{$row->nombre}}</label>
		<div class="col-lg-6">
			<div class="input-group">
				<div class="col-sm-4">
					<div class="input-group">
						<span class="input-group-addon">
							<input type="checkbox" name="permissions[]" value="{{$row->id}}.create">
						</span>
						<input type="text" class="form-control" value="Agregar" readonly>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="input-group">
						<span class="input-group-addon">
							<input type="checkbox" name="permissions[]" value="{{$row->id}}.update">
						</span>
						<input type="text" class="form-control" value="Editar" readonly>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="input-group">
						<span class="input-group-addon">
							<input type="checkbox" name="permissions[]" value="{{$row->id}}.delete">
						</span>
						<input type="text" class="form-control" value="Eliminar" readonly>
					</div>
				</div>
			</div>
		</div>
	</div>	
	@endforeach
	@endif
	<div class="form-group">
		<div class="col-lg-3"></div>
		<div class="col-lg-5 text-right">
			<button type="submit" class="btn btn-success">Aceptar</button>
			<button type="reset" class="btn btn-danger">Cancelar</button>
		</div>		
	</div>
{{Form::close()}}
@stop

@section('script')
<script type="text/javascript" src="{{asset('js/users.js')}}"></script>
@stop

@section('shared')
@stop