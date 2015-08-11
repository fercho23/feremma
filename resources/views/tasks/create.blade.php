@extends('app')
    @section('content')
        <h1>Nueva Tarea</h1>
        <hr/>
        {!! Form::open(['url'=>'tasks']) !!}
            @include('errors.list')
            @include('tasks.partials.form', ['submitButtontext'=>'Guardar'])
        {!! Form::close() !!}
        <a href="{!! URL('home') !!}" class="btn btn-warning form-control" type="submit" value="Cancelar">Cancelar</a>
    @stop