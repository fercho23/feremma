<div class="form-group">
    {!! Form::label('name','Nombre:') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('description','Descripción:')!!}
    {!! Form::text('description', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('role_id','Cargo:') !!}
    {!! Form::select('role_id', $roles, null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('priority','Prioridad:')!!}
    {!! Form::input('number', 'priority', null, ['class'=>'form-control',
                                                   'max'=>'10',
                                                   'min'=>'1']) !!}
</div>
<div class="form-group">
    {!! Form::label('state','Estado:')!!}
    {!! Form::text('state', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit($submitButtontext, ['class'=>'btn btn-primary form-control']) !!}
</div>