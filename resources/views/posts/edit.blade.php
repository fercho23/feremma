@extends('app')
    @section('content')
        <h1>Editar Cargo {!! $post->id !!}</h1>
        <hr/>
        {!! Form::model($post, ['method'=>'PATCH','action'=>['PostsController@update', $post->id]]) !!}
            @include('errors.list')
            @include('posts.form', ['submitButtontext'=>'Actualizar'])
        {!! Form::close() !!}
    @stop