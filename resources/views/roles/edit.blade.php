@extends('app')
    @section('content')
        <h1>Editar Cargo {!! $role->id !!}</h1>
        <hr/>
        {!! Form::model($role, ['method'=>'PATCH','action'=>['RolesController@update', $role->id]]) !!}
            @include('errors.list')
            @include('roles.partials.form', ['submitButtontext'=>'Actualizar'])
        {!! Form::close() !!}
    @stop