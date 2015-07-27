<?php namespace FerEmma\Http\Controllers;

use FerEmma\User;
use FerEmma\Reservation;
use FerEmma\Http\Requests\ReservationRequest;

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
        $reservation = new Reservation;
        return view('reservations.create', ['reservation'=>$reservation]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ReservationRequest $request)
    {
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
        return view('reservations.edit', ['reservation' => $reservation]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, ReservationRequest $request)
    {
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->rooms()->detach();
        $reservation->services()->detach();
        $reservation->booking()->detach();
        $reservation->delete();
        flash()->success('La Reserva fue borrada con exito.');
        return redirect('reservations');
    }

}
