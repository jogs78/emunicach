<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {{HTML::style('css/bootstrap.min.css')}}
        {{HTML::style('font-awesome/css/font-awesome-css')}}
        {{HTML::style('css/login.css')}}
    </head>
    <body>
        <div id="container">
            <div id="logo">
                <img src="{{asset('imagenes/logo.png')}}" alt="" width="150" heigth="150">
            </div>
            <div id="loginbox" >
                {{Form::open(['method' => 'POST', 'url' => ['/home/login'], 'id' => 'loginForm'])}}
                    <p>Introduzca usuario y contraseña para continuar.</p>
                    <div class="input-group input-sm">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span><input class="form-control" id="username" placeholder="User" type="text" name="username" autofocus>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span><input class="form-control" id="password" placeholder="Contraseña" type="password" name="password">
                    </div>
                    <div class="form-actions clearfix">                      
                        <input class="btn btn-block btn-primary btn-default" value="Acceder" type="submit">
                    </div>
                    <div class="footer-login">
                        <div class="pull-left text">
                        </div>
                    </div>
                {{Form::close()}}
                </div>
                <div style="color:#FFFFFF">
                    <center><p>&copy; UNICACH 2015/Escuela De Musica</p>
                </div>
        </div>
        {{HTML::script('js/jquery.js')}}
        {{HTML::script('js/jquery-ui.js')}}
        {{HTML::script('js/main.js')}}
        {{HTML::script('js/login.js')}}
    </body>
</html>