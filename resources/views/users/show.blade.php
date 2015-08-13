@extends('app')

    @section('content')

        <h1>Ver Usuario {!! $user->id !!}</h1>
        <hr/>

        {!! Form::label('name','Nombre:') !!}
        <div class="form-control" readonly="True">{!! $user->name !!}</div>
        </br>

        {!! Form::label('surname','Apellido:') !!}
        <div class="form-control" readonly="True">{!! $user->surname !!}</div>
        </br>

        {!! Form::label('role_id','Cargo:') !!}
        <div class="form-control" readonly="True">{!! $user->role->name !!}</div>
        </br>

        {!! Form::label('username','Nombre de Usuario:') !!}
        <div class="form-control" readonly="True">{!! $user->username !!}</div>
        </br>

        {!! Form::label('email','Email:') !!}
        <div class="form-control" readonly="True">{!! $user->email !!}</div>
        </br>

        {!! Form::label('dni','DNI:') !!}
        <div class="form-control" readonly="True">{!! $user->dni !!}</div>
        </br>

        {!! Form::label('address','Dirección:') !!}
        <div class="form-control" readonly="True">{!! $user->address !!}</div>
        </br>

        {!! Form::label('phone','Telefono:') !!}
        <div class="form-control" readonly="True">{!! $user->phone !!}</div>
        </br>

        {!! Form::label('cuil','CUIL:') !!}
        <div class="form-control" readonly="True">{!! $user->cuil !!}</div>
        </br>

        {!! Form::label('birthday','Fecha de nacimiento:') !!}
        <div class="form-control" readonly="True">{!! date("d/m/Y", strtotime($user->birthday)) !!}</div>
        </br>

        {!! Form::label('sex','Sexo:') !!}
        <div class="form-control" readonly="True">{!! ($user->sex == 'm' ? 'Masculino' : 'Femenino') !!}</div>
        </br>

        @if($user->description)
            {!! Form::label('description', 'Descripción:') !!}
            <div class="form-control" readonly="True">
                {!! $role->description !!}
            </div>
        @endif

    @endsection