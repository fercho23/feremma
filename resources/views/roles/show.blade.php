@extends('app')

    @section('content')

        <h1>Ver Cargo {!! $role->id !!}</h1>
        <hr/>

        {!! Form::label('name','Nombre:') !!}
        <div class="form-control" readonly="True">{!! $role->name !!}</div>
        </br>

        @if($role->description)
            {!! Form::label('description', 'Descripción:') !!}
            <div class="form-control" readonly="True">
                {!! $role->description !!}
            </div>
        @endif

    @endsection