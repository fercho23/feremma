<?php namespace FerEmma\Http\Controllers;

use FerEmma\Role;
use FerEmma\Http\Requests\RoleRequest;

class RolesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', ['roles'=>$roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(RoleRequest $request)
    {
        Role::create($request->all());
        flash()->success('El Cargo fue ingresado con exito.');
        return redirect('roles');
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
        $role = Role::findOrFail($id);
        flash()->success('El Cargo fue editado con exito.');
        return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, RoleRequest $request)
    {
        $role = Role::findOrFail($id);
        $role->update($request->all());
        return redirect('roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        //$role->permissions()->detach();
        flash()->success('El Cargo fue borrado con exito.');
        return redirect('roles');
    }

}
