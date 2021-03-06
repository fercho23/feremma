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
        $rooms = Room::paginate(15);
        return view('rooms.index', compact('rooms'));
    }

    /// Fomulario de nueva Habitación (Reservation).
    /*!
     * Muestra el formulario para ingresar una nueva Habitación,
     * esta función se llama con el método GET.
     * @return Vista con una Reserva (Reservation) vacía
     */
    public function create() {
        $room=new Room;
        return view('rooms.create',compact('room'));
    }

    /// Crea una Habitación (Room).
    /*!
     * Realiza el proceso de crear una nueva Habitación,
     * esta función se llama con el método POST.
     * @param RoomRequest $request
     * @return Vista "index" con el mensaje Flash pertinente
     */
    public function store(RoomRequest $request) {
        $room = Room::create($request->all());

        $distributions_id = ($request->input('distributions_id') ? array_map('intval', explode(',', $request->input('distributions_id'))) : []);

        $distributions = [];
        foreach($distributions_id as $index => $id) {
            $distribution = [];
            $distribution["available"] = ($request->input('distribution-checkbox-'.$id) ? True : False);
            $distribution["order"] = $index + 1;
            $distributions[$id] = $distribution;
        }
        $room->distributions()->sync($distributions);

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
        if($room = Room::find($id))
            return view('rooms.show', compact('room'));
        flash()->error('Error!!! La Habitación que intenta ver no existe.');
        return redirect('rooms');
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
        $distributions_id = ($request->input('distributions_id') ? array_map('intval', explode(',', $request->input('distributions_id'))) : []);

        $room = Room::findOrFail($id);
        $room->update($request->all());

        $distributions = [];
        foreach($distributions_id as $index => $id) {
            $distribution = [];
            $distribution["available"] = ($request->input('distribution-checkbox-'.$id) ? True : False);
            $distribution["order"] = $index + 1;
            $distributions[$id] = $distribution;
        }
        $room->distributions()->sync($distributions);

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
        return redirect('rooms');
    }

    /// Cambia el estado de una Habitación (Room) específica.
    /*!
     * Realiza el proceso de cambiar el estado de una Habitación que es buscada por su $id,
     * @param  int $id
     * @return Response
     */
    public function toggle($id) {
        $room = Room::findOrFail($id);
        $room->toggle();
        return redirect('home');
    }

}
