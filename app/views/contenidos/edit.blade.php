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
{{Form::open(['method'=>'PUT', 'url'=>'admin/contenidos/'.$contenido->id, 'class'=>'form-horizontal', 'id'=>'contenForm'])}}
	<div class="form-group">
        <label class="col-lg-2 control-label" class="col-lg-2 control-label">Pestaña:</label>
        <div class="col-lg-9">
            <input type="text" class="form-control" disabled value="{{$contenido->nombre}}">
        </div>
    </div>
    <div class="form-group">
		<label class="col-lg-2 control-label">Titulo:</label>
        <div class="col-lg-9">
    		<input class="form-control" type="text" name="titulo" id="titulo" value="{{$contenido->titulo}}">
    		<div id="titulo_error" class="error_message"></div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Noticia:</label>
        <div class="col-lg-9">
    		<textarea class='editor' name="descripcion" id="descripcion">{{$contenido->descrip}}</textarea>
    		<div id="descripcion_error" class="error_message"></div>
		</div>
	</div>
	<div class="form-group">
    	<label class="col-lg-2 control-label">Contenido:</label>
    	<div class="col-lg-9">
    		<textarea class='editor' name="conten" id="conten" >{{$contenido->conten}}</textarea>
    		<div id="conten_error" class="error_message"></div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-9"></div>
		<div class="btn-group">
            <a class="btn btn-danger" type="reset" Value="Cancelar" href="{{asset('admin/contenidos')}}">Cancelar</a>
			<input class="btn btn-success" type="submit" Value="Guardar">
		</div>
	</div>
{{Form::close()}}
@stop


@section('shared')
@stop

@section('script')
<script src="{{asset('js/plugins/metisMenu/metisMenu.min.js')}}"></script>
<script src="{{asset('js/sb-admin-2.js')}}"></script>
<script type="text/javascript" src="{{asset('js/contenidos.js')}}"></script>

<script type="text/javascript" src="{{asset('js/plugins/fontcolor.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/fontfamily.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/fontsize.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/filemanager.js')}}"></script>
@stop