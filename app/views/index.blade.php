@extends('layouts.master')

@section('css')
<style type="text/css">
.hr {
  -moz-border-bottom-colors: none;
  -moz-border-image: none;
  -moz-border-left-colors: none;
  -moz-border-right-colors: none;
  -moz-border-top-colors: none;
  border-color: #EEEEEE -moz-use-text-color #FFFFFF;
  border-style: solid none;
  border-width: 2px 0;
  box-shadow: 5px 5px 8px #888888;
  width: 100%;
  text-align: center;
  margin: auto;
  margin-top: 15px;
  margin-bottom: 15px;
  border-radius: 10px;
}
</style>
@stop
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
<div class="row">
    <div class="col-sm-7">
            <div class="panel panel-primary">
                <div class="panel-heading" style="font-size:20px;">
                    Noticias
                </div>
                <div class="panel-body">
                    @if($noticias)                    
                    @foreach($noticias as $noticia)
                    <div class="row text-center"><h3>{{$noticia->titulo}}</h3></div>
                    <div class="row text-justify" style="word-wrap: break-word;">                    
                    {{$noticia->noticia}}
                    </div>
                    <div class="hr"></div>
                    @endforeach
                    @endif
                </div>
            </div>
    </div>
    <div class="col-sm-5">        
        <div class="panel panel-primary">
            <div class="panel-heading" style="font-size:20px;">
                Música
            </div>
            <div class="panel-body">
              <iframe width="100%" height="450" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/52238380&amp;auto_play=true&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading" style="font-size:20px;">
                Docentes EMunicach
            </div>
            <div class="panel-body">
                
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading" style="font-size:20px;">
                Conciertos y Festivales
            </div>
            <div class="panel-body">
                
            </div>
        </div>
    </div>
</div>
@stop