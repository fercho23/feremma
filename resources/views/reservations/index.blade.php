@extends('app')

    @section('content')
        <h1>Reservas</h1>
        @include('flash::message')

        @if (sizeof($reservations)>0)
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Titular</th>
                                <th>Cantidad de Personas</th>
                                <th>Precio Total</th>
                                <th>Seña</th>
                                <th>Deuda</th>
                                <th>Fecha entrada</th>
                                <th>Fecha salida</th>
                                <th>Estado</th>
                                <th>Descripción</th>
                                @if(Auth::user()->can('reservations/edit'))
                                    <th></th>
                                    <th></th>
                                @endif
                                @if(Auth::user()->can('reservations/destroy'))
                                    <th></th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($reservations as $reservation)
                            <tr>
                                <td>{!! $reservation->id !!}</td>
                                <td>
                                    @if (sizeof($reservation->owner)>0)
                                        {!! $reservation->owner->fullname() !!}
                                    @endif
                                </td>
                                <td>
                                    {!! $reservation->totalPersons() !!} de {!! $reservation->totalPosiblePersons() !!}
                                </td>
                                <td>{!! $reservation->total_price !!}</td>
                                <td>{!! $reservation->sign !!}</td>
                                <td>{!! $reservation->due !!}</td>
                                <td>{!! date("d/m/Y", strtotime($reservation->check_in)) !!}</td>
                                <td>{!! date("d/m/Y", strtotime($reservation->check_out)) !!}</td>
                                <td>{!! $reservation->state() !!}</td>
                                <td>{!! $reservation->description !!}</td>
                                @if(Auth::user()->can('reservations/edit'))
                                    <td>
                                        @if(!$reservation->canBeModified())
                                            <button type="button" class="btn btn-link btn-modal" data-toggle="modal" data-id="{!! $reservation->id !!}" data-due="{!! $reservation->due !!}" title="Reducir Deuda de la Reserva">
                                                <i class="fa fa-money"></i>
                                            </button>
                                        @endif
                                    </td>
                                    <td>
                                        @if($reservation->canBeModified())
                                            <a href="{!! URL::route('reservations-edit', $reservation->id) !!}" title="Editar Reserva">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        @else
                                            <a href="{!! URL::route('reservations-show', $reservation->id) !!}" title="Ver Reserva">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        @endif
                                    </td>
                                @endif
                                @if(Auth::user()->can('reservations/destroy'))
                                    <td>
                                        @if($reservation->canBeEliminated())
                                            {!! Form::open(['method' => 'DELETE', 'action' => ['ReservationsController@destroy', $reservation->id]]) !!}
                                                <button class="btn-link" type="submit" title="Borrar Reserva">
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
        @include('reservations.partials.modal')
    @endsection

    @section('extra_js')
        <script type="text/javascript">
            $(document).on("click", ".btn-modal", function () {
                $id = $(this).data('id');
                $due = $(this).data('due');
                $('#reservation-modal').modal();
                $('span#title-reservation-modal').text($id);
                $('span#title-small-reservation-modal').text($due);
                $('#reservation-modal form').attr('action', "{!! url() !!}"+"/reservations/" + $id + "/reduce_debt");
                $('input#number').attr('max', $due);
            });
        </script>
    @endsection