<?php namespace FerEmma\Http\Controllers;

use FerEmma\Room;
use FerEmma\Http\Requests\RoomRequest;

//! Controlador de Habitaciones (Room)
class RoomsController extends Controller {

    /// Lista de Habitaciones (Room).
    /*!
     * @return Vista con Habitaciones (Room)
     */
    public function index() {
        $rooms = Room::all();
        return view('rooms.index', ['rooms'=>$rooms]);
    }

    /// Fomulario de nueva Habitación (Reservation).
    /*!
     * Muestra el formulario para ingresar una nueva Habitación,
     * esta función se llama con el método GET.
     * @return Vista con una Reserva (Reservation) vacía
     */
    public function create() {
        return view('rooms.create');
    }

    /// Crea una Habitación (Room).
    /*!
     * Realiza el proceso de crear una nueva Habitación,
     * esta función se llama con el método POST.
     * @param RoomRequest $request
     * @return Vista "index" con el mensaje Flash pertinente
     */
    public function store(RoomRequest $request) {
        Room::create($request->all());
        flash()->success('La Habitación fue ingresada con exito.');
        return redirect('rooms');
    }

    /// Muestra una Habitación (Room) específica.
    /*!
     * Muestra específicamente una Habitación que es buscada por su $id,
     * esta función se llama con el método GET.
     * @param  int $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /// Fomulario de edición de una Habitación (Room) específica.
    /*!
     * Muestra el formulario para editar una Habitación que es buscada por su $id,
     * esta función se llama con el método GET.
     * @param  int $id
     * @return Response
     */
    public function edit($id) {
        $room = Room::findOrFail($id);
        return view('rooms.edit', compact('room'));
    }

    /// Edita una Habitación (Room) específica.
    /*!
     * Realiza el proceso de editar una Habitación que es buscada por su $id,
     * esta función se llama con el método PUT/PATH.
     * @param  int $id
     * @param  RoomRequest $request
     * @return Response
     */
    public function update($id, RoomRequest $request) {
        $room = Room::findOrFail($id);
        $room->update($request->all());
        flash()->success('La Habitación fue editada con exito.');
        return redirect('rooms');
    }

    /// Elimina una Habitación (Room) específica.
    /*!
     * Realiza el proceso de eliminar una Habitación que es buscada por su $id,
     * esta función se llama con el método DELETE.
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {
        $room = Room::findOrFail($id);
        $room->delete();
        flash()->success('La Habitación fue borrada con exito.');
        return redirect('rooms');
    }

}
