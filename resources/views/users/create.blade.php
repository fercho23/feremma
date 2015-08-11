@extends('app')
    @section('content')
        <h1>Nuevo Usuario</h1>
        <hr/>
        {!! Form::open(['url'=>'users']) !!}
            @include('errors.list')
            @include('users.partials.form', ['submitButtontext'=>'Guardar'])
        {!! Form::close() !!}
        <a href="{!! URL('home') !!}" class="btn btn-warning form-control" type="submit" value="Cancelar">Cancelar</a>
    @stop
