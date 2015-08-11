@extends('app')
    @section('content')
        <h1>Nuevo Servicio</h1>
        <hr/>
        {!! Form::open(['url'=>'services']) !!}
            @include('errors.list')
            @include('services.partials.form', ['submitButtontext'=>'Guardar'])
        {!! Form::close() !!}
        <a href="{!! URL('home') !!}" class="btn btn-warning form-control" type="submit" value="Cancelar">Cancelar</a>
    @stop