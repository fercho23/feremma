@extends('app')
    @section('content')
        <h1>Nueva Tarea</h1>
        <hr/>
        {!! Form::open(['url'=>'tasks']) !!}
            @include('errors.list')
            @include('tasks.form', ['submitButtontext'=>'Guardar'])
        {!! Form::close() !!}
    @stop