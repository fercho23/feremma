<div class="form-group">
    {!! Form::label('check_in', 'Fecha entrada:') !!}
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        {!! Form::input('date','check_in', null, ['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('check_out', 'Fecha salida:') !!}
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        {!! Form::input('date','check_out', null, ['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('owner', 'Titular:') !!}
    {!! Form::hidden('owner_id', ($reservation->owner ? $reservation->owner->id : ''), array('id' => 'owner_id')) !!}
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-user-secret"></i></span>
        {!! Form::text('owner', ($reservation->owner ? $reservation->owner->fullname().' ['.$reservation->owner->dni.']' : ''), ['class'=>'form-control',
                                                                                                                                 'placeholder'=>'Ingresar nombre de Usuario . . .']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('room', 'Habitaciones:') !!}
    <div class="row">
        <div class="col-lg-12 col-xs-12" id="posible-rooms"></div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-xs-4 no-gutter-right">
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
        <div class="col-lg-2 col-xs-2 no-gutter">
            <div class="form-control" readonly="True">
                <i class="fa fa-arrow-right" title="Precio Final"></i>
                <i class="fa fa-usd" title="Precio Final"></i>
                <i class="fa fa-usd" title="Precio Final"></i>
            </div>
        </div>
        <div class="col-lg-1 col-xs-1">
            <span class="btn btn-default">
                <i class="fa fa-times-circle"></i>
            </span>
        </div>
    </div>
    <div class="group-labels" id="label-rooms">
        @foreach ($reservation->rooms as $room)
            <div class="row" id="rooms-{!! $room->id !!}">
                <div class="col-lg-4 col-xs-4 no-gutter-right">
                    {!! Form::text('room-name-'.$room->id, $room->name, ['class'=>'form-control', 'readonly'=>'True']) !!}
                    {!! Form::hidden('room-price-'.$room->id, $room->price) !!}
                </div>
                <div class="col-lg-4 col-xs-4 no-gutter">
                    <select class="form-control" name="room-{!! $room->id !!}-distributions">
                        @foreach($room->getAvailableDistribuionsAndMyDistributionByReservationId($reservation->id) as $distribution)
                            <option data-persons="{!! $distribution->totalPersons() !!}" data-price="{!! $distribution->price() !!}" value="{!! $distribution->id !!}">
                                {!! $distribution->name !!}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-1 col-xs-1 no-gutter">
                    {!! Form::text('room-total_persons-'.$room->id, $room->getAvailableDistribuionsAndMyDistributionByReservationId($reservation->id)->first()->totalPersons(), ['class'=>'form-control', 'readonly'=>'True']) !!}
                </div>
                <div class="col-lg-2 col-xs-2 no-gutter">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-arrow-right"></i></span>
                        {!! Form::text('room-final_price-'.$room->id, $room->getMyDistributionPriceByReservationId($reservation->id), ['class'=>'form-control', 'readonly'=>'True']) !!}
                    </div>
                </div>
                <div class="col-lg-1 col-xs-1">
                    <span class="btn btn-warning">
                        <i name="fa-kill" class="fa fa-times-circle"></i>
                    </span>
                </div>
            </div>
        @endforeach
    </div>

    {!! Form::hidden('rooms_id', (old('rooms_id') ? old('rooms_id') : implode(",", $reservation->rooms()->getRelatedIds())), array('id' => 'rooms_id')) !!}
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-bed"></i></span>
        {!! Form::text('room', '', ['class'=>'form-control', 'autocomplete'=>'off', 'placeholder'=>'Ingresar nombre de una Habitación . . .']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('service', 'Servicios:') !!}
    <div class="row">
        <div class="col-lg-5 col-xs-5">
            <div class="form-control" readonly="True">
                <strong>Nombre del Servicio</strong>
            </div>
        </div>
        <div class="col-lg-3 col-xs-3 no-gutter">
            <div class="form-control" readonly="True">
                <strong>Cantidad</strong>
            </div>
        </div>
        <div class="col-lg-3 col-xs-3 no-gutter">
            <div class="form-control" readonly="True">
                <strong>Precio</strong>
            </div>
        </div>
        <div class="col-lg-1 col-xs-1">
            <span class="btn btn-default">
                <i class="fa fa-times-circle"></i>
            </span>
        </div>
    </div>
    <div class="group-labels" id="label-services">
        @foreach ($reservation->services as $service)
            <div class="row" id="services-{!! $service->id !!}">
                <div class="col-lg-5 col-xs-5">
                    {!! Form::text('service-name-'.$service->id, $service->pivot->name, ['class'=>'form-control', 'readonly'=>'True']) !!}
                </div>
                <div class="col-lg-3 col-xs-3 no-gutter">
                    {!! Form::input('number', 'service-quantity-'.$service->id, $service->pivot->quantity, ['class'=>'form-control', 'min'=>'1']) !!}
                </div>
                <div class="col-lg-3 col-xs-3 no-gutter">
                    {!! Form::input('number', 'service-price-'.$service->id, $service->pivot->price, ['class'=>'form-control',
                                                                                 'max'=>'9999999999',
                                                                                 'min'=>'0',
                                                                                 'step'=>'0.01']) !!}
                </div>
                <div class="col-lg-1 col-xs-1">
                    <span class="btn btn-warning">
                        <i name="fa-kill" class="fa fa-times-circle"></i>
                    </span>
                </div>
            </div>
        @endforeach
    </div>
    {!! Form::hidden('services_id', implode(",", $reservation->services()->getRelatedIds()), array('id' => 'services_id')) !!}
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-glass"></i></span>
        {!! Form::text('service', '', ['class'=>'form-control', 'autocomplete'=>'off', 'placeholder'=>'Ingresar nombre de un Servicio . . .']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('person', 'Pasajeros:') !!}
    <div class="group-labels" id="label-persons" style="margin-bottom:5px;">
        @foreach ($reservation->booking as $person)
            <div id="persons-{!! $person->id !!}" class="label label-info" style="margin:5px;">
                {!! $person->fullname() !!} [{!! $person->dni !!}]<i name="fa-kill" class="fa fa-times-circle"></i>
            </div>
        @endforeach
    </div>
    {!! Form::hidden('persons_id', implode(",", $reservation->booking()->getRelatedIds()), array('id' => 'persons_id')) !!}
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
        {!! Form::text('person', '', ['class'=>'form-control', 'autocomplete'=>'off', 'placeholder'=>'Ingresar nombre de un Pasajero . . .']) !!}
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-lg-6 col-xs-6 no-gutter-right">
            {!! Form::label('total_price','Precio Total:') !!}
        </div>
        <div class="col-lg-6 col-xs-6 no-gutter-left">
            {!! Form::label('suggested_price','Precio Sugerido') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-xs-6 no-gutter-right">
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-usd"></i>
                    <i class="fa fa-usd"></i>
                </span>
                {!! Form::input('number', 'total_price', null, ['class'=>'form-control',
                                                                'max'=>'9999999999',
                                                                'min'=>'0',
                                                                'step'=>'0.01']) !!}
            </div>
        </div>
        <div class="col-lg-6 col-xs-6 no-gutter-left">
            <div class="input-group">
                {!! Form::text('suggested_price', '0', ['class'=>'form-control', 'readonly'=>'True']) !!}
                <span class="input-group-addon"><i class="fa fa-usd"></i></span>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-lg-6 col-xs-6 no-gutter-right">
            {!! Form::label('sign','Seña:') !!}
        </div>
        <div class="col-lg-6 col-xs-6 no-gutter-left">
            {!! Form::label('suggested_sign','Seña Sugerida') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-xs-6 no-gutter-right">
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-usd"></i>
                    <i class="fa fa-usd"></i>
                </span>
                {!! Form::input('number', 'sign', null, ['class'=>'form-control',
                                                         'max'=>'9999999999',
                                                         'min'=>'0',
                                                         'step'=>'0.01']) !!}
            </div>
        </div>
        <div class="col-lg-6 col-xs-6">
            <div class="form-horizontal">
                <div class="row">
                        <div class="col-lg-5 col-xs-5 no-gutter-right">
                            <div class="input-group">
                                <span class="input-group-addon">%</span>
                                {!! Form::input('number', 'percentage_sign', '10', ['class'=>'form-control',
                                                                                    'max'=>'9999999999',
                                                                                    'min'=>'0',
                                                                                    'step'=>'0.01']) !!}
                                <span class="input-group-addon"><i class="fa fa-arrow-right"></i></span>
                            </div>
                        </div>
                        <div class="col-lg-7 col-xs-7 no-gutter-left">
                            <div class="input-group">
                                {!! Form::text('suggested_sign', '0', ['class'=>'form-control', 'readonly'=>'True']) !!}
                                <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::label('due', 'Deuda:') !!}
    <div class="input-group">
        <span class="input-group-addon">
            <i class="fa fa-usd"></i>
            <i class="fa fa-usd"></i>
        </span>
        {!! Form::text('due', null, ['class'=>'form-control', 'readonly'=>'True']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('description', 'Descripción:') !!}
    {!! Form::text('description', null, ['class'=>'form-control']) !!}
</div>

@include('includes.partials.form-actions', ['model'=>'reservations'])