<?php namespace FerEmma\Http\Controllers;

use FerEmma\Bed;
use FerEmma\Distribution;
use FerEmma\Room;
use FerEmma\Service;
use FerEmma\User;

use Request;

//! Controlador de Busquedas
class SearchController extends Controller {

    /// Obtiene una Distribución (Distribution) por su $id.
    /*!
     * @return Respose Json
     */
    public function getDistributionById() {
        $id = Request::input('id', '');

        $results = array();
        $query = Distribution::find($id);
        $results['price'] = $query->price();
        $results['totalPersons'] = $query->totalPersons();

        return response()->json($results);
    }

    /// Obtiene Camas (Bed) restantes.
    /*!
     * Por medio de Request obtiene los $ids de las Camas que no debe retornar,
     * los caracteres que usa para buscar la Cama por nombre
     * y devuelve las primeras 10 coincidencias.
     * @return Respose Json
     */
    public function getRemainingBedsByName() {
        $term = Request::input('term', '');
        $ids = Request::input('ids', '');
        $beds_id = ($ids ? array_map('intval', explode(',', $ids)) : []);

        $results = array();
        $queries = Bed::where('name', 'LIKE', '%'.$term.'%')
                       ->whereNotIn('id', $beds_id)
                       ->take(10)->get();
        foreach ($queries as $query)
            $results[] = ['id' => $query->id,
                          'value' => $query->name,
                          'price' => $query->price,
                          'total_persons' => $query->total_persons];
        return response()->json($results);
    }

    /// Obtiene Distribuciones (Distribution) restantes.
    /*!
     * Por medio de Request obtiene los $ids de las Distribuciones que no debe retornar,
     * los caracteres que usa para buscar la Distribución por nombre
     * y devuelve las primeras 10 coincidencias.
     * @return Respose Json
     */
    public function getRemainingDistributionsByName() {
        $term = Request::input('term', '');
        $ids = Request::input('ids', '');
        $distributions_id = ($ids ? array_map('intval', explode(',', $ids)) : []);

        $results = array();
        $queries = Distribution::where('name', 'LIKE', '%'.$term.'%')
                       ->whereNotIn('id', $distributions_id)
                       ->take(10)->get();
        foreach ($queries as $query)
            $results[] = ['id' => $query->id,
                          'value' => $query->representation()];
        return response()->json($results);
    }

    /// Obtiene Habitaciones (Room) restantes.
    /*!
     * Por medio de Request obtiene los $ids de las Habitaciones que no debe retornar,
     * los caracteres que usa para buscar la Habitación por nombre
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
                          'value' => $query->name];
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

    /// Obtiene Distribuciones (Distribution) por $id de Habitación (Room).
    /*!
     * Por medio de Request obtiene el $id de la Habitación con la cual
     * buscaa las Distribuciones que puede tener, devuelve todas las que están 
     * disponibles y en el orden correcto.
     * @return Respose Json
     */
    public function getDistributionsByRoomId() {
        $id = Request::input('id', '');

        $results = array();
        $queries = Room::find($id)->distributions();

        foreach ($queries as $query) 
            $results[] = ['id' => $query->id,
                          'value' => $query->name(),
                          'price' => $query->price(),
                          'totalPersons' => $query->totalPersons()];

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


}
