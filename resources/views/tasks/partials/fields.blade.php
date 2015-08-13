<div class="form-group">
    {!! Form::label('name','Nombre:') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('description','Descripción:')!!}
    {!! Form::text('description', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('priority','Prioridad:')!!}
    {!! Form::input('number', 'priority', null, ['class'=>'form-control',
                                                 'max'=>'10',
                                                 'min'=>'1']) !!}
</div>
<div class="form-group">
    {!! Form::label('state','Estado:')!!}
    {!! Form::text('state', 'pendiente', ['class'=>'form-control', 'readonly'=>'true']) !!}
</div>
@include('includes.partials.form-actions', ['model'=>'tasks'])