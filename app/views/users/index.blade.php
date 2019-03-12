@extends('layouts.master')

@section('css')
<link href="{{asset('css/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('css/dataTables/dataTables.responsive.css')}}" rel="stylesheet">
<link href="{{asset('css/dataTables/dataTables.tableTools.min.css')}}" rel="stylesheet">
@stop

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
<h1 class="page-header">USUARIOS</h1>

<div id="Edit" class="modal fade" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				{{Form::open(['method'=>'POST', 'url'=>['users/update'], 'role'=>'form'])}}
					<div class="form-group">
						<label class="control-label">Nombre:</label>
						<input type="text" class="form-control" name="nombree">
					</div>
					<div class="form-group">
						<label class="control-label">Username:</label>
						<input type="text" class="form-control" name="usernamee">
					</div>

					<div class="form-group">
						<label class="control-label">Tipo:</label>
						<select class="form-control" name="tipoe">
							<option id="2" value="NORMAL" selected="selected">Normal</option>
							<option id="1" value="ADMINISTRADOR">Administrador</option>    							
						</select>
						<input type="text" name="ide" hidden>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success">Aceptar</button>
					</div>
					
				{{Form::close()}}
			</div>
		</div>
	</div>
</div>

<div id="nueva" class="modal fade" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>                				
				{{Form::open(['method'=>'POST', 'url'=>['admin/users'], 'id'=>'formUser', 'role'=>'form'])}}
					<div class="form-group">
						<label class="control-label">Nombre y Apellidos:</label>						
						<input class="form-control" type="text" name="name"  autofocus >
						<div id="name_error" class="error_message"></div>
					</div>
					<div class="form-group">
						<label class="control-label">Nombre de Usuario:</label>
						<input class="form-control" type="text" name="username"  >
						<div id="username_error" class="error_message"></div>
					</div>
					<div class="form-group">
						<label class="control-label">Contraseña:</label>
						<input class="form-control" type="password" name="password"  >
						<div id="password_error" class="error_message"></div>
					</div>
					<div class="form-group">
						<label class="control-label">Tipo:</label>
						<select class="form-control" name="user_group" id="tipo_usuario">
							<option id="1" value="ADMINISTRADOR" selected="selected">Administrador</option>
							<option id="2" value="NORMAL">Normal</option>
						</select>
						<div id="group_error" class="error_message"></div>
					</div>
					<div class="form-group hidden permissions">
						@if($permissions)
							<div id="permissions_error" class="error_message"></div>
							@foreach($permissions as $row)							
							<div class="form-group">
								<label class="control-label">{{$row->nombre}}</label>
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
							@endforeach							
						@endif
					</div>
					<div class="form-group">
						<div class="btn-group">
							<button type="submit" class="btn btn-success">Aceptar</button>
							<button type="reset" class="btn btn-danger">Borrar</button>
						</div>
					</div>				
				{{Form::close()}}
			</div>
		</div>
	</div>
</div>

<div class="panel-body">
	<div class="form-group text-right">		
		<a href="{{url('admin/users/create')}}" data-toggle="modal" class="btn btn-success">Agregar</a>
	</div>	
	<div class="form-group">
	<table class="table table-striped table-bordered table-users">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Username</th>
				<th>Tipo</th>
				<th>Opciones</th>
			</tr>
		</thead>
		<tbody>
			@if($users != null)
			@foreach($users as $use)
			@if($use->id != Sentry::getUser()->id)
			<tr>                     
				<td>
					{{$use->first_name}}
				</td>
				<td>
					{{$use->email}}
				</td>
				<td>                        
					{{$use->getGroups()[0]->name}}
				</td>
				<td>				
                	<a href = "{{url('admin/users').'/'.$use->id.'/edit'}}" data-toggle="modal" title='{{$use->first_name}}'><span class="label label-success">Editar</span></a>
                    <a class="delete{{$use->id}}" href = "javascript:deleteUser({{$use->id}});"><span class="label label-danger">Eliminar</span></a>
				</td>				
			</tr>
			@endif
			@endforeach
			@endif
		</tbody>
	</table>
	</div>
</div>
@stop

@section('script')
<script src="{{asset('js/dataTables/jquery.dataTables.js')}}"></script>
<script src="{{asset('js/dataTables/dataTables.bootstrap.js')}}"></script>
<script src="{{asset('js/dataTables/dataTables.responsive.js')}}"></script>
<script src="{{asset('js/dataTables/dataTables.tableTools.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/users.js')}}"></script>
<script>
        $(document).ready(function(){
            initDataTables('.table-users');
        });
</script>
@stop

@section('shared')
@stop