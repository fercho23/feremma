@extends('app')

    @section('content')

        {!! Form::label('name','Nombre:') !!}
        <div class="form-control" readonly="True">{!! $distribution->name !!}</div>
        </br>

        {!! Form::label('bed', 'Camas:') !!}
        <div class="row">
            <div class="col-lg-7 col-xs-7 no-gutter-right">
                <div class="form-control" readonly="True">
                    <strong>Nombre de la Cama</strong>
                </div>
            </div>
            <div class="col-lg-1 col-xs-1 no-gutter">
                <div class="form-control" readonly="True">
                    <i class="fa fa-male" title="Cantidad de Personas"></i>
                    <i class="fa fa-female" title="Cantidad de Personas"></i>
                </div>
            </div>
            <div class="col-lg-1 col-xs-1 no-gutter">
                <div class="form-control" readonly="True">
                    <i class="fa fa-usd" title="Precio"></i>
                </div>
            </div>
            <div class="col-lg-3 col-xs-3 no-gutter-left">
                <div class="form-control" readonly="True">
                    <strong>Cantidad</strong>
                </div>
            </div>
        </div>
        @foreach ($distribution->beds as $bed)
            <div class="row">
                <div class="col-lg-7 col-xs-7 no-gutter-right">
                    <div class="form-control" readonly="true">{!! $bed->name !!}</div>
                </div>
                <div class="col-lg-1 col-xs-1 no-gutter">
                    <div class="form-control" readonly="true">{!! $bed->total_persons !!}</div>
                </div>
                <div class="col-lg-1 col-xs-1 no-gutter">
                    <div class="form-control" readonly="true">{!! $bed->price !!}</div>
                </div>
                <div class="col-lg-3 col-xs-3 no-gutter-left">
                    <div class="form-control" readonly="true">{!! $bed->pivot->amount !!}</div>
                </div>
            </div>
        @endforeach
        </br>

        {!! Form::label('price','Precio Final de la Distribución') !!}
        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-usd"></i>
                <i class="fa fa-usd"></i>
            </span>
            <div class="form-control" readonly="True">{!! $distribution->price() !!}</div>
        </div>

        {!! Form::label('total_persons','Cantidad de Personas que entran en la Distribución') !!}
        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-male"></i>
                <i class="fa fa-female"></i>
            </span>
            <div class="form-control" readonly="True">{!! $distribution->totalPersons() !!}</div>
        </div>

        @if($distribution->description)
            {!! Form::label('description', 'Descripción:') !!}
            <div class="form-control" readonly="True">
                {!! $distribution->description !!}
            </div>
        @endif

    @endsection