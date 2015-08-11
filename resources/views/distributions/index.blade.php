@extends('app')

    @section('content')
        <h1>Distribuciones</h1>
        @include('flash::message')

        @if (sizeof($distributions)>0)
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Cantidad de Personas</th>
                                <th>Descripción</th>
                                @if(Auth::user()->can('distributions/edit'))
                                    <th></th>
                                @endif
                                @if(Auth::user()->can('distributions/destroy'))
                                    <th></th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($distributions as $distribution)
                            <tr>
                                <td>{!! $distribution->id !!}</td>
                                <td>{!! $distribution->name !!}</td>
                                <td>{!! $distribution->price() !!}</td>
                                <td>{!! $distribution->totalPersons() !!}</td>
                                <td>{!! $distribution->description !!}</td>
                                @if(Auth::user()->can('distributions/edit'))
                                    <td>
                                        <a href="{!! URL::to('distributions/'.$distribution->id.'/edit') !!}">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    </td>
                                @endif
                                @if(Auth::user()->can('distributions/destroy'))
                                    <td>
                                        @if($distribution->canBeEliminated())
                                            {!! Form::open(['method' => 'DELETE', 'action' => ['DistributionsController@destroy', $distribution->id]]) !!}
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