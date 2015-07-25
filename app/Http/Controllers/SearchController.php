<?php namespace FerEmma\Http\Controllers;

use FerEmma\User;
use FerEmma\Room;
use FerEmma\Service;

use Request;

class SearchController extends Controller {

    public function getUserByName() {
        $term = Request::input('term', '');
        $results = array();
        $queries = User::where('name', 'LIKE', '%'.$term.'%')
                       ->orwhere('surname', 'LIKE', '%'.$term.'%')
                       ->orwhere('dni', 'LIKE', '%'.$term.'%')
                       ->take(10)->get();
        foreach ($queries as $query)
            $results[] = ['id' => $query->id,
                          'value' => $query->fullname().' ['.$query->dni.']'];
        return response()->json($results);
    }

    public function getRemainingUsersByName() {
        $term = Request::input('term', '');
        $users_id = Request::input('users_id', '');
        $users_id = ($users_id ? array_map('intval', explode(',', $users_id)) : []);

        $results = array();
        $queries = User::where('name', 'LIKE', '%'.$term.'%')
                       ->orwhere('surname', 'LIKE', '%'.$term.'%')
                       ->orwhere('dni', 'LIKE', '%'.$term.'%')
                       ->whereNotIn('id', $users_id)
                       ->take(10)->get();
        foreach ($queries as $query)
            $results[] = ['id' => $query->id,
                          'value' => $query->fullname().' ['.$query->dni.']'];
        return response()->json($results);
    }

    public function getRemainingRoomsByName() {
        $term = Request::input('term', '');
        $rooms_id = Request::input('rooms_id', '');
        $rooms_id = ($rooms_id ? array_map('intval', explode(',', $rooms_id)) : []);

        $results = array();
        $queries = Room::where('name', 'LIKE', '%'.$term.'%')
                       ->whereNotIn('id', $rooms_id)
                       ->take(10)->get();
        foreach ($queries as $query)
            $results[] = ['id' => $query->id,
                          'value' => $query->name.' ['.$query->total_beds.']'];
        return response()->json($results);
    }

    public function getRemainingServicesByName() {
        $term = Request::input('term', '');
        $services_id = Request::input('services_id', '');
        $services_id = ($services_id ? array_map('intval', explode(',', $services_id)) : []);

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
