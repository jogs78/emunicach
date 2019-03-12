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
{{Form::open(['method'=>'POST', 'url'=>'admin/contenidos', 'class'=>'form-horizontal', 'id'=>'contenForm'])}}
	<div class="form-group">
        <label class="col-lg-2 control-label" class="col-lg-2 control-label">Pestaña:</label>
        <div class="col-lg-9">
            <select name="pestana" id="pestana">
            	@if($menu)
            	@foreach($menu as $row)
                	<option value="{{$row->id}}">{{$row->nombre}}</option>
                @endforeach
                @endif
            </select>
        </div>
    </div>
    <div class="form-group">
		<label class="col-lg-2 control-label">Titulo:</label>
        <div class="col-lg-9">
    		<input class="form-control" type="text" name="titulo" id="titulo">
    		<div id="titulo_error" class="error_message"></div>
        </div>
    </div>
    <!-- <div class="form-group">
        <label class="col-lg-2 control-label">Noticia:</label>
        <div class="col-lg-9">
    		<textarea class='editor' name="descripcion" cols="100" rows="15" id="descripcion"></textarea>
    		<div id="descripcion_error" class="error_message"></div>
		</div>
	</div> -->
	<div class="form-group">
    	<label class="col-lg-2 control-label">Contenido:</label>
    	<div class="col-lg-9">
    		<textarea class='editor' name="conten" cols="120" rows="25" id="conten"></textarea>
    		<div id="conten_error" class="error_message"></div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-9"></div>
		<div class="btn-group">            
			<input class="btn btn-danger" type="reset" Value="Borrar Datos">
			<input class="btn btn-success" type="submit" Value="Guardar">
		</div>
	</div>
{{Form::close()}}
@stop

@section('shared')
@stop

@section('script')
<script src="{{asset('js/plugins/metisMenu/metisMenu.min.js')}}"></script>
<!-- Custom Theme JavaScript -->
<script src="{{asset('js/sb-admin-2.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/fontcolor.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/fontfamily.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/fontsize.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/filemanager.js')}}"></script>
<script type="text/javascript" src="{{asset('js/contenidos.js')}}"></script>
@stop