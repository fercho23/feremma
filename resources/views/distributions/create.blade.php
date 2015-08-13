@extends('app')
    @section('content')
        <h1>Nueva Distribución</h1>
        <hr/>
        {!! Form::open(['url'=>'distributions']) !!}
            @include('errors.list')
            @include('distributions.partials.form', ['submitButtontext'=>'Guardar'])
        {!! Form::close() !!}
    @endsection

    @section('extra_js')
        @include('distributions.partials.form_js')
    @endsection