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
{{Form::open(['method'=>'PUT', 'url'=>['admin/users/'.$user->id], 'id'=>'formUser', 'class'=>'form-horizontal','role'=>'form'])}}
	<div class="form-group">
		<label class="col-lg-3 control-label" class="col-lg-2 control-label">Nombre y Apellidos:</label>
		<div class="col-lg-5">
			<input class="form-control" type="text" name="name"  autofocus value="{{$user->first_name}}">
			<div id="name_error" class="error_message"></div>
		</div>		
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">Nombre de Usuario:</label>
		<div class="col-lg-5">
			<input class="form-control" type="text" name="username" value="{{$user->email}}" >
			<div id="username_error" class="error_message"></div>
		</div>		
	</div>	
	<div class="form-group">
		<label class="col-lg-3 control-label"><a href="Javascript:show('#pass');">Cambiar contraseña:</a></label>
		<div class="col-lg-5" id="pass" style="display: none;">
			<input class="form-control" type="password" name="password">
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
							<input type="checkbox" name="permissions[]" value="noticias.create" {{(array_key_exists('noticias.create', $user->getPermissions()))?"checked":""}} >
						</span>
						<input type="text" class="form-control" value="Agregar" readonly>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="input-group">
						<span class="input-group-addon">
							<input type="checkbox" name="permissions[]" value="noticias.update" {{(array_key_exists('noticias.update', $user->getPermissions()))?"checked":""}}>
						</span>
						<input type="text" class="form-control" value="Editar" readonly>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="input-group">
						<span class="input-group-addon">
							<input type="checkbox" name="permissions[]" value="noticias.delete" {{(array_key_exists('noticias.delete', $user->getPermissions()))?"checked":""}}>
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
							<input type="checkbox" name="permissions[]" value="{{$row->id}}.create" {{(array_key_exists($row->id.'.create', $user->getPermissions()))?"checked":""}}>
						</span>
						<input type="text" class="form-control" value="Agregar" readonly>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="input-group">
						<span class="input-group-addon">
							<input type="checkbox" name="permissions[]" value="{{$row->id}}.update" {{(array_key_exists($row->id.'.update', $user->getPermissions()))?"checked":""}}>
						</span>
						<input type="text" class="form-control" value="Editar" readonly>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="input-group">
						<span class="input-group-addon">
							<input type="checkbox" name="permissions[]" value="{{$row->id}}.delete" {{(array_key_exists($row->id.'.delete', $user->getPermissions()))?"checked":""}}>
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
<script type="text/javascript">

</script>
@stop

@section('shared')
@stop
