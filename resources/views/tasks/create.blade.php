@extends('app')

    @section('content')
        <h1>Nueva Tarea</h1>
        <hr/>
        {!! Form::open(['url'=>'tasks']) !!}
            @include('errors.list')
            @include('tasks.partials.form', ['submitButtontext'=>'Guardar'])
        {!! Form::close() !!}
    @endsection