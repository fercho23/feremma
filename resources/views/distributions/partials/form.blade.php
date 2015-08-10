<div class="form-group">
    {!! Form::label('name','Nombre:') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('bed', 'Camas:') !!}
    <div class="row">
        <div class="col-lg-6 col-xs-6 no-gutter-right">
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
        <div class="col-lg-3 col-xs-3 no-gutter">
            <div class="form-control" readonly="True">
                <strong>Cantidad</strong>
            </div>
        </div>
        <div class="col-lg-1 col-xs-1">
            <span class="btn btn-default">
                <i class="fa fa-times-circle"></i>
            </span>
        </div>
    </div>
    <div class="group-labels" id="label-beds">
        @foreach ($distribution->beds as $bed)
            <div class="row" id="beds-{!! $bed->id !!}">
                <div class="col-lg-6 col-xs-6 no-gutter-right">
                    {!! Form::text('bed-name-'.$bed->id, $bed->name, ['class'=>'form-control', 'readonly'=>'True']) !!}
                </div>
                <div class="col-lg-1 col-xs-1 no-gutter">
                    {!! Form::text('bed-total_persons-'.$bed->id, $bed->total_persons, ['class'=>'form-control', 'readonly'=>'True']) !!}
                </div>
                <div class="col-lg-1 col-xs-1 no-gutter">
                    {!! Form::text('bed-price-'.$bed->id, $bed->price, ['class'=>'form-control', 'readonly'=>'True']) !!}
                </div>
                <div class="col-lg-3 col-xs-3 no-gutter">
                    @if($distribution->canBeModified())
                        {!! Form::input('number', 'bed-amount-'.$bed->id, $bed->pivot->amount, ['class'=>'form-control',
                                                                                                'min'=>'1',
                                                                                                'max'=>'20']) !!}
                    @else
                        {!! Form::text('bed-amount-'.$bed->id, $bed->pivot->amount, ['class'=>'form-control', 'readonly'=>'True']) !!}
                    @endif
                </div>
                <div class="col-lg-1 col-xs-1">
                    <span class="btn btn-{!! ($distribution->canBeModified() ? 'warning' : 'default')!!}">
                        <i {!! ($distribution->canBeModified() ? 'name="fa-kill"' : '')!!}  class="fa fa-times-circle"></i>
                    </span>
                </div>
            </div>
        @endforeach
    </div>
    @if($distribution->canBeModified())
        {!! Form::hidden('beds_id', implode(",", $distribution->beds()->getRelatedIds()), array('id' => 'beds_id')) !!}
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-rocket"></i></span>
            {!! Form::text('bed', '', ['class'=>'form-control', 'autocomplete'=>'off', 'placeholder'=>'Ingresar nombre de un Servicio . . .']) !!}
        </div>
    @endif
</div>

<div class="form-group">
    {!! Form::label('price','Precio Final de la Distribución') !!}
    <div class="input-group">
        <span class="input-group-addon">
            <i class="fa fa-usd"></i>
            <i class="fa fa-usd"></i>
        </span>
        {!! Form::text('price', '0', ['class'=>'form-control', 'readonly'=>'True']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('total_persons','Cantidad de Personas que entran en la Distribución') !!}
    <div class="input-group">
        <span class="input-group-addon">
            <i class="fa fa-male"></i>
            <i class="fa fa-female"></i>
        </span>
        {!! Form::text('total_persons', '0', ['class'=>'form-control', 'readonly'=>'True']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('description','Descripción:')!!}
    {!! Form::text('description', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtontext, ['class'=>'btn btn-primary form-control']) !!}
</div>