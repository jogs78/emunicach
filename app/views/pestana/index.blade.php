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
<h1 class="page-header">MENU</h1>
<!-- Modal Nuevo -->
<div id="nueva" class="modal fade" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				{{Form::open(['method' => 'POST', 'url' => ['admin/menu'], 'id' => 'pestanaForm','class'=>'form-horizontal'])}}
					<div class="form-group">
						<label class="col-lg-2 control-label">Pestaña Raíz:</label>
						<div class="col-lg-9">
							<select class="form-control" name="padre">Pestaña
								<option value="">Nueva</option>
								@foreach($padres as $padre)
								<option value="{{$padre->id}}" >{{$padre->nombre}}</option>
								@endforeach
							</select>
							<div id="padre_error" class="error_message"></div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2 control-label">Nombre:</label>
						<div class="col-lg-9">
							<input class="form-control" type="text" name="nombre" required id="nombre" >
							<div id="nombre_error" class="error_message"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-8"></div>
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

<!-- Modal Editar -->
<div id="Edit" class="modal fade" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">          
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>                
				{{Form::open(['method' => 'PUT', 'url' => ['admin/menu/update'], 'id' => 'pestanaActuForm', 'role'=>'form'])}}
					<div class="form-group">
						<label class="control-label">Nombre:</label>
            			<input type="text" class="form-control" name="nombre" id="name">
            			<div id="name_error" class="error_message"></div>
					</div>
					<div class="form-group">
						<label class="control-label">Pestaña Raiz:</label>
            			<select class="form-control" name="padre" id="padre">
            				@foreach($padres as $padre)
              				<option value="{{$padre->id}}">{{$padre->nombre}}</option>
              				@endforeach
              				<option value="0">Raíz</option>
            			</select>
            			<input type="text" name="id" hidden>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success">Aceptar</button>
					</div>
				{{Form::close()}}
			</div>
		</div>
	</div>
</div>

<div class="panel-body">
	<div class="form-group">
		<div class="text-right">
			<a href="#nueva" data-toggle="modal" class="btn btn-success">Agregar Pestaña</a>
		</div>
	</div>
	<div class="form-group">
	<table class="table table-striped table-bordered" id="menu-table">
		<thead>
			<tr class="odd gradeX">
				<th>Nombre</th>
         		<th>Padre</th>
         		<th>Opciones</th>
			</tr>
		</thead>
		<tbody>
			@if($pestanas)			
			@foreach($pestanas as $pesta)
			<tr>
				<td>{{ $pesta->nombre }}</td>
				<td>
					@if($pesta->padre == NULL)
          			-
          			@else
					@foreach($pestanas as $pes)
          			@if($pesta->padre == $pes->id)
          				{{$pes->nombre}}
          			@endif
          			@endforeach
          			@endif
				</td>
				<td>          			
          			<a href="#Edit" class="edit" data-toggle="modal" id='{{$pesta->id}}' title='{{$pesta->nombre}}'><span class="label label-success">Editar</span></a>
                    <a href="#" class="delete" data-toggle="modal" data-id='{{$pesta->id}}'><span class="label label-danger">Eliminar</span></a>
          		</td>
			</tr>
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
<script type="text/javascript" src="{{url('js/menu.js')}}"></script>
<script>
        $(document).ready(function(){
            initDataTables('#menu-table');
        });
</script>
@stop

@section('shared')
@stop