@extends('app')
    @section('content')

        @if(Auth::user()->canAnyActionsByModel('services', ['edit', 'show']))
            @include('includes.partials.search', ['id'=> 'service',
                                                  'placeholder' => 'Ingresar Nombre de un Servicio . . .'])
        @endif

        <h1>
            Servicios
            <small>( {!! $services->total() !!} en total)</small>
        </h1>
        @include('flash::message')

        @if (sizeof($services)>0)
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Descripción</th>
                                @if(Auth::user()->canAnyActionsByModel('services', ['edit', 'show']))
                                    <th></th>
                                @endif
                                @if(Auth::user()->can('services/destroy'))
                                    <th></th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($services as $service)
                            <tr>
                                <td>{!! $service->id !!}</td>
                                <td>{!! $service->name !!}</td>
                                <td>{!! $service->price !!}</td>
                                <td>{!! $service->description !!}</td>
                                @if(Auth::user()->canAnyActionsByModel('services', ['edit', 'show']))
                                    <td>
                                        @if(Auth::user()->can('services/edit'))
                                            <a href="{!! URL::route('services-edit', $service->id) !!}">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        @else
                                            @if(Auth::user()->can('services/show'))
                                                <a href="{!! URL::route('services-show', $service->id) !!}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            @endif
                                        @endif
                                    </td>
                                @endif
                                @if(Auth::user()->can('services/destroy'))
                                    <td>
                                        @if($service->canBeEliminated())
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['services-destroy', $service->id]]) !!}
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
                    {!! str_replace('/?', '?', $services->render()) !!}
                </div>
            </div>
        @else
            <div class="alert alert-danger">
                <p>Aún no hay elementos registrados en el sistema.</p>
            </div>
        @endif
    @endsection

    @if(Auth::user()->canAnyActionsByModel('services', ['edit', 'show']))
        @section('extra_js')
            @include('services.partials.search-js')
        @endsection
    @endif