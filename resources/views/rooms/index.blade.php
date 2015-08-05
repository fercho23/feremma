@extends('app')
    @section('content')

        @include('flash::message')

        @if (sizeof($rooms)>0)
            <div class="row">
                <div class="col-sm-6 col-md-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Ubicación</th>
                                <th>Plano</th>
                                <th>Descripción</th>
                                @if(Auth::user()->can('rooms/edit') || Auth::user()->can('rooms/destroy'))
                                    <th style="width: 36px;"></th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($rooms as $room)
                            <tr>
                                <td>{!! $room->id !!}</td>
                                <td>{!! $room->name !!}</td>
                                <td>{!! $room->price !!}</td>
                                <td>{!! $room->location !!}</td>
                                <td>{!! $room->plan !!}</td>
                                <td>{!! $room->description !!}</td>
                                @if(Auth::user()->can('rooms/edit'))
                                    <td>
                                        <a href="{!! URL::to('rooms/'.$room->id.'/edit') !!}">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                        </a>
                                    </td>
                                @endif
                                @if(Auth::user()->can('rooms/destroy'))
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'action' => ['RoomsController@destroy', $room->id]]) !!}
                                            <button class="btn-link" type="submit">
                                                <i class="glyphicon glyphicon-trash"></i>
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