@extends('app')
    @section('content')
        <h1>Nuevo Cargo</h1>
        <hr/>
        {!! Form::open(['url'=>'roles']) !!}
            @include('errors.list')
            @include('roles.partials.form', ['submitButtontext'=>'Guardar'])
        {!! Form::close() !!}
        <a href="{!! URL('home') !!}" class="btn btn-warning form-control" type="submit" value="Cancelar">Cancelar</a>
    @stop