@extends('app')

    @section('content')
        <h1>Nueva Cama</h1>
        <hr/>
        {!! Form::open(['url'=>'beds']) !!}
            @include('errors.list')
            @include('beds.partials.form', ['submitButtontext'=>'Guardar'])
        {!! Form::close() !!}
    @endsection