@extends('layouts.master')

@section('css')
<link href="{{asset('css/core.css')}}" rel="stylesheet">
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
<h1>Galería principal</h1>

<div class="form-group">
	<div class="text-left">		
	</div>
	<div class="btn-group">
		<label title="Seleccionar una foto de perfil" class="btn btn-primary">			
			<a id="btn-select" data-toggle="modal" class="btn btn-primary" href="#modal-form"><i class="glyphicon glyphicon-folder-open"></i>
			Seleccionar</a>
		</label>
	</div>
</div>
<div id="modal-form" class="modal fade" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				{{Form::open(['role'=>'form','method' => 'POST', 'url' => ['admin/carousel'], 'id' => 'imageForm', 'enctype'=>'multipart/form-data'])}}
					<h4>Cargar imágenes</h4>
					<div class="text-center">
						<div id="preview" class=""><h1 style="font-size:50px;" class="glyphicon glyphicon-picture"></h1></div>
						<img src="#" alt="test" width="240" height="220" id="profile" class="hide"/><br>
						<input type="file" accept="image/*" name="image" id="inputImage" class="hide" onchange='Test.UpdatePreview(this)'>						
					</div>
					<div class="form-group">
						<div class="text-right">
							<button type="submit" class="btn btn-success">Agregar</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
						</div>
					</div>
				{{Form::close()}}
			</div>
		</div>
	</div>
</div>
<div class="text-center"><h4 class="error">Arrastre las imágenes para ordernarlas</h4></div>
<section id="wrapper">
	@if($images)
	<ul id="images">
		@foreach($images as $row)
		<li id="{{$row->id}}">
			<img src="{{asset('/imagenes/carousel').'/'.$row->image}}" alt="" width="100%" height="100%" />			
			<span>{{$row->order}} . - . </span><a href="javascript:deleteImage({{$row->id}}); ">Eliminar</a>
		</li>
		@endforeach
	</ul>
@endif
</section>
<div style="clear: both"></div>
@stop


@section('script')
<script type="text/javascript" src="{{asset('js/jquery-ui-1.11.4/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/carousel.js')}}"></script>
@stop

@section('shared')
@stop