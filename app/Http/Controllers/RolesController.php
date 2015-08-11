<?php namespace FerEmma\Http\Controllers;

use FerEmma\Role;
use FerEmma\Http\Requests\BasicRequest;

//! Controlador de Cargos (Role)
class RolesController extends Controller {

    /// Lista de Cargos (Role).
    /*!
     * @return Vista con Cargos (Role)
     */
    public function index() {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    /// Fomulario de nuevo Cargo (Role).
    /*!
     * Muestra el formulario para ingresar un nuevo Cargo,
     * esta función se llama con el método GET.
     * @return Vista con un Cargo (Role) vacío
     */
    public function create() {
        return view('roles.create');
    }

    /// Crea un Cargo (Role).
    /*!
     * Realiza el proceso de crear un nuevo Cargo,
     * esta función se llama con el método POST.
     * @param BasicRequest $request
     * @return Vista "index" con el mensaje Flash pertinente
     */
    public function store(BasicRequest $request) {
        Role::create($request->all());
        flash()->success('El Cargo fue ingresado con exito.');
        return redirect('roles');
    }

    /// Muestra un Cargo (Role) específico.
    /*!
     * Muestra específicamente un Cargo que es buscado por su $id,
     * esta función se llama con el método GET.
     * @param  int $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /// Fomulario de edición de un Cargo (Role) específico.
    /*!
     * Muestra el formulario para editar un Cargo que es buscado por su $id,
     * esta función se llama con el método GET.
     * @param  int $id
     * @return Response
     */
    public function edit($id) {
        $role = Role::findOrFail($id);
        return view('roles.edit', compact('role'));
    }

    /// Edita un Cargo (Role) específico.
    /*!
     * Realiza el proceso de editar un Cargo que es buscado por su $id,
     * esta función se llama con el método PUT/PATH.
     * @param  int $id
     * @param  BasicRequest $request
     * @return Response
     */
    public function update($id, BasicRequest $request) {
        $role = Role::findOrFail($id);
        $role->update($request->all());
        flash()->success('El Cargo fue editado con exito.');
        return redirect('roles');
    }

    /// Elimina un Cargo (Role) específico.
    /*!
     * Realiza el proceso de eliminar un Cargo que es buscado por su $id,
     * esta función se llama con el método DELETE.
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect('roles');
    }

}
