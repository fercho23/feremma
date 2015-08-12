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

    /// Lista de Reservas (Reservation) para realizar el Check In.
    /*!
     * @return Vista con Reservas (Reservation)
     */
    public function indexCheckIn() {
        $reservations = Reservation::getReservationsForCheckIn();
        return view('reservations.index-check-in', compact('reservations'));
    }

    /// Lista de Reservas (Reservation) para realizar el Check Out.
    /*!
     * @return Vista con Reservas (Reservation)
     */
    public function indexCheckOut() {
        $reservations = Reservation::getReservationsForCheckOut();
        return view('reservations.index-check-out', compact('reservations'));
    }

    /// Realiza el Check In de una Reserva (Reservation).
    /*!
     * Verifica si esta Reserva puede realizar el Check In y en caso de que si lo hace.
     * @return Vista de Reservas (Reservation)
     */
    public function checkIn($id) {
        if($reservation = Reservation::find($id)) {
            if($reservation->checkIn())
                flash()->success('El Check In de la Reserva fue un exito.');
            else
                flash()->error('Error inesperado!!! Al intentar hacer Check In de la Reserva.');
        } else
            flash()->error('Error!!! La Reserva que intenta hacer Check In no existe.');
        return redirect('reservations');
    }

    /// Realiza el Check Out de una Reserva (Reservation).
    /*!
     * Verifica si esta Reserva puede realizar el Check Out y en caso de que si lo hace.
     * @return Vista de Reservas (Reservation)
     */
    public function checkOut($id) {
        if($reservation = Reservation::find($id)) {
            if($reservation->checkOut())
                flash()->success('El Check Out de la Reserva fue un exito.');
            else
                flash()->error('Error inesperado!!! Al intentar hacer Check Out de la Reserva.');
        } else
            flash()->error('Error!!! La Reserva que intenta hacer Check Out no existe.');
        return redirect('reservations');
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
        if($reservation = Reservation::create($request->all())) {

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

            $rooms = [];
            foreach($rooms_id as $id) {
                $room = [];
                $room["reservation_id"] = $reservation->id;
                $room["distribution_id"] = $request->input('room-'.$id.'-distributions');
                $room["price"] = $request->input('room-final_price-'.$id);
                $rooms[$id] = $room;
            }

            $reservation->rooms()->sync($rooms);
            $reservation->services()->sync($services);
            $reservation->booking()->sync($persons_id);

            flash()->success('La Reserva fue ingresada con exito.');
        } else
            flash()->error('Error!!! Al intetar ingresar la Reserva.');

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
        if(!$reservation = Reservation::find($id)) {
            flash()->error('Error!!! La Reserva que intenta ver no existe.');
            return redirect('reservations');
        }
        return view('reservations.show', compact('reservation'));
    }

    /// Fomulario de edición de una Reserva (Reservation) específica.
    /*!
     * Muestra el formulario para editar una Reserva que es buscada por su $id,
     * esta función se llama con el método GET.
     * @param  int $id
     * @return Response
     */
    public function edit($id) {
        $reservation = Reservation::find($id);
        if($reservation) {
            if($reservation->canBeModified())
                return view('reservations.edit', compact('reservation'));
            return view('reservations.show', compact('reservation'));
        } else
            flash()->error('Error!!! La Reserva que intenta editar no existe.');

        return redirect('reservations');
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

        if($reservation = Reservation::find($id)) {
            if($reservation->canBeModified()) {
                if($reservation->update($request->all())) {

                    $rooms_id = ($request->input('rooms_id') ? array_map('intval', explode(',', $request->input('rooms_id'))) : []);
                    $services_id = ($request->input('services_id') ? array_map('intval', explode(',', $request->input('services_id'))) : []);
                    $persons_id = ($request->input('persons_id') ? array_map('intval', explode(',', $request->input('persons_id'))) : []);

                    $services = [];
                    foreach($services_id as $id) {
                        $service = [];
                        $service["name"] = $request->input('service-name-'.$id);
                        $service["quantity"] = $request->input('service-quantity-'.$id);
                        $service["price"] = $request->input('service-price-'.$id);
                        $services[$id] = $service;
                    }

                    $rooms = [];
                    foreach($rooms_id as $id) {
                        $room = [];
                        $room["reservation_id"] = $reservation->id;
                        $room["distribution_id"] = $request->input('room-'.$id.'-distributions');
                        $room["price"] = $request->input('room-final_price-'.$id);
                        $rooms[$id] = $room;
                    }

                    $reservation->rooms()->sync($rooms);
                    $reservation->services()->sync($services);
                    $reservation->booking()->sync($persons_id);

                    flash()->success('La Reserva fue editada con exito.');

                } else
                    flash()->error('Error!!! Al intetar editar la Reserva.');
            } else
                flash()->error('La Reserva que intenta ya posee fecha real de entrada ingresada.');
        } else
            flash()->error('Error!!! La Reserva que intenta editar no existe.');

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

    ///  Reduce la deuda de una Reserva (Reservation) específica.
    /*!
     * Realiza el proceso de reducir una deuda de una Reserva que es buscada por su $id,
     * esta función se llama con el método POST.
     * @param  int $id
     * @return Response
     */
    public function reduceDebt($id) {
        if($reservation = Reservation::find($id)) {

            $request = \Request::all();
            $validator = \Validator::make($request, [
                'number' => 'required|between:0,9999999999.99'
            ]);
            if ($validator->fails())
                flash()->error('Error!!! En el ingreso de los datos al intentar reducir la deuda de la Reserva.');
            else {
                $reservation->due -= $request['number'];
                if($reservation->update())
                    flash()->success('La deuda de la Reserva fue reducida con exito.');
                else
                    flash()->error('Error inesperado!!! Al intentar reducir la deuda de la Reserva.');
            }
        } else
            flash()->error('Error!!! La Reserva que intenta reducir su deuda no existe.');
        return redirect('reservations');
    }

}
