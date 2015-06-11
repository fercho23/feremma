@extends('app')
    @section('content')
        <h1>Editar Servicio {!! $service->id !!}</h1>
        <hr/>
        {!! Form::model($service, ['method'=>'PATCH','action'=>['ServicesController@update', $service->id]]) !!}
            @include('errors.list')
            @include('services.form', ['submitButtontext'=>'Actualizar'])
        {!! Form::close() !!}
    @stop