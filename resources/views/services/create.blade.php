@extends('app')
    @section('content')
        <h1>Nuevo Servicio</h1>
        <hr/>
        {!! Form::open(['url'=>'services']) !!}
            @include('errors.list')
            @include('services.partials.form', ['submitButtontext'=>'Guardar'])
        {!! Form::close() !!}
    @stop