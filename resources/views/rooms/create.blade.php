@extends('app')
    @section('content')
        <h1>Nueva Habitación</h1>
        <hr/>
        {!! Form::open(['url'=>'rooms']) !!}
            @include('errors.list')
            @include('rooms.partials.form', ['submitButtontext'=>'Guardar'])
        {!! Form::close() !!}
    @stop

    @section('extra_js')
        @include('rooms.partials.form_js')
    @stop