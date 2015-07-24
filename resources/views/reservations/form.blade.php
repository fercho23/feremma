<div class="form-group">
    {!! Form::label('owner','Titular:') !!}
    {!! Form::hidden('owner_id', ($reservation->owner ? $reservation->owner->id : ''), array('id' => 'owner_id')) !!}
    {!! Form::text('owner', ($reservation->owner ? $reservation->owner->fullname() : ''), ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('room','Habitaciones:') !!}
    <div class="group-labels" id="label-rooms" style="margin-bottom:5px;">
        @foreach ($reservation->rooms as $room)
            <span id="room-{!! $room->id !!}" class="label label-info" style="margin:5px;">
                {!! $room->name !!} <i class="fa fa-times-circle"></i>
            </span>
        @endforeach
    </div>
    {!! Form::hidden('rooms_id', implode(",", $reservation->rooms()->getRelatedIds()), array('id' => 'rooms_id')) !!}
    {!! Form::text('room', '', ['class'=>'form-control', 'autocomplete'=>'off', 'placeholder'=>'Ingresar nombre de una Habitación . . .']) !!}
</div>

<div class="form-group">
    {!! Form::label('service','Servicios:') !!}
    <div class="group-labels" id="label-services" style="margin-bottom:5px;">
        @foreach ($reservation->services as $service)
            <span id="service-{!! $service->id !!}" class="label label-info" style="margin:5px;">
                {!! $service->name !!} <i class="fa fa-times-circle"></i>
            </span>
        @endforeach
    </div>
    {!! Form::hidden('services_id', implode(",", $reservation->services()->getRelatedIds()), array('id' => 'services_id')) !!}
    {!! Form::text('service', '', ['class'=>'form-control', 'autocomplete'=>'off', 'placeholder'=>'Ingresar nombre de un Servicio . . .']) !!}
</div>

<div class="form-group">
    {!! Form::label('person','Pasajeros:') !!}
    <div class="group-labels" id="label-persons" style="margin-bottom:5px;">
        @foreach ($reservation->booking as $person)
            <span id="person-{!! $service->id !!}" class="label label-info" style="margin:5px;">
                {!! $person->name !!} <i class="fa fa-times-circle"></i>
            </span>
        @endforeach
    </div>
    {!! Form::hidden('persons_id', implode(",", $reservation->booking()->getRelatedIds()), array('id' => 'persons_id')) !!}
    {!! Form::text('person', '', ['class'=>'form-control', 'autocomplete'=>'off', 'placeholder'=>'Ingresar nombre de un Pasajero . . .']) !!}
</div>

<div class="form-group">
    {!! Form::label('total_price','Precio Total:') !!}
    {!! Form::input('number', 'total_price', null, ['class'=>'form-control',
                                                    'max'=>'9999999999',
                                                    'min'=>'0',
                                                    'step'=>'0.01']) !!}
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