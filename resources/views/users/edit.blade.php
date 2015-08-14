@extends('app')

    @section('content')
        <h1>Editar {!! (isset($is_client) ? 'Cliente' : 'Usuario') !!} {!! $user->id !!}</h1>
        <hr/>
        {!! Form::model($user, ['method'=>'PATCH',
                                'route' => [(isset($is_client) ? 'clients' : 'users').'-update', $user->id]]) !!}
            @include('errors.list')
            @include('users.partials.form', ['submitButtontext'=>'Actualizar'])
        {!! Form::close() !!}
    @endsection