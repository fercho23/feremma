@extends('app')
    @section('content')
        <h1>Nueva Habitación</h1>
        <hr/>
        {!! Form::open(['url'=>'rooms']) !!}
            @include('errors.list')
            @include('rooms.form', ['submitButtontext'=>'Guardar'])
        {!! Form::close() !!}
    @stop