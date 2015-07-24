<?php namespace FerEmma\Http\Controllers;

use Illuminate\HttpResponse;
use Request;

//use Illuminate\Support\Facades\Request;

use FerEmma\User;
use FerEmma\Reservation;
//use FerEmma\Http\Requests;
use FerEmma\Http\Requests\ReservationRequest;
use FerEmma\Http\Controllers\Controller;

class ReservationsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('reservations.index', ['reservations'=>$reservations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $datas = User::all();
        $persons = array();

        foreach ($datas as $data) {
            $persons[$data->id] = $data->name.' '.$data->surname;
        }

        return view('reservations.create', ['persons'=>$persons]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ReservationRequest $request)
    {
        Reservation::create($request->all());
        return redirect('reservations');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        $datas = User::all();
        $persons = array();

        foreach ($datas as $data) {
            $persons[$data->id] = $data->name.' '.$data->surname;
        }

        return view('reservations.edit', ['persons' => $persons, 'reservation' => $reservation]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, ReservationRequest $request)
    {
        $rooms_id = (Request::input('rooms_id') ? array_map('intval', explode(',', Request::input('rooms_id'))) : []);
        $services_id = (Request::input('services_id') ? array_map('intval', explode(',', Request::input('services_id'))) : []);
        $persons_id = (Request::input('persons_id') ? array_map('intval', explode(',', Request::input('persons_id'))) : []);

        $reservation = Reservation::findOrFail($id);
        $reservation->update($request->all());
        $reservation->rooms()->sync($rooms_id);
        $reservation->services()->sync($services_id);
        $reservation->booking()->sync($services_id);

        return redirect('reservations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();
        return redirect('reservations');
    }

}
