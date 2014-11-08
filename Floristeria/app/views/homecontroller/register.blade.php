@extends('homecontroller.layout')
@section('contenido')
<h2>Formulario de Registro</h2>

    {{Session::get("message")}}
    {{Form::open(array(
        "method" => "POST",
        "action" => "HomeController@register",
        "role" => "form"
    ))}}

    <div class="form-group">
        {{Form::label("Nombre:")}}
        {{Form::input("text","user",null,array("class"=>"form-control"))}}
        <div class="bg-danger">{{$errors->first('user')}}</div>
    </div>

    <div class="form-group">
        {{Form::label("Email:")}}
        {{Form::input("email","email",null,array("class"=>"form-control"))}}
        <div class="bg-danger">{{$errors->first('email')}}</div>
    </div>

    <div class="form-group">
        {{Form::label("Password:")}}
        {{Form::input("password","password",null,array("class"=>"form-control"))}}
        <div class="bg-danger">{{$errors->first('password')}}</div>
    </div>

    <div class="form-group">
        {{Form::label("Repetir Password:")}}
        {{Form::input("password","repetir_password",null,array("class"=>"form-control"))}}
        <div class="bg-danger">{{$errors->first('repetir_password')}}</div>
    </div>

    <div class="form-group">
        {{Form::label("Aceptar los términos:")}}
        {{Form::input("checkbox","terminos","On")}}
        <div class="bg-danger">{{$errors->first('terminos')}}</div>
    </div>

    <div class="form-group">
        {{Form::input("hidden","_token",csrf_token())}}
        {{Form::input("submit",null,"registrarme",array("class"=>"btn btn-primary"))}}
        <div class="bg-danger">{{$errors->first('password')}}</div>
    </div>

    {{Form::close()}}


@stop
