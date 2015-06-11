@extends('app')
    @section('content')
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
                                <th style="width: 36px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($services as $service)
                            <tr>
                                <td>{!! $service->id !!}</td>
                                <td>{!! $service->name !!}</td>
                                <td>{!! $service->price !!}</td>
                                <td>{!! $service->description !!}</td>
                                <td>
                                    <a href="{!! URL::to('services/'.$service->id.'/edit') !!}">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </a>
                                </td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE', 'action' => ['ServicesController@destroy', $service->id]]) !!}
                                        <button class="btn-link" type="submit">
                                            <i class="glyphicon glyphicon-trash"></i>
                                        </button>
                                    {!! Form::close() !!}
                                </td>
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