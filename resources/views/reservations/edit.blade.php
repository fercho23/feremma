@extends('app')
    @section('content')
        <h1>Editar Reserva {!! $reservation->id !!}</h1>
        <hr/>
        {!! Form::model($reservation, ['method'=>'PATCH','action'=>['ReservationsController@update', $reservation->id]]) !!}
            @include('errors.list')
            @include('reservations.form', ['submitButtontext'=>'Actualizar'])
        {!! Form::close() !!}
    @stop

    @section('extra_js')
        @include('reservations.form_js')
    @stop