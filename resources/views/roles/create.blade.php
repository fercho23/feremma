@extends('app')
    @section('content')
        <h1>Nuevo Cargo</h1>
        <hr/>
        {!! Form::open(['url'=>'roles']) !!}
            @include('errors.list')
            @include('roles.form', ['submitButtontext'=>'Guardar'])
        {!! Form::close() !!}
    @stop