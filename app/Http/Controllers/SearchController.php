<?php namespace FerEmma\Http\Controllers;

use FerEmma\User;
use FerEmma\Room;
use FerEmma\Service;

use Request;

//! Controlador de Busquedas
class SearchController extends Controller {

    /// Obtiene Habitaciones (Room).
    /*!
     * Por medio de Request obtiene las $ids de las Habitaciones que posteriormente busca.
     * @return Respose Json
     */
    public function getRoomPriceByIds() {
        $ids = Request::input('ids', '');
        $ids = ($ids ? array_map('intval', explode(',', $ids)) : []);
        $results = array();
        $queries = Room::whereIn('id', $ids)->get();
        foreach ($queries as $query)
            $results[] = ['value' => $query->price];
        return response()->json($results);
    }

    /// Obtiene Usuarios (User).
    /*!
     * Por medio de Request obtiene los caracteres que usa para buscar al Usuario
     * por el nombre, apellido o dni y devuelve las primeras 10 coincidencias.
     * @return Respose Json
     */
    public function getUserByName() {
        $term = Request::input('term', '');
        $results = array();
        $queries = User::where(function($query) use ($term){
                            $query->where('name', 'LIKE', '%'.$term.'%');
                            $query->orWhere('surname', 'LIKE', '%'.$term.'%');
                            $query->orWhere('dni', 'LIKE', '%'.$term.'%');
                        })
                       ->take(10)->get();
        foreach ($queries as $query)
            $results[] = ['id' => $query->id,
                          'value' => $query->fullname().' ['.$query->dni.']'];
        return response()->json($results);
    }

    /// Obtiene Usuarios (User) restantes.
    /*!
     * Por medio de Request obtiene los $ids de los Usuarios que no debe retornar,
     * los caracteres que usa para buscar el Usuario por nombre, apellido o dni
     * y devuelve las primeras 10 coincidencias.
     * @return Respose Json
     */
    public function getRemainingUsersByName() {
        $term = Request::input('term', '');
        $ids = Request::input('ids', '');
        $users_id = ($ids ? array_map('intval', explode(',', $ids)) : []);

        $results = array();
        $queries = User::whereNotIn('id', $users_id)
                        ->where(function($query) use ($term){
                            $query->where('name', 'LIKE', '%'.$term.'%');
                            $query->orWhere('surname', 'LIKE', '%'.$term.'%');
                            $query->orWhere('dni', 'LIKE', '%'.$term.'%');
                        })
                       ->take(10)->get();

        foreach ($queries as $query)
            $results[] = ['id' => $query->id,
                          'value' => $query->fullname().' ['.$query->dni.']'];
        return response()->json($results);
    }

    /// Obtiene Habitaciones (Room) restantes.
    /*!
     * Por medio de Request obtiene los $ids de las Habitaciones que no debe retornar,
     * los caracteres que usa para buscar el Habitación por nombre
     * y devuelve las primeras 10 coincidencias.
     * @return Respose Json
     */
    public function getRemainingRoomsByName() {
        $term = Request::input('term', '');
        $ids = Request::input('ids', '');
        $rooms_id = ($ids ? array_map('intval', explode(',', $ids)) : []);

        $results = array();
        $queries = Room::where('name', 'LIKE', '%'.$term.'%')
                       ->whereNotIn('id', $rooms_id)
                       ->take(10)->get();
        foreach ($queries as $query)
            $results[] = ['id' => $query->id,
                          'value' => $query->name.' ['.$query->total_beds.']'];
        return response()->json($results);
    }

    /// Obtiene Servicios (Service) restantes.
    /*!
     * Por medio de Request obtiene los $ids de los Servicios que no debe retornar,
     * los caracteres que usa para buscar el Servicio por nombre
     * y devuelve las primeras 10 coincidencias.
     * @return Respose Json
     */
    public function getRemainingServicesByName() {
        $term = Request::input('term', '');
        $ids = Request::input('ids', '');
        $services_id = ($ids ? array_map('intval', explode(',', $ids)) : []);

        $results = array();
        $queries = Service::where('name', 'LIKE', '%'.$term.'%')
                          ->whereNotIn('id', $services_id)
                          ->take(10)->get();
        foreach ($queries as $query)
            $results[] = ['id' => $query->id,
                          'value' => $query->name,
                          'price' => $query->price];
        return response()->json($results);
    }


}
