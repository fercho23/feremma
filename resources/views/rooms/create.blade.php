@extends('app')
    @section('content')
        <h1>Nueva Habitación</h1>
        <hr/>
        {!! Form::open(['url'=>'rooms']) !!}
            @include('errors.list')
            @include('rooms.partials.form', ['submitButtontext'=>'Guardar'])
        {!! Form::close() !!}
        <a href="{!! URL('home') !!}" class="btn btn-warning form-control" type="submit" value="Cancelar">Cancelar</a>
    @stop

    @section('extra_js')
        @include('rooms.partials.form_js')
    @stop