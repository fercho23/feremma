@extends('app')

    @section('content')

        <h1>Ver Cama {!! $bed->id !!}</h1>
        <hr/>

        {!! Form::label('name','Nombre:') !!}
        <div class="form-control" readonly="True">{!! $bed->name !!}</div>
        </br>

        {!! Form::label('total_persons','Total Personas:')!!}
        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-male"></i>
                <i class="fa fa-female"></i>
            </span>
            <div class="form-control" readonly="True">{!! $bed->total_persons !!}</div>
        </div>
        </br>

        {!! Form::label('price','Precio:')!!}
        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-usd"></i>
                <i class="fa fa-usd"></i>
            </span>
            <div class="form-control" readonly="True">{!! $bed->price !!}</div>
        </div>
        </br>

        @if($bed->description)
            {!! Form::label('description', 'Descripción:') !!}
            <div class="form-control" readonly="True">
                {!! $bed->description !!}
            </div>
        @endif

    @endsection