<div class="form-group">
    {!! Form::label('name','Nombre:') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('total_persons','Total Personas:')!!}
    <div class="input-group">
        <span class="input-group-addon">
            <i class="fa fa-male"></i>
            <i class="fa fa-female"></i>
        </span>
        @if($bed->canBeModified())
            {!! Form::input('number', 'total_persons', null, ['class'=>'form-control',
                                                              'max'=>'10',
                                                              'min'=>'1']) !!}
        @else
            <div class="form-control" readonly="True">
                {!! $bed->total_persons !!}
            </div>
        @endif

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
    {!! Form::label('description','Descripción:')!!}
    {!! Form::text('description', null, ['class'=>'form-control']) !!}
</div>

@include('includes.partials.form-actions', ['model'=>'beds'])

