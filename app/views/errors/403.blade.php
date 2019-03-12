@extends('layouts.master')


@section('carousel')
@stop

@section('css')
<style>
    .cla {
        width: 80%;
        height: 40%;
        margin-top: 15%;
        margin-left: 10%;
    }
    .cla p{
        font-family: sans-serif;
        font-size: 180%;
        font-style: normal; 
        font-weight: bold;
    }

</style>
@stop

@section('content')
<div class="cla">
    <h2 class="font_2">
            <span class="color_18">ERROR 403</span>
    </h1>
    <p>USTED NO SE ENCUENTRA AUTORIZADO PARA REALIZAR ESTA ACCIÓN.</p>
</div>
@stop

@section('shared')
@stop