@extends('app')
    @section('content')

        @include('flash::message')

        @if (sizeof($services)>0)
            <div class="row">
                <div class="col-sm-6 col-md-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Descripción</th>
                                @if(Auth::user()->can('services/edit'))
                                    <th style="width: 36px;"></th>
                                @endif
                                @if(Auth::user()->can('services/destroy'))
                                    <th style="width: 36px;"></th>
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
                                @if(Auth::user()->can('services/edit'))
                                <td>
                                    <a href="{!! URL::to('services/'.$service->id.'/edit') !!}">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                </td>
                                @endif
                                @if(Auth::user()->can('services/destroy'))
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'action' => ['ServicesController@destroy', $service->id]]) !!}
                                            <button class="btn-link" type="submit">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        {!! Form::close() !!}
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