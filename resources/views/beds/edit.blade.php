@extends('app')

    @section('content')
        <h1>Editar Cama {!! $bed->id !!}</h1>
        <hr/>
        {!! Form::model($bed, ['method' => ''.($bed->canBeModified() ? 'PATCH' : 'POST'),
                                        'route' => ['beds-update'.($bed->canBeModified() ? '' : '-basic'), $bed->id]]) !!}
            @include('errors.list')
            @include('beds.partials.form', ['submitButtontext'=>'Actualizar'])
        {!! Form::close() !!}
    @endsection