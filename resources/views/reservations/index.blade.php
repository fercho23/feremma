@extends('app')

    @section('content')
        @if (sizeof($reservations)>0)
            <div class="row">
                <div class="col-sm-6 col-md-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Precio Total</th>
                                <th>Seña</th>
                                <th>Deuda</th>
                                <th>Fecha entrada</th>
                                <th>Fecha salida</th>
                                <th>Descripción</th>
                                @if(Auth::user()->can('reservations/edit') || Auth::user()->can('reservations/destroy'))
                                    <th style="width: 36px;"></th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($reservations as $reservation)
                            <tr>
                                <td>{!! $reservation->id !!}</td>
                                <td>{!! $reservation->total_price !!}</td>
                                <td>{!! $reservation->sign !!}</td>
                                <td>{!! $reservation->due !!}</td>
                                <td>{!! $reservation->check_in !!}</td>
                                <td>{!! $reservation->check_out !!}</td>
                                <td>{!! $reservation->description !!}</td>
                                @if(Auth::user()->can('reservations/edit'))
                                    <td>
                                        <a href="{!! URL::to('reservations/'.$reservation->id.'/edit') !!}">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                        </a>
                                    </td>
                                @endif
                                @if(Auth::user()->can('reservations/destroy'))
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'action' => ['ReservationsController@destroy', $reservation->id]]) !!}
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