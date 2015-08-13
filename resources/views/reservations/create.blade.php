@extends('app')
    @section('content')
        <h1>Nueva Reserva</h1>
        <hr/>
        {!! Form::open(['url'=>'reservations']) !!}
            @include('errors.list')
            @include('reservations.partials.form', ['submitButtontext'=>'Guardar'])
        {!! Form::close() !!}
    @endsection

    @section('extra_js')
        @include('reservations.partials.form_js')
    @endsection