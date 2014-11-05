@extends('homecontroller.layout')
@section('contenido')
<h2>Bienvenido {{Auth::user()->get()->user}}</h2>
@stop