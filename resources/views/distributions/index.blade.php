@extends('app')

    @section('content')

        @if(Auth::user()->canAnyActionsByModel('distributions', ['edit', 'show']))
            @include('includes.partials.search', ['id'=> 'distribution',
                                                  'placeholder' => 'Ingresar Nombre de una Distribución . . .'])
        @endif

        <h1>
            Distribuciones
            <small>( {!! $distributions->total() !!} en total)</small>
        </h1>
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
                                @if(Auth::user()->canAnyActionsByModel('distributions', ['edit', 'show']))
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
                                @if(Auth::user()->canAnyActionsByModel('distributions', ['edit', 'show']))
                                    <td>
                                        @if(Auth::user()->can('distributions/edit'))
                                            <a href="{!! URL::route('distributions-edit', $distribution->id) !!}">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        @else
                                            @if(Auth::user()->can('distributions/show'))
                                                <a href="{!! URL::route('distributions-show', $distribution->id) !!}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            @endif
                                        @endif
                                    </td>
                                @endif
                                @if(Auth::user()->can('distributions/destroy'))
                                    <td>
                                        @if($distribution->canBeEliminated())
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['distributions-destroy', $distribution->id]]) !!}
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
                    {!! str_replace('/?', '?', $distributions->render()) !!}
                </div>
            </div>
        @else
            <div class="alert alert-danger">
                <p>No hay Distribuciones en el sistema.</p>
            </div>
        @endif
    @endsection

    @if(Auth::user()->canAnyActionsByModel('distributions', ['edit', 'show']))
        @section('extra_js')
            @include('distributions.partials.search-js')
        @endsection
    @endif