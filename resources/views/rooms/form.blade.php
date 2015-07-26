<div class="form-group">
    {!! Form::label('name','Nombre:') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('types_beds','Tipos de Camas:') !!}
    {!! Form::text('types_beds', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('total_beds','Total Plazas:')!!}
    {!! Form::input('number', 'total_beds', null, ['class'=>'form-control',
                                                   'max'=>'256',
                                                   'min'=>'1']) !!}
</div>
<div class="form-group">
    {!! Form::label('price','Precio:')!!}
    {!! Form::input('number', 'price', null, ['class'=>'form-control',
                                              'max'=>'9999999999',
                                              'min'=>'0',
                                              'step'=>'0.01']) !!}
</div>
<div class="form-group">
    {!! Form::label('location','Ubicación:') !!}
    {!! Form::text('location', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('plan','Plano:')!!}
    {!! Form::text('plan', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('description','Descripción:')!!}
    {!! Form::text('description', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtontext, ['class'=>'btn btn-primary form-control']) !!}
</div>