@extends('app')

    @section('content')

        {!! Form::label('name','Nombre:') !!}
        <div class="form-control" readonly="True">{!! $service->name !!}</div>
        </br>

        {!! Form::label('price','Precio:')!!}
        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-usd"></i>
                <i class="fa fa-usd"></i>
            </span>
            <div class="form-control" readonly="True">{!! $service->price !!}</div>
        </div>
        </br>

        @if($service->description)
            {!! Form::label('description', 'Descripción:') !!}
            <div class="form-control" readonly="True">
                {!! $service->description !!}
            </div>
        @endif

    @endsection