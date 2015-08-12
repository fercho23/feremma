<div class="form-group">
    {!! Form::label('name','Nombre:') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('distribution','Distribuciones de Camas:') !!}
    <div class="row">
        <div class="col-lg-10 col-xs-10 no-gutter-right">
            <div class="form-control" readonly="True">
                <strong>Distribución</strong>
                [ <i class="fa fa-male" title="Cantidad de Personas"></i><i class="fa fa-female" title="Cantidad de Personas"></i> ]
                [ <i class="fa fa-usd" title="Precio"></i> ]
            </div>
        </div>
        <div class="col-lg-1 col-xs-1 no-gutter">
            <div class="form-control" readonly="True">
                <i class="fa fa-thumbs-o-up" title="Disponible"></i>
            </div>
        </div>
        <div class="col-lg-1 col-xs-1">
            <span class="btn btn-default">
                <i class="fa fa-times-circle"></i>
            </span>
        </div>
    </div>
    <div class="group-labels" id="label-distributions">
        @foreach ($room->distributions as $distribution)
            <div class="row" id="distributions-{!! $distribution->id !!}">
                <div class="col-lg-10 col-xs-10 no-gutter-right">
                    <div class="form-control" readonly="True">
                        {!! $distribution->representation() !!}
                    </div>
                </div>
                <div class="col-lg-1 col-xs-1 no-gutter">
                    <div class="form-control">
                        {!! Form::checkbox('distribution-checkbox-'.$distribution->id, null, ($distribution->pivot->available ? true : false), ['class' => 'checkbox']) !!}
                    </div>
                </div>
                <div class="col-lg-1 col-xs-1">
                    <span class="btn btn-{!! ($distribution->canBeEliminatedFromRoomId($room->id) ? 'warning' : 'default')!!}">
                        <i {!! ($distribution->canBeEliminatedFromRoomId($room->id) ? 'name="fa-kill"' : '')!!}  class="fa fa-times-circle"></i>
                    </span>
                </div>
            </div>
        @endforeach
    </div>
    {!! Form::hidden('distributions_id', implode(",", $room->distributions()->getRelatedIds()), array('id' => 'distributions_id')) !!}
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
        {!! Form::text('distribution', '', ['class'=>'form-control', 'autocomplete'=>'off', 'placeholder'=>'Ingresar nombre de una Distribución . . .']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('price','Precio:')!!}
    <div class="input-group">
        <span class="input-group-addon">
            <i class="fa fa-usd"></i>
            <i class="fa fa-usd"></i>
        </span>
        {!! Form::input('number', 'price', null, ['class'=>'form-control',
                                                  'max'=>'9999999999',
                                                  'min'=>'0',
                                                  'step'=>'0.01']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('location','Ubicación:') !!}
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-crosshairs"></i></span>
        {!! Form::text('location', null, ['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('description','Descripción:')!!}
    {!! Form::text('description', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtontext, ['class'=>'btn btn-primary form-control']) !!}
</div>