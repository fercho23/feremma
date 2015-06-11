@extends('app')
    @section('content')
        @if (sizeof($rooms)>0)
            <div class="row">
                <div class="col-sm-6 col-md-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Tipos de Camas</th>
                                <th>Total Plazas</th>
                                <th>Ubicación</th>
                                <th>Plano</th>
                                <th style="width: 36px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($rooms as $room)
                            <tr>
                                <td>{!! $room->id !!}</td>
                                <td>{!! $room->name !!}</td>
                                <td>{!! $room->description !!}</td>
                                <td>{!! $room->types_beds !!}</td>
                                <td>{!! $room->total_beds !!}</td>
                                <td>{!! $room->location !!}</td>
                                <td>{!! $room->plan !!}</td>
                                <td>
                                    <a href="{!! URL::to('rooms/'.$room->id.'/edit') !!}">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </a>
                                </td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE', 'action' => ['RoomsController@destroy', $room->id]]) !!}
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