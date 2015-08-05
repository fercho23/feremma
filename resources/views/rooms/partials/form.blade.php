<div class="form-group">
    {!! Form::label('name','Nombre:') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
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
    {!! Form::label('plan','Plano:')!!}
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-map-o"></i></span>
        {!! Form::text('plan', null, ['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('description','Descripción:')!!}
    {!! Form::text('description', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtontext, ['class'=>'btn btn-primary form-control']) !!}
</div>