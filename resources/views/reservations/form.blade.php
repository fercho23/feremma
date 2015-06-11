<div class="form-group">
    {!! Form::label('description','Descripción:')!!}
    {!! Form::text('description', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('total_price','Precio Total:')!!}
    {!! Form::input('number', 'total_price', null, ['class'=>'form-control',
                                                    'max'=>'9999999999',
                                                    'min'=>'0',
                                                    'step'=>'0.01']) !!}
</div>
<div class="form-group">
    {!! Form::label('sign','Seña:')!!}
    {!! Form::input('number', 'sign', null, ['class'=>'form-control',
                                             'max'=>'9999999999',
                                             'min'=>'0',
                                             'step'=>'0.01']) !!}
</div>
<div class="form-group">
    {!! Form::label('due','Deuda:')!!}
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
    {!! Form::submit($submitButtontext, ['class'=>'btn btn-primary form-control']) !!}
</div>