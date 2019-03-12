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
<h1 class="page-header">NOTICIAS</h1>

<div class="text-right">
	<a class="btn btn-success" href="{{asset('admin/noticias/create')}}">Agregar Noticia</a>
</div>
<br>
<table class="table table-striped table-hover table-news">
	<thead>
		<tr class="odd gradeX">
            <th>Titulo</th>
            <th>Autor</th>
            <th>Fecha</th>
            <th>Estatus</th>
            @if(Sentry::getUser()->inGroup(Sentry::findGroupByName('ADMINISTRADOR')))
            <th>Publicar</th>
            @endif
            <th>Opciones</th>
		</tr>
	</thead>
	<tbody>
		@if($noticia)
			@foreach($noticia as $row)
			<tr>
				<td>{{$row->titulo}}</td>
				<td>{{$row->registrado_por}}</td>
				<td>{{$row->fecha_registro}}</td>
				@if($row->estatus)
                    <td><span id="estatus{{$row->id}}" class="label label-success">PUBLICADO</span></td>
                @else
                    <td><span id="estatus{{$row->id}}" class="label label-info">GUARDADO</span></td>
                @endif
                @if(Sentry::getUser()->inGroup(Sentry::findGroupByName('ADMINISTRADOR')))
                <td>
                	<a href="javascript:publish({{$row->id}}, 1);"><span data-action="publicar" title="Publicar" class="glyphicon glyphicon-ok btnPublicar"></span></a>
                	<a href="javascript:publish({{$row->id}}, 0);"><span data-action="desactivar" title="Dejar de publicar" class="glyphicon glyphicon-remove btnDesactivar"></span></a>                	
                </td>
                @endif
				<td>
                    <a href = "{{asset('admin/noticias/'.$row->id.'/edit')}}"><span class="label label-success">Editar</span></a>
                    <a class="delete{{$row->id}}" href = "javascript:deleteNew({{$row->id}});"><span class="label label-danger">Eliminar</span></a>
                    <a target="_blank" href = "{{url('noticias/preview/'.$row->id)}}"><span class="label label-warning">Preview</span></a>
				</td>
			</tr>
			@endforeach
		@endif
	</tbody>
	<tfoot></tfoot>
</table>
@stop

@section('shared')
@stop

@section('script')
<script src="{{asset('js/dataTables/jquery.dataTables.js')}}"></script>
<script src="{{asset('js/dataTables/dataTables.bootstrap.js')}}"></script>
<script src="{{asset('js/dataTables/dataTables.responsive.js')}}"></script>
<script src="{{asset('js/dataTables/dataTables.tableTools.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/noticias.js')}}"></script>
<script>
        $(document).ready(function(){
            initDataTables('.table-news');
        });
</script>
@stop