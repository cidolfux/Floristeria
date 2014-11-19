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

Route::any('/',array('as' => 'home', 'uses' => 'HomeController@home'))->before("guest_user");
Route::any('/login',array('as' => 'login', 'uses' => 'HomeController@login'))->before("guest_user");
Route::any('/register',array('as' => 'register', 'uses' => 'HomeController@register'))->before("guest_user");;
Route::any('/private',array('as' => 'private', 'uses' => 'PrivateController@showMain'))->before("auth_user");
Route::any('/salir',array('as' => 'salir', 'uses' => 'PrivateController@salir'))->before("auth_user");
Route::any('/confirmregister',array('as'=>'confirmregister','uses'=>'HomeController@confirmregister'))->before("guest_user");
Route::any('/shop',array('as'=>'shop', 'uses' => 'PrivateController@shop'))->before('auth_user');
Route::get('confirmregister/{email}/{key}',function($email, $key){

    if(urldecode($email) == Cookie::get("email") && urldecode($key) == Cookie::get("key")){

        $conn = DB::connection("mysql");
        $sql = "UPDATE users SET active=1 WHERE email=?";
        $conn->update($sql, array($email));
        $message = "<hr><label class='label label-success'>Enhorabuena tu registro se ha completado </label></hr>";
        return Redirect::route("login")->with("message",$message);

    }
    else
    {
        return Redirect::route("register");
    }

});
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
        return Redirect::route("login");
    }

}));
Route::post('/register', array('before' => 'csrf', function(){

    $rules = array
    (
        'user' => 'required|regex:/^[a-záéóóúàèìòùäëïöüñ\s]+$/i|min:3|max:50',
        'email' => 'required|email|unique:users|between:3,80',
        'password' => 'required|regex:/^[a-z0-9]+$/i|min:8|max:16',
        'repetir_password' => 'required|same:password',
        'terminos' => 'required',
    );

    $messages = array
    (
        'user.required' => 'El campo nombre es requerido',
        'user.regex' => 'Sólo se aceptan letras',
        'user.min' => 'El mínimo permitido son 3 caracteres',
        'user.max' => 'El máximo permitido son 50 caracteres',
        'email.required' => 'El campo email es requerido',
        'email.email' => 'El formato de email es incorrecto',
        'email.unique' => 'El email ya se encuentra registrado',
        'email.between' => 'El email debe contener entre 3 y 80 caracteres',
        'password.required' => 'El campo password es requerido',
        'password.regex' => 'El campo password sólo acepta letras y números',
        'password.min' => 'El mínimo permitido son 8 caracteres',
        'password.max' => 'El máximo permitido son 16 caracteres',
        'repetir_password.required' => 'El campo repetir password es requerido',
        'repetir_password.same' => 'Los passwords no coinciden',
        'terminos.required' => 'Tienes que aceptar los términos',
    );

    $validator = Validator::make(Input::All(), $rules, $messages);

    if ($validator->passes())
    {
        //Guardar los datos en la tabla users
        $user = input::get('user');
        $email = input::get('email');
        $password = Hash::make(input::get('password'));

        $conn = DB::connection('mysql');
        $sql = "INSERT INTO users(user, email, password) VALUES (?, ?, ?)";
        $conn->insert($sql, array($user, $email, $password));

        // Crear cookies para luego verificar el link de registro
        // String alfanumérico de 32 caracteres de longitud
        $key = Str::random(32);
        Cookie::queue('key', $key, 60*24);
        // Almacenar el email
        Cookie::queue('email', $email, 60*24);

        // Crear la url de confirmación para el mensaje del email
        $msg = "<a href='".URL::to("/confirmregister/$email/$key")."'>Confirmar cuenta</a>";

        //Enviar email para confirmar el registro
        $data = array(
            'user' => $user,
            'msg' => $msg,
        );

        $fromEmail = 'mdgproduccionesweb@gmail.com';
        $fromName = 'Administrador';

        Mail::send('emails.register', $data, function($message) use ($fromName, $fromEmail, $user, $email)
        {
            $message->to($email, $user);
            $message->from($fromEmail, $fromName);
            $message->subject('Confirmar registro en Floristeria');
        });

        $message = '<hr><label class="label label-info">'.$user.' le hemos enviado un email a su cuenta de correo electrónico para que confirme su registro</label><hr>';

        return Redirect::route('register')->with("message", $message);
    }
    else
    {
        return Redirect::back()->withInput()->withErrors($validator);
    }

}));

/*Captura los errores 404*/
App::missing(function($exception){

    return Response::view("error.error404",array(),404);

});