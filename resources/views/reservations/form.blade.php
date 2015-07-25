<div class="form-group">
    {!! Form::label('owner','Titular:') !!}
    {!! Form::hidden('owner_id', ($reservation->owner ? $reservation->owner->id : ''), array('id' => 'owner_id')) !!}
    {!! Form::text('owner', ($reservation->owner ? $reservation->owner->fullname().' ['.$reservation->owner->dni.']' : ''), ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('room','Habitaciones:') !!}
    <div class="group-labels" id="label-rooms" style="margin-bottom:5px;">
        @foreach ($reservation->rooms as $room)
            <div id="rooms-{!! $room->id !!}" class="label label-info" style="margin:5px;">
                {!! $room->name !!} [{!! $room->total_beds !!}] <i name="fa-kill" class="fa fa-times-circle"></i>
            </div>
        @endforeach
    </div>
    {!! Form::hidden('rooms_id', implode(",", $reservation->rooms()->getRelatedIds()), array('id' => 'rooms_id')) !!}
    {!! Form::text('room', '', ['class'=>'form-control', 'autocomplete'=>'off', 'placeholder'=>'Ingresar nombre de una Habitación . . .']) !!}
</div>

<div class="form-group">
    {!! Form::label('service','Servicios:') !!}
    <div class="group-labels" id="label-services">
        <div class="row">
            <div class="col-lg-5 col-xs-10">
                <div class="form-control" readonly="True">
                    Nombre del Servicio
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="form-control" readonly="True">
                    Cantidad
                </div>  
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="form-control" readonly="True">
                    Precio
                </div>
            </div>
            <div class="col-lg-1 col-xs-2">
                <i class="fa fa-times-circle"></i>
            </div>
        </div>
        @foreach ($reservation->services as $service)
            <div class="row" id="services-{!! $service->id !!}">
                <div class="col-lg-5 col-xs-10">
                    {!! Form::text('service-id-'.$service->id, $service->name, ['class'=>'form-control', 'readonly'=>'True']) !!}
                </div>
                <div class="col-lg-3 col-xs-6"> {!!$service->quantity!!}
                    {!! Form::input('number', 'service-quantity-'.$service->id, $service->quantity, ['class'=>'form-control', 'min'=>'1']) !!}
                </div>
                <div class="col-lg-3 col-xs-6">
                    {!! Form::input('number', 'service-price-'.$service->id, $service->price, ['class'=>'form-control',
                                                                                 'max'=>'9999999999',
                                                                                 'min'=>'0',
                                                                                 'step'=>'0.01']) !!}
                </div>
                <div class="col-lg-1 col-xs-2">
                    <i name="fa-kill" class="fa fa-times-circle"></i>
                </div>
            </div>
        @endforeach
    </div>
    {!! Form::hidden('services_id', implode(",", $reservation->services()->getRelatedIds()), array('id' => 'services_id')) !!}
    {!! Form::text('service', '', ['class'=>'form-control', 'autocomplete'=>'off', 'placeholder'=>'Ingresar nombre de un Servicio . . .']) !!}
</div>

<div class="form-group">
    {!! Form::label('person','Pasajeros:') !!}
    <div class="group-labels" id="label-persons" style="margin-bottom:5px;">
        @foreach ($reservation->booking as $person)
            <div id="persons-{!! $person->id !!}" class="label label-info" style="margin:5px;">
                {!! $person->fullname() !!}  [{!! $person->dni !!}]<i name="fa-kill" class="fa fa-times-circle"></i>
            </div>
        @endforeach
    </div>
    {!! Form::hidden('persons_id', implode(",", $reservation->booking()->getRelatedIds()), array('id' => 'persons_id')) !!}
    {!! Form::text('person', '', ['class'=>'form-control', 'autocomplete'=>'off', 'placeholder'=>'Ingresar nombre de un Pasajero . . .']) !!}
</div>

<div class="form-group">
    <div class="row">
        <div class="col-lg-6 col-xs-12">
            {!! Form::label('total_price','Precio Total:') !!}
        </div>
        <div class="col-lg-6 col-xs-12">
            {!! Form::label('suggested_number','Precio Sugerido') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-xs-12">
            {!! Form::input('number', 'total_price', null, ['class'=>'form-control',
                                                            'max'=>'9999999999',
                                                            'min'=>'0',
                                                            'step'=>'0.01']) !!}
        </div>
        <div class="col-lg-6 col-xs-12">
            {!! Form::hidden('suggested_number_array', '', array('id' => 'suggested_number_array')) !!}
            {!! Form::text('suggested_number', '', ['class'=>'form-control', 'readonly'=>'True']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::label('sign','Seña:') !!}
    {!! Form::input('number', 'sign', null, ['class'=>'form-control',
                                             'max'=>'9999999999',
                                             'min'=>'0',
                                             'step'=>'0.01']) !!}
</div>
<div class="form-group">
    {!! Form::label('due','Deuda:') !!}
    {!! Form::input('number', 'due', null, ['class'=>'form-control',
                                            'max'=>'9999999999',
                                            'min'=>'0',
                                            'step'=>'0.01']) !!}
</div>
<div class="form-group">
    {!! Form::label('check_in','Fecha entrada:') !!}
    {!! Form::input('date','check_in', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('check_out','Fecha salida:') !!}
    {!! Form::input('date','check_out', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('description','Descripción:') !!}
    {!! Form::text('description', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtontext, ['class'=>'btn btn-primary form-control']) !!}
</div>