@extends('app')
    @section('content')
        <h1>Nueva Distribución</h1>
        <hr/>
        {!! Form::open(['url'=>'distributions']) !!}
            @include('errors.list')
            @include('distributions.partials.form', ['submitButtontext'=>'Guardar'])
        {!! Form::close() !!}
        <a href="{!! URL('home') !!}" class="btn btn-warning form-control" type="submit" value="Cancelar">Cancelar</a>
    @stop

    @section('extra_js')
        @include('distributions.partials.form_js')
    @stop