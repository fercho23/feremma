@extends('app')
    @section('content')
        <h1>Nuevo Cargo</h1>
        <hr/>
        {!! Form::open(['url'=>'posts']) !!}
            @include('errors.list')
            @include('posts.form', ['submitButtontext'=>'Guardar'])
        {!! Form::close() !!}
    @stop