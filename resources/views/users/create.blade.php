@extends('app')

    @section('content')
        <h1>Nuevo {!! (isset($is_client) ? 'Cliente' : 'Usuario') !!}</h1>
        <hr/>
        {!! Form::open(['url'=>''.(isset($is_client) ? 'clients' : 'users')]) !!}
            @include('errors.list')
            @include('users.partials.form', ['submitButtontext'=>'Guardar'])
        {!! Form::close() !!}
    @endsection
