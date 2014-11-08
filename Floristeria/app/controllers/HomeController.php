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

	public function home()
	{

		return View::make('homecontroller.home');

	}

    public function login(){

        return View::make('homecontroller.login');

    }

    public function register(){

        return View::make('homecontroller.register');

    }

    public function showPrivate(){

        return View::make('homecontroller.private');

    }

    public function salir(){

        Auth::user()->logout();
        return Redirect::to('login');

    }

    public function confirmregister(){

    }

}
