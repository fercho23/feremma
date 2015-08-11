@extends('app')
    @section('content')
        <h1>Nueva Reserva</h1>
        <hr/>
        {!! Form::open(['url'=>'reservations']) !!}
            @include('errors.list')
            @include('reservations.partials.form', ['submitButtontext'=>'Guardar'])
        {!! Form::close() !!}
        <a href="{!! URL('home') !!}" class="btn btn-warning form-control" type="submit" value="Cancelar">Cancelar</a>
    @stop

    @section('extra_js')
        @include('reservations.partials.form_js')
    @stop