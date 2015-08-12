@section('content')
    <h1>Reservas para hacer Check {!! $title !!}</h1>

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
                            <th>Descripción</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($reservations as $reservation)
                        <tr>
                            <td>{!! $reservation->id !!}</td>
                            <td>
                                @if (sizeof($reservation->owner)>0)
                                    {!! $reservation->owner->name !!} {!! $reservation->owner->surname !!}
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
                            <td>{!! $reservation->description !!}</td>
                            <td>
                                <button type="button" class="btn btn-link btn-modal" data-toggle="modal" data-id="{!! $reservation->id !!}" data-owner="{!! $reservation->owner->fullname() !!}" title="Check {!! $title !!} Reserva">
                                    <i class="fa fa-calendar-{!! ($type == 'in' ? 'check' : 'times') !!}-o"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="alert alert-danger">
            <p>No hay Reservas para Check {!! $title !!} en el sistema !!!.</p>
        </div>
    @endif

    @if (sizeof($reservations)>0)
        @include('reservations.partials.check-modal')
    @endif

@endsection

@if (sizeof($reservations)>0)
    @section('extra_js')
        <script type="text/javascript">
            $(document).on("click", ".btn-modal", function () {
                $id = $(this).data('id');
                $owner = $(this).data('owner');
                $('#check-modal').modal();
                $('span#title-check-modal').text($id);
                $('span#title-small-check-modal').text($owner);
                $('#check-modal form').attr('action', "{!! url() !!}"+"/reservations/" + $id + "/check_"+"{!! $type !!}");
            });
        </script>
    @endsection
@endif