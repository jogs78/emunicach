<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index() {
        date_default_timezone_set('America/Mexico_city');
        /*$menu = Menu::where('padre','=', 0)->where('estatus', '=', 1)->get();
        $hijas = array();
        foreach ($menu as $key => $value) {
            $padre =  $value->id;
            $aux = DB::table('menu')->where('padre','=', $padre)->where('estatus', '=', 1)->get();
            if(!empty($aux))
                $hijas[$padre] = $aux;
        }
        $contenido = Contenido::where('estatus','=',1)->where('descrip','<>','')->select('descrip', 'idmenu','fecha_registro')->take(3)->orderBy('fecha_registro', 'desc')->get();
        return View::make('index',compact('menu','hijas','contenido'));*/
        $menu = Menu::where('padre','=', 0)->where('estatus', '=', 1)->get();
        $hijas = array();
        foreach ($menu as $key => $value) {
            $padre =  $value->id;
            $aux = DB::table('menu')->where('padre','=', $padre)->where('estatus', '=', 1)->get();
            if(!empty($aux))
                $hijas[$padre] = $aux;
        }        
        $noticias = Noticia::where('estatus','=',1)->take(3)->orderBy('fecha_registro', 'desc')->get();        
        return View::make('index',compact('menu','hijas','noticias'));
    }
    
    public function login() {
        return View::make('login');
    }

    public function postLogin() {
        if(Request::ajax()){
            try{
                $credentials = array(
                    'email' => Input::get('username'),
                    'password' => Input::get('password'),
                );
            // Authenticate the user
                $user = Sentry::authenticate($credentials, false);
                return Response::json(array('success' => true));
            }catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
                return Response::json(array('message' => 'El campo Email es obligatorio.'));
            } catch (Cartalyst\Sentry\Users\PasswordRequiredException $e) {
                return Response::json(array('message' => 'El campo Password es obligatorio.'));
            } catch (Cartalyst\Sentry\Users\WrongPasswordException $e) {
                return Response::json(array('message' => 'Password incorrecto, intente de nuevo.'));
            } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
                return Response::json(array('message' => 'Usuario no registrado.'));
            } catch (Cartalyst\Sentry\Users\UserNotActivatedException $e) {
                return Response::json(array('message' => 'El Usuario no está activado.'));
            }
            // The following is only required if the throttling is enabled
            catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e) {
                return Response::json(array('message' => 'El Usuario está suspendido.'));
            } catch (Cartalyst\Sentry\Throttling\UserBannedException $e) {
                return Response::json(array('message' => 'El Usuario está suspendido.'));
            }
        }
    }

    public function logout() {
        if(Sentry::check()){
            Sentry::logout();
        }
        return Redirect::to('/');
    }

}
