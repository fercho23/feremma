<?php namespace FerEmma\Http\Controllers;

use Illuminate\HttpResponse;
use Illuminate\Support\Facades\Request;

use FerEmma\Reservation;
use FerEmma\Http\Requests;
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
        return view('reservations.create');
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
        return view('reservations.edit', compact('reservation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, ReservationRequest $request)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update($request->all());
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
