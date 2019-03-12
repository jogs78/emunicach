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
{{Form::open(['method'=>'POST', 'url'=>'admin/noticias', 'class'=>'form-horizontal', 'id'=>'newsForm'])}}
	<div class="form-group">
		<label class="col-lg-2 control-label">Titulo:</label>
        <div class="col-lg-9">
    		<input class="form-control" type="text" name="titulo" id="titulo">
    		<div id="titulo_error" class="error_message"></div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Enlace:</label>
        <div class="col-lg-9">
        	<input class="form-control" type="text" name="enlace" id="enlace">    		
    		<div id="enlace_error" class="error_message"></div>
		</div>
	</div>
	<div class="form-group">
    	<label class="col-lg-2 control-label">Noticia:</label>
    	<div class="col-lg-9">
    		<textarea class='editor' name="noticia" id="news"></textarea>
    		<div id="news_error" class="error_message"></div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-9"></div>
		<input class="btn btn-success" type="submit" Value="Guardar">
		<a href="{{url('admin/noticias')}}" class="btn btn-danger">Cancelar</a>
	</div>
{{Form::close()}}
@stop

@section('shared')
@stop

@section('script')
<script type="text/javascript" src="{{asset('js/plugins/fontcolor.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/fontfamily.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/fontsize.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/filemanager.js')}}"></script>
<script type="text/javascript" src="{{asset('js/noticias.js')}}"></script>
@stop