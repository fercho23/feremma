<?php namespace FerEmma\Http\Controllers;

use Illuminate\HttpResponse;
use Illuminate\Support\Facades\Request;

use FerEmma\Service;
use FerEmma\Http\Requests;
use FerEmma\Http\Requests\ServiceRequest;
use FerEmma\Http\Controllers\Controller;

class ServicesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $services = Service::all();
        return view('services.index', ['services'=>$services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ServiceRequest $request)
    {
        Service::create($request->all());
        return redirect('services');
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
        $service = Service::findOrFail($id);
        return view('services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, ServiceRequest $request)
    {
        $service = Service::findOrFail($id);
        $service->update($request->all());
        return redirect('services');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return redirect('services');
    }

}
