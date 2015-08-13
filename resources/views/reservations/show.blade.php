@extends('app')
    @section('content')

        <h1>Ver Reservación {!! $reservation->id !!}</h1>
        <hr/>

        {!! Form::label('check_in', 'Fecha entrada:') !!}
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            <div class="form-control">{!! date("d/m/Y", strtotime($reservation->check_in)) !!}</div>
        </div>
        </br>

        {!! Form::label('check_out', 'Fecha salida:') !!}
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            <div class="form-control">{!! date("d/m/Y", strtotime($reservation->check_out)) !!}</div>
        </div></br>

        {!! Form::label('owner', 'Titular:') !!}
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user-secret"></i></span>
            <div class="form-control">{!! ($reservation->owner ? $reservation->owner->fullname().' ['.$reservation->owner->dni.']' : '') !!}</div>
        </div>
        </br>

        {!! Form::label('room', 'Habitaciones:') !!}
        <div class="row">
            <div class="col-lg-5 col-xs-5 no-gutter-right">
                <div class="form-control" readonly="True">
                    <strong>Nombre de la Habitación</strong>
                </div>
            </div>
            <div class="col-lg-4 col-xs-4 no-gutter">
                <div class="form-control" readonly="True">
                    <strong>Distribución</strong>
                </div>
            </div>
            <div class="col-lg-1 col-xs-1 no-gutter">
                <div class="form-control" readonly="True">
                    <i class="fa fa-male" title="Cantidad de Personas"></i>
                    <i class="fa fa-female" title="Cantidad de Personas"></i>
                </div>
            </div>
            <div class="col-lg-2 col-xs-2 no-gutter-left">
                <div class="form-control" readonly="True">
                    <i class="fa fa-arrow-right" title="Precio Final"></i>
                    <i class="fa fa-usd" title="Precio Final"></i>
                    <i class="fa fa-usd" title="Precio Final"></i>
                </div>
            </div>
        </div>
        @foreach ($reservation->rooms as $room)
            <div class="row">
                <div class="col-lg-5 col-xs-5 no-gutter-right">
                    <div class="form-control" readonly="true">{!! $room->name !!}</div>
                </div>
                <div class="col-lg-4 col-xs-4 no-gutter">
                    <div class="form-control" readonly="true">{!! $room->getAvailableDistribuionsAndMyDistributionByReservationId($reservation->id)->first()->name !!}</div>
                </div>
                <div class="col-lg-1 col-xs-1 no-gutter">
                    <div class="form-control" readonly="true">{!! $room->getAvailableDistribuionsAndMyDistributionByReservationId($reservation->id)->first()->totalPersons() !!}</div>
                </div>
                <div class="col-lg-2 col-xs-2 no-gutter-left">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-arrow-right"></i></span>
                        <div class="form-control" readonly="true">{!! $room->getMyDistributionPriceByReservationId($reservation->id) !!}</div>
                    </div>
                </div>
            </div>
        @endforeach
        </br>

        @if(count($reservation->services))
            {!! Form::label('service', 'Servicios:') !!}
            <div class="row">
                <div class="col-lg-6 col-xs-6 no-gutter-right">
                    <div class="form-control" readonly="True">
                        <strong>Nombre del Servicio</strong>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-3 no-gutter">
                    <div class="form-control" readonly="True">
                        <strong>Cantidad</strong>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-3 no-gutter-left">
                    <div class="form-control" readonly="True">
                        <strong>Precio</strong>
                    </div>
                </div>
            </div>
            @foreach ($reservation->services as $service)
                <div class="row">
                    <div class="col-lg-6 col-xs-6 no-gutter-right">
                        <div class="form-control" readonly="true">{!! $service->pivot->name !!}</div>
                    </div>
                    <div class="col-lg-3 col-xs-3 no-gutter">
                        <div class="form-control" readonly="true">{!! $service->pivot->quantity !!}</div>
                    </div>
                    <div class="col-lg-3 col-xs-3 no-gutter-left">
                        <div class="form-control" readonly="true">{!! $service->pivot->price !!}</div>
                    </div>
                </div>
            @endforeach
            </br>
        @endif

        @if(count($reservation->booking))
            {!! Form::label('person', 'Pasajeros:') !!}
            <div class="group-labels" id="label-persons" style="margin-bottom:5px;">
                @foreach ($reservation->booking as $person)
                    <div id="persons-{!! $person->id !!}" class="label label-info" style="margin:5px;">
                        {!! $person->fullname() !!} [{!! $person->dni !!}]
                    </div>
                @endforeach
            </div>
            </br>
        @endif

        {!! Form::label('total_price','Precio Total:') !!}
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-usd"></i></span>
            <div class="form-control">{!! $reservation->total_price !!}</div>
        </div>
        </br>

        {!! Form::label('sign','Señal:') !!}
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-usd"></i></span>
            <div class="form-control">{!! $reservation->sign !!}</div>
        </div>
        </br>

        {!! Form::label('due', 'Deuda:') !!}
        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-usd"></i>
                <i class="fa fa-usd"></i>
            </span>
            <div class="form-control">
                {!! $reservation->due !!}
            </div>
        </div>
        </br>

        @if($reservation->description)
            {!! Form::label('description', 'Descripción:') !!}
            <div class="form-control">
                {!! $reservation->description !!}
            </div>
        @endif

    @endsection