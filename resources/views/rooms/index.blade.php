@extends('app')
    @section('content')

        @include('includes.partials.search', ['id'=> 'room',
                                              'placeholder' => 'Ingresar Nombre de una Habitación . . .'])

        <h1>Habitaciones</h1>
        @include('flash::message')

        @if (sizeof($rooms)>0)
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Precio Base</th>
                                <th>Distribuciones</th>
                                <th>Ubicación</th>
                                <th>Habilitada</th>
                                <th>Descripción</th>
                                @if(Auth::user()->can('rooms/edit'))
                                    <th></th>
                                @endif
                                @if(Auth::user()->can('rooms/destroy'))
                                    <th></th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($rooms as $room)
                            <tr>
                                <td>{!! $room->id !!}</td>
                                <td>{!! $room->name !!}</td>
                                <td>{!! $room->price !!}</td>
                                <td>
                                    @foreach($room->getMyAvailableDistributions() as $distribution)
                                        {!! $distribution->name !!} - {!! $distribution->totalPersons() !!} <br>
                                    @endforeach
                                </td>
                                <td>{!! $room->location !!}</td>
                                <td>{!! ($room->available ? 'Si' : 'No') !!}</td>
                                <td>{!! $room->description !!}</td>
                                @if(Auth::user()->can('rooms/edit'))
                                    <td>
                                        <a href="{!! URL::to('rooms/'.$room->id.'/edit') !!}">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    </td>
                                @endif
                                @if(Auth::user()->can('rooms/destroy'))
                                    <td>
                                        @if($room->canBeEliminated())
                                            {!! Form::open(['method' => 'DELETE', 'action' => ['RoomsController@destroy', $room->id]]) !!}
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

    @section('extra_js')
        @include('rooms.partials.search-js')
    @endsection