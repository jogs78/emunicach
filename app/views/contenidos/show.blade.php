@extends('layouts.master')

@section('items')
<li><a href="/">Inicio</a></li>
@foreach($menu as $row)
<li class="dropdown">    
    <a href="{{url('verpubli?ip='.$row->id)}}" data-hover="dropdown" data-delay="1000" data-close-others="false">{{$row->nombre}}</a>
    @if(isset($hijas[$row->id]))
        <ul class="dropdown-menu">
            @foreach($hijas[$row->id] as $hija)
            <li><a href="{{url('verpubli?ip='.$hija->id)}}">{{$hija->nombre}}</a></li>
            @endforeach
        </ul>
    @endif
</li>
@endforeach
@stop



@section('content')
@if($contenido)
	@foreach($contenido as $conte)
		<h2 class="font_2">
			<span class="color_18">{{$conte->titulo}}</span>
		</h1>
        <div class="text-justify" style="word-wrap: break-word;">
    	{{$conte->conten}}
        </div>
	@endforeach
@endif
@stop