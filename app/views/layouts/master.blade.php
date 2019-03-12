<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Universidad de Ciencias y Artes de Chiapas</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        
        <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{url('css/jcarousel.responsive.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/redactor.css')}}">
        <link rel="stylesheet" href="{{url('css/style.css')}}">
        <style type="text/css">

        </style>
        @yield('css')
                
        <script type="text/javascript" src="{{url('js/jquery-2.1.1.js')}}"></script>
        <script type="text/javascript" src="{{url('js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{url('js/jquery.jcarousel.min.js')}}"></script>
        <script type="text/javascript" src="{{url('js/jcarousel.responsive.js')}}"></script>
        <script type="text/javascript" src="{{url('js/bootstrap-hover-dropdown.min.js')}}"></script>
        <script type="text/javascript" src="{{url('js/main.js')}}"></script>
        
    </head>
<body class="bg-white">    
    <div class="container" style="width:75%;">
        @section('header')
        <header class=" header-page hidden-xs">
        <div class="row">
            <div class="col-sm-2 text-left">
                {{ HTML::image('imagenes/logo.png', 'logoUnicach', array()) }}
            </div>
            <div class="col-sm-7 text-center">
                <h2 class="font_2" style="font-size: 24px; text-align: center; line-height: 0.8em;">
                    <span style="font-size:24px;"><span style="line-height:0.8em;">U</span></span><span style="font-size:18px;"><span style="line-height:0.8em;">NIVERSIDAD<span style="font-size:24px;"><span style="line-height:0.8em;"> </span></span> DE</span></span>
                    <span style="font-size:24px;"><span style="line-height:0.8em;"> C</span></span><span style="font-size:18px;"><span style="line-height:0.8em;">IENCIAS<span style="font-size:24px;"><span style="line-height:0.8em;"> </span></span> Y</span></span>
                    <span style="font-size:24px;"><span style="line-height:0.8em;"> A</span></span><span style="font-size:18px;"><span style="line-height:0.8em;">RTES<span style="font-size:24px;"><span style="line-height:0.8em;"> </span></span> DE</span></span>
                    <span style="font-size:24px;"><span style="line-height:0.8em;"> C</span></span><span style="font-size:18px;"><span style="line-height:0.8em;">HIAPAS</span></span>
                </h2>
                <h2 class="font_2" style="font-size: 6px; text-align: center; line-height: 0.8em;"> </h2>
                <h2 class="font_2" style="font-size: 15px; text-align: center;">
                    <span style="font-size:15px;">"Por la Cultura de mi Raza"</span>
                </h2>
                <h2 class="font_2" style="font-size: 24px; text-align: center;">
                    <span class="color_19">Escuela de Música</span>
                </h2>
            </div>
            <div class="col-sm-2 text-right">
                {{ HTML::image('imagenes/logo2.png', 'Chiapas', array('title'=>'Panel de Administración')) }}
            </div>
        </div>
        </header>      
        @show

        @section('menu')
        <!-- <div class="row">-->
            <nav class="navbar navbar-default nav">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="navbar">
                        <ul class="nav navbar-nav">
                            @yield('items')
                        </ul>
                    </div>
                </div>
            </nav>            
        <!-- </div> -->
        @show

        @section('carousel')
        <!-- <div class="row"> -->
            <div class="jcarousel-wrapper">
                <div class="jcarousel">
                    <ul>
                        <?php 
                            $images = DB::table('images')->where('estatus','=',1)->orderBy('order', 'asc')->get();
                            foreach ($images as $key => $value) {
                                echo "<li><img src='".asset('/imagenes/carousel').'/'.$value->image."' style='width:100% !important;'/></li>";
                            }
                        ?>
                    </ul>
                </div>

                <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
                <a href="#" class="jcarousel-control-next">&rsaquo;</a>

                <p class="jcarousel-pagination"></p>
            </div>            
        <!-- </div> -->
        
        @show
                
        <!-- <div class="row"> -->
            @yield('content')
        <!-- </div> -->
        <br>
        @section('footer')
        @section('shared')
        <div class="row">
            <div class="col-sm-3"><a target="_blank" href="https://www.facebook.com/escuela.musicaunicach"><img src="{{url('imagenes/fb_icon.png')}}">
                <span class="font_8" style="font-size:12px;"><strong>Escuela de Música - Unicach</strong></span></a><br>
            </div>
            <div class="col-sm-2"><a target="_blank" href=""><img src="{{url('imagenes/yb_icon.png')}}">
                <span class="font_8" style="font-size:12px;"><strong>Emunicach</strong></span></a><br>
            </div>
            <div class="col-sm-2"><a target="_blank" href="https://twitter.com/emunicach"><img src="{{url('imagenes/tw_icon.png')}}">
                <span class="font_8" style="font-size:12px;"><strong>@emunicach</strong></span></a><br>
            </div>
            <div class="col-sm-3"><a target="_blank" href=""><img src="{{url('imagenes/g_icon.png')}}">
                <span class="font_8" style="font-size:12px;"><strong>Escuela de Música</strong></span></a><br>
            </div>
            <div class="col-sm-2">
                <div id="fb-root"></div>
                <script type="text/javascript">
                (function() {
                    var element = document.createElement('script'); 
                    element.type = "text/javascript"; 
                    element.async = true;
                    element.id = "facebook-jssdk"
                    element.src = "//connect.facebook.net/es_ES/all.js#xfbml=1";
                    var s = document.getElementsByTagName('script')[0]; 
                    s.parentNode.insertBefore(element, s);
                })();
                </script>                
                <div class="fb-share-button" data-href="https://www.facebook.com/escuela.musicaunicach" data-layout="button"></div>
            </div>
        </div>
        @show

        <div class="row footer">
            <div id="go" style="color:#919192">
                <a style="text-decoration:none" href="{{url('login')}}"><p>Campus Universitario UNICACH</p></a>
            </div>
            <div class="copy" style="color:#FFFFFF">
                 
                <p>Acceso 1: Boulevard Ángel Albino Corzo, Km 1087, C.P. 29000 <br>
                   Acceso 2: 2a. Norte Ote S/N, Fraccionamiento Santos C.P. 29000Tuxtla Gutiérrez, Chiapas <br>
                   Tel. +52 (961) 6126875 y 6136880</p>
                <p> D. R. &copy; Universidad de Ciencias y Artes de Chiapas, México. 2014.</p>
            </div>
        </div>
        @show
    </div>

    <script type='text/javascript' src="{{url('js/redactor.js')}}"></script>
    <script type='text/javascript' src="{{url('js/redactor/es.js')}}"></script>
    @yield('script')
    <script type="text/javascript">    
    $(function() {
        $('.jcarousel')
            .jcarousel({
                // Core configuration goes here
            })
            .jcarouselAutoscroll({
                interval: 3000,
                target: '+=1',
                autostart: true
            });
            $('.jcarousel-control-prev, .jcarousel-control-next, .jcarousel-pagination').hide();
        });
    </script>
</body>
</html>