@extends('app')
    @section('content')
        <h1>Nueva Tarea para {!! Auth::user()->role->name !!}</h1>
        <hr/>
        {!! Form::open(['url'=>'tasks']) !!}
            @include('errors.list')
            <input class="form-control" name="role_id" type="hidden" id="role_id" value="{!! Auth::user()->role_id !!}">
			@include('tasks.fields', ['submitButtontext'=>'Guardar'])            
        {!! Form::close() !!}
@stop