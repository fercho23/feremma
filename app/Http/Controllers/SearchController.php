<?php namespace FerEmma\Http\Controllers;

use FerEmma\User;
use FerEmma\Http\Controllers\Controller;

use Request;

class SearchController extends Controller {

    public function getUserByName() {
        $term = Request::input('term', '');
        $results = array();
        $queries = User::where('name', 'LIKE', '%'.$term.'%')->take(10)->get();
        foreach ($queries as $query)
            $results[] = ['id' => $query->id,
                          'value' => $query->name.' '.$query->surname];
        return response()->json($results);
    }

    public function getRemainingUsersByName() {
        $term = Request::input('term', '');
        $users_id = Request::input('users_id', '');
        $users_id = ($users_id ? array_map('intval', explode(',', $users_id)) : []);

        $results = array();
        $queries = User::where('name', 'LIKE', '%'.$term.'%')
                       ->whereNotIn('id', $users_id)
                       ->take(10)->get();
        foreach ($queries as $query)
            $results[] = ['id' => $query->id,
                          'value' => $query->name.' '.$query->surname];
        return response()->json($results);
    }


}
