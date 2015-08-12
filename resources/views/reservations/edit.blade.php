@extends('app')
    @section('content')
        <h1>Editar Reserva {!! $reservation->id !!}</h1>
        <hr/>
        {!! Form::model($reservation, ['method'=>'PATCH','action'=>['ReservationsController@update', $reservation->id]]) !!}
            @include('errors.list')
            @include('reservations.partials.form', ['submitButtontext'=>'Actualizar'])
        {!! Form::close() !!}
    @endsection

    @section('extra_js')
        @include('reservations.partials.form_js')
    @endsection