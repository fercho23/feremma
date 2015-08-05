@extends('app')
    @section('content')
        <h1>Editar Cama {!! $bed->id !!}</h1>
        <hr/>
        {!! Form::model($bed, ['method'=>'PATCH','action'=>['BedsController@update', $bed->id]]) !!}
            @include('errors.list')
            @include('beds.partials.form', ['submitButtontext'=>'Actualizar'])
        {!! Form::close() !!}
    @stop