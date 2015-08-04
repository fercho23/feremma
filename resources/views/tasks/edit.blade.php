@extends('app')
    @section('content')
        <h1>Editar Tarea {!! $task->id !!}</h1>
        <hr/>
        {!! Form::model($task, ['method'=>'PATCH','action'=>['TasksController@update', $task->id]]) !!}
            @include('errors.list')
            @include('tasks.partials.form', ['submitButtontext'=>'Actualizar'])
        {!! Form::close() !!}
    @stop