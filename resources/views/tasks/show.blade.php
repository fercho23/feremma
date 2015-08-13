@extends('app')

    @section('content')

        <h1>Ver Tarea {!! $task->id !!}</h1>
        <hr/>

        {!! Form::label('name','Nombre:') !!}
        <div class="form-control" readonly="True">{!! $task->name !!}</div>
        </br>

        {!! Form::label('role_id', 'Cargo:') !!}
        <div class="form-control" readonly="True">{!! $task->role->name !!}</div>
        </br>

        {!! Form::label('priority','Prioridad:')!!}
        <div class="form-control" readonly="True">{!! $task->number !!}</div>
        </br>

        {!! Form::label('state','Estado:')!!}
        <div class="form-control" readonly="True">{!! $task->state !!}</div>
        </div>

        @if($task->description)
            {!! Form::label('description', 'Descripción:') !!}
            <div class="form-control" readonly="True">
                {!! $task->description !!}
            </div>
        @endif

    @endsection