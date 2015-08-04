@extends('app')
    @section('content')
        <h1>Nuevo Cargo</h1>
        <hr/>
        {!! Form::open(['url'=>'roles']) !!}
            @include('errors.list')
            @include('roles.partials.form', ['submitButtontext'=>'Guardar'])
        {!! Form::close() !!}
    @stop