@extends('app')
    @section('content')
        <h1>Editar Distribución {!! $distribution->id !!}</h1>
        <hr/>
        {!! Form::model($distribution, ['method'=>'PATCH','action'=>['DistributionsController@update', $distribution->id]]) !!}
            @include('errors.list')
            @include('distributions.partials.form', ['submitButtontext'=>'Actualizar'])
        {!! Form::close() !!}
    @stop

    @section('extra_js')
        @include('distributions.partials.form_js')
    @stop