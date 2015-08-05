<?php namespace FerEmma\Http\Controllers;

use FerEmma\User;
use FerEmma\Reservation;
use FerEmma\Http\Requests\ReservationRequest;

//! Controlador de Reservas (Reservation)
class ReservationsController extends Controller {

    /// Lista de Reservas (Reservation).
    /*!
     * @return Vista con Reservas (Reservation)
     */
    public function index() {
        $reservations = Reservation::all();
        return view('reservations.index', compact('reservations'));
    }

    /// Fomulario de nueva Reserva (Reservation).
    /*!
     * Muestra el formulario para ingresar una nueva Reserva,
     * esta función se llama con el método GET.
     * @return Vista con una Reserva (Reservation) vacía
     */
    public function create() {
        $reservation = new Reservation;
        return view('reservations.create', compact('reservation'));
    }

    /// Crea una Reserva (Reservation).
    /*!
     * Realiza el proceso de crear una nueva Reserva,
     * esta función se llama con el método POST.
     * @param ReservationRequest $request
     * @return Vista "index" con el mensaje Flash pertinente
     */
    public function store(ReservationRequest $request) {
        $reservation = Reservation::create($request->all());

        $rooms_id = ($request->input('rooms_id') ? array_map('intval', explode(',', $request->input('rooms_id'))) : []);
        $services_id = ($request->input('services_id') ? array_map('intval', explode(',', $request->input('services_id'))) : []);
        $persons_id = ($request->input('persons_id') ? array_map('intval', explode(',', $request->input('persons_id'))) : []);

        $reservation->update($request->all());

        $services = [];
        foreach($services_id as $id) {
            $service = [];
            $service["name"] = $request->input('service-name-'.$id);
            $service["quantity"] = $request->input('service-quantity-'.$id);
            $service["price"] = $request->input('service-price-'.$id);
            $services[$id] = $service;
        }

        $reservation->rooms()->sync($rooms_id);
        $reservation->services()->sync($services);
        $reservation->booking()->sync($persons_id);

        flash()->success('La Reserva fue ingresada con exito.');

        return redirect('reservations');
    }

    /// Muestra una Reserva (Reservation) específica.
    /*!
     * Muestra específicamente una Reserva que es buscada por su $id,
     * esta función se llama con el método GET.
     * @param  int $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /// Fomulario de edición de una Reserva (Reservation) específica.
    /*!
     * Muestra el formulario para editar una Reserva que es buscada por su $id,
     * esta función se llama con el método GET.
     * @param  int $id
     * @return Response
     */
    public function edit($id) {
        $reservation = Reservation::findOrFail($id);
        return view('reservations.edit', compact('reservation'));
    }

    /// Edita una Reserva (Reservation) específica.
    /*!
     * Realiza el proceso de editar una Reserva que es buscada por su $id,
     * esta función se llama con el método PUT/PATH.
     * @param  int $id
     * @param  ReservationRequest $request
     * @return Response
     */
    public function update($id, ReservationRequest $request) {
        $rooms_id = ($request->input('rooms_id') ? array_map('intval', explode(',', $request->input('rooms_id'))) : []);
        $services_id = ($request->input('services_id') ? array_map('intval', explode(',', $request->input('services_id'))) : []);
        $persons_id = ($request->input('persons_id') ? array_map('intval', explode(',', $request->input('persons_id'))) : []);

        $reservation = Reservation::findOrFail($id);
        $reservation->update($request->all());

        $services = [];
        foreach($services_id as $id) {
            $service = [];
            $service["name"] = $request->input('service-name-'.$id);
            $service["quantity"] = $request->input('service-quantity-'.$id);
            $service["price"] = $request->input('service-price-'.$id);
            $services[$id] = $service;
        }

        $reservation->rooms()->sync($rooms_id);
        $reservation->services()->sync($services);
        $reservation->booking()->sync($persons_id);

        flash()->success('La Reserva fue editada con exito.');

        return redirect('reservations');
    }

    ///  Elimina una Reserva (Reservation) específica.
    /*!
     * Realiza el proceso de eliminar una Reserva que es buscada por su $id,
     * esta función se llama con el método DELETE.
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {
        $reservation = Reservation::findOrFail($id);
        $reservation->rooms()->detach();
        $reservation->services()->detach();
        $reservation->booking()->detach();
        $reservation->delete();
        flash()->success('La Reserva fue borrada con exito.');
        return redirect('reservations');
    }

}
