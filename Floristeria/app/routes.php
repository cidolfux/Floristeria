<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::any('/login',array('as' => 'login', 'uses' => 'HomeController@login'))->before("guest_user");
Route::any('/register',array('as' => 'register', 'uses' => 'HomeController@register'));
Route::any('/',array('as' => 'home', 'uses' => 'HomeController@home'));
Route::any('/private',array('as' => 'private', 'uses' => 'HomeController@showPrivate'))->before("auth_user");
Route::any('/salir',array('as' => 'salir', 'uses' => 'HomeController@salir'));

Route::post('/login',array('before' => 'csrf', function(){

    $user = array(
        'email' => Input::get('email'),
        'password' => Input::get('password'),
        'active' => 1
    );

    $remember = Input::get("remenber");
    $remember == 'On' ? $remember = true:$remember = false;

    if(Auth::user()->attempt($user, $remember)){

        return Redirect::route("private");

    }
    else
    {
        echo("AAAAA");
    }

}));

/*Captura los errores 404*/

App::missing(function($exception){

    return Response::view("error.error404",array(),404);

});