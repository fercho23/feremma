<?php namespace FerEmma\Http\Controllers;

use FerEmma\Role;
use FerEmma\Http\Requests\RoleRequest;

//! Controlador de Cargos (Role)
class RolesController extends Controller {

    /*! \brief Lista de Cargos (Role).
     *
     * @return Vista con Cargos (Role)
     */
    public function index() {
        $roles = Role::all();
        return view('roles.index', ['roles'=>$roles]);
    }

    /*! \brief Fomulario de nuevo Cargo (Role).
     *
     * Muestra el formulario para ingresar un nuevo Cargo,
     * esta función se llama con el método GET.
     *
     * @return Vista con un Cargo (Role) vacío
     */
    public function create() {
        return view('roles.create');
    }

    /*! \brief Crea un Cargo (Role).
     *
     * Realiza el proceso de crear un nuevo Cargo,
     * esta función se llama con el método POST.
     *
     * @param RoleRequest $request
     * @return Vista "index" con el mensaje Flash pertinente
     */
    public function store(RoleRequest $request) {
        Role::create($request->all());
        flash()->success('El Cargo fue ingresado con exito.');
        return redirect('roles');
    }

    /*! \brief Muestra un Cargo (Role) específico.
     *
     * Muestra específicamente un Cargo que es buscado por su $id,
     * esta función se llama con el método GET.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /*! \brief Fomulario de edición de un Cargo (Role) específico.
     *
     * Muestra el formulario para editar un Cargo que es buscado por su $id,
     * esta función se llama con el método GET.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id) {
        $role = Role::findOrFail($id);
        return view('roles.edit', compact('role'));
    }

    /*! \brief Edita un Cargo (Role) específico.
     *
     * Realiza el proceso de editar un Cargo que es buscado por su $id,
     * esta función se llama con el método PUT/PATH.
     *
     * @param  int $id
     * @param  RoleRequest $request
     * @return Response
     */
    public function update($id, RoleRequest $request) {
        $role = Role::findOrFail($id);
        $role->update($request->all());
        flash()->success('El Cargo fue editado con exito.');
        return redirect('roles');
    }

    /*! \brief Elimina un Cargo (Role) específico.
     *
     * Realiza el proceso de eliminar un Cargo que es buscado por su $id,
     * esta función se llama con el método DELETE.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {
        $role = Role::findOrFail($id);
        $role->delete();
        //$role->permissions()->detach();
        flash()->success('El Cargo fue borrado con exito.');
        return redirect('roles');
    }

}
