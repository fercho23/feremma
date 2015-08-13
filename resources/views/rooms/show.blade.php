@extends('app')

    @section('content')

        <h1>Ver Habitación {!! $room->id !!}</h1>
        <hr/>

        {!! Form::label('name','Nombre:') !!}
        <div class="form-control" readonly="True">{!! $room->name !!}</div>
        </br>

        {!! Form::label('distribution','Distribuciones de Camas:') !!}
        <div class="row">
            <div class="col-lg-10 col-xs-10 no-gutter-right">
                <div class="form-control" readonly="True">
                    <strong>Distribución</strong>
                    [ <i class="fa fa-male" title="Cantidad de Personas"></i><i class="fa fa-female" title="Cantidad de Personas"></i> ]
                    [ <i class="fa fa-usd" title="Precio"></i> ]
                </div>
            </div>
            <div class="col-lg-2 col-xs-2 no-gutter-left">
                <div class="form-control" readonly="True">
                    <i class="fa fa-thumbs-o-up" title="Disponible"></i>
                </div>
            </div>
        </div>
        @foreach ($room->distributions as $distribution)
            <div class="row">
                <div class="col-lg-10 col-xs-10 no-gutter-right">
                    <div class="form-control" readonly="True">
                        {!! $distribution->representation() !!}
                    </div>
                </div>
                <div class="col-lg-2 col-xs-2 no-gutter-left">
                    <div class="form-control" readonly="True">
                        {!! Form::checkbox('checkbox-', null, ($distribution->pivot->available ? true : false), ['class' => 'checkbox', 'disabled'=>'true']) !!}
                    </div>
                </div>
            </div>
        @endforeach
        </br>

        {!! Form::label('price','Precio base:')!!}
        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-usd"></i>
                <i class="fa fa-usd"></i>
            </span>
            <div class="form-control" readonly="True">{!! $room->price !!}</div>
        </div>
        </br>

        {!! Form::label('location','Ubicación:') !!}
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-crosshairs"></i></span>
            <div class="form-control" readonly="True">{!! $room->location !!}</div>
        </div>
        </br>

        @if($room->description)
            {!! Form::label('description', 'Descripción:') !!}
            <div class="form-control" readonly="True">
                {!! $room->description !!}
            </div>
        @endif

    @endsection