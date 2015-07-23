@extends('app')
    @section('content')
        <h1>Nueva Reserva</h1>
        <hr/>
        {!! Form::open(['url'=>'reservations']) !!}
            @include('errors.list')
            @include('reservations.form', ['submitButtontext'=>'Guardar'])
        {!! Form::close() !!}
    @stop

    @section('extra_js')
        @include('reservations.form_js')
    @stop