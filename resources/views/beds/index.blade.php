@extends('app')

    @section('content')

        @include('flash::message')

        @if (sizeof($beds)>0)
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Cantidad de Personas</th>
                                <th>Precio</th>
                                <th>Descripción</th>
                                @if(Auth::user()->can('beds/destroy'))
                                    <th></th>
                                @endif
                                @if(Auth::user()->can('beds/destroy'))
                                    <th></th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($beds as $bed)
                            <tr>
                                <td>{!! $bed->id !!}</td>
                                <td>{!! $bed->name !!}</td>
                                <td>{!! $bed->total_persons !!}</td>
                                <td>{!! $bed->price !!}</td>
                                <td>{!! $bed->description !!}</td>
                                @if(Auth::user()->can('beds/edit'))
                                    <td>
                                        <a href="{!! URL::to('beds/'.$bed->id.'/edit') !!}">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    </td>
                                @endif
                                @if(Auth::user()->can('beds/destroy'))
                                    <td>
                                        @if($bed->canBeEliminated())
                                            {!! Form::open(['method' => 'DELETE', 'action' => ['BedsController@destroy', $bed->id]]) !!}
                                                <button class="btn-link" type="submit">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            {!! Form::close() !!}
                                        @endif
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="alert alert-danger">
                <p>Aún no hay elementos registrados en el sistema.</p>
            </div>
        @endif
    @endsection