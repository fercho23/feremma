<?php namespace FerEmma\Http\Controllers;

use FerEmma\User;
use FerEmma\Role;
use FerEmma\Http\Requests\UserRequest;

//! Controlador de Usuarios (User)
class UsersController extends Controller {

    ///  Lista de Usuarios (User).
    /*!
     * @return Vista con Usuarios (User)
     */
    public function index() {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    ///  Ver perfil de usuario.
    /*!
     * @return Datos del usuario autenticado. 
     */
    public function profile() {
        return view('users.profile');
    }

    /// Fomulario de nuevo Usuario (User).
    /*!
     * Muestra el formulario para ingresar un nuevo Usuario esta función se
     * llama con el método GET.
     * @return Vista con un Usuario (User) vacío
     */
    public function create() {
        $datas = Role::all();
        $roles = array();

        foreach ($datas as $data) {
            $roles[$data->id] = $data->name;
        }

        return view('users.create', compact('roles'));
    }

    /// Crea un Usuario (User).
    /*!
     * Realiza el proceso de crear un nuevo Cargo,
     * esta función se llama con el método POST.
     * @param UserRequest $request
     * @return Vista "index" con el mensaje Flash pertinente
     */
    public function store(UserRequest $request) {
        User::create($request->all());
        flash()->success('El Usuario fue ingresado con exito.');
        return redirect('users');
    }

    /// Muestra un Usuario (User) específico.
    /*!
     * Muestra específicamente un Usuario que es buscado por su $id,
     * esta función se llama con el método GET.
     * @param  int $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /// Fomulario de edición de un Usuario (User) específico.
    /*!
     * Muestra el formulario para editar un Usuario que es buscado por su $id,
     * esta función se llama con el método GET.
     * @param  int $id
     * @return Response
     */
    public function edit($id) {
        $datas = Role::all();
        $roles = array();
        foreach ($datas as $data) {
            $roles[$data->id] = $data->name;
        }
        $user = User::findOrFail($id);
        return view('users.edit', compact('user', 'roles'));
    }

    /// Edita un Usuario (User) específico.
    /*!
     * Realiza el proceso de editar un Usuario que es buscado por su $id,
     * esta función se llama con el método PUT/PATH.
     * @param  int $id
     * @param  UserRequest $request
     * @return Response
     */
    public function update($id, UserRequest $request) {
        $user = User::findOrFail($id);
        $user->update($request->all());
        flash()->success('El Usuario fue editado con exito.');
        return redirect('users');
    }

    /// Elimina un Usuario (User) específico.
    /*!
     * Realiza el proceso de eliminar un Usuario que es buscado por su $id,
     * esta función se llama con el método DELETE.
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('users');
    }
}
