@extends('app')

    @section('content')

        @if(Auth::user()->canAnyActionsByModel('beds', ['edit', 'show']))
            @include('includes.partials.search', ['id'=> 'bed',
                                                  'placeholder' => 'Ingresar Nombre de una Cama . . .'])
        @endif

        <h1>Camas</h1>
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
                                @if(Auth::user()->canAnyActionsByModel('beds', ['edit', 'show']))
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
                                @if(Auth::user()->canAnyActionsByModel('beds', ['edit', 'show']))
                                    <td>
                                        @if(Auth::user()->can('beds/edit'))
                                            <a href="{!! URL::route('beds-edit', $bed->id) !!}">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        @else
                                            @if(Auth::user()->can('beds/show'))
                                                <a href="{!! URL::route('beds-show', $bed->id) !!}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            @endif
                                        @endif
                                    </td>
                                @endif
                                @if(Auth::user()->can('beds/destroy'))
                                    <td>
                                        @if($bed->canBeEliminated())
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['beds-destroy', $bed->id]]) !!}
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
                    {!! str_replace('/?', '?', $beds->render()) !!}
                </div>
            </div>
        @else
            <div class="alert alert-danger">
                <p>Aún no hay elementos registrados en el sistema.</p>
            </div>
        @endif
    @endsection

    @if(Auth::user()->canAnyActionsByModel('beds', ['edit', 'show']))
        @section('extra_js')
            @include('beds.partials.search-js')
        @endsection
    @endif