@extends('app')
    @section('content')
        <h1>Editar Usuario {!! $user->id !!}</h1>
        <hr/>
        {!! Form::model($user, ['method'=>'PATCH','action'=>['UsersController@update', $user->id]]) !!}
            @include('errors.list')
            @include('users.form', ['submitButtontext'=>'Actualizar'])
        {!! Form::close() !!}
    @stop