<div class="form-group">
    {!! Form::label('name','Nombre:') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('surname','Apellido:') !!}
    {!! Form::text('surname', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('role_id','Cargo:') !!}
    {!! Form::select('role_id', $roles, null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('username','Nombre de Usuario:') !!}
    {!! Form::text('username', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('password','Contraseña:') !!}
    {!! Form::text('password', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('email','Email:') !!}
    {!! Form::text('email', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('dni','DNI:') !!}
    {!! Form::text('dni', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('address','Dirección:') !!}
    {!! Form::text('address', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('phone','Telefono:') !!}
    {!! Form::text('phone', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('cuil','CUIL:') !!}
    {!! Form::text('cuil', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('birthday','Fecha de nacimiento:') !!}
    {!! Form::input('date','birthday', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('sex','Sexo:') !!}
    {!! Form::text('sex', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtontext, ['class'=>'btn btn-primary form-control']) !!}
</div>