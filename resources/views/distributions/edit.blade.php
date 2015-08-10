@extends('app')
    @section('content')
        <h1>Editar Distribución {!! $distribution->id !!}</h1>
        <hr/>
        {!! Form::model($distribution, ['method' => ''.($distribution->canBeModified() ? 'PATCH' : 'POST'),
                                        'route' => ['distributions-update'.($distribution->canBeModified() ? '' : '-without-beds'), $distribution->id]]) !!}
            @include('errors.list')
            @include('distributions.partials.form', ['submitButtontext'=>'Actualizar'])
        {!! Form::close() !!}
    @endsection

    @section('extra_js')
        @include('distributions.partials.form_js')
    @endsection