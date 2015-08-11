<?php namespace FerEmma\Http\Controllers;

// use FerEmma\Permission;
use FerEmma\Role;
// use FerEmma\Http\Requests;
use FerEmma\Http\Controllers\Controller;
// use Illuminate\Http\Request;

//! Controlador de Permisos (Permissions)
class PermissionsController extends Controller {

    /// Lista de Permisos (Permissions).
    /*!
     * @return Vista con Permisos (Reservation)
     */
    public function index()
    {
        return view('permissions.index')->with('roles', Role::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
