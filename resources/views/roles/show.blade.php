@extends('app')

    @section('content')

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