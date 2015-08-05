@extends('app')
    @section('content')
        <h1>Editar Habitación {!! $room->id !!}</h1>
        <hr/>
        {!! Form::model($room, ['method'=>'PATCH','action'=>['RoomsController@update', $room->id]]) !!}
            @include('errors.list')
            @include('rooms.partials.form', ['submitButtontext'=>'Actualizar'])
        {!! Form::close() !!}
    @stop

    @section('extra_js')
        @include('rooms.partials.form_js')
    @stop