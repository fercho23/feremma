<?php namespace FerEmma\Http\Controllers;

use FerEmma\User;
use FerEmma\Role;
use FerEmma\Http\Requests\UserRequest;

//! Controlador de Clientes (User)
class ClientsController extends Controller {

    ///  Lista de Clientes (User).
    /*!
     * @return Vista con Clientes (User)
     */
    public function index() {
        $users = User::where('role_id', '6')->paginate(15);
        $is_client = True;
        return view('users.index', compact('users', 'is_client'));
    }

    /// Fomulario de nuevo Cliente (User).
    /*!
     * Muestra el formulario para ingresar un nuevo Cliente esta función se
     * llama con el método GET.
     * @return Vista con un Cliente (User) vacío
     */
    public function create() {
        $is_client = True;
        // $datas = Role::all();
        // $roles = array();

        // foreach ($datas as $data) {
        //     $roles[$data->id] = $data->name;
        // }

        return view('users.create', compact('is_client'));
    }

    /// Crea un Cliente (User).
    /*!
     * Realiza el proceso de crear un nuevo Cargo,
     * esta función se llama con el método POST.
     * @param UserRequest $request
     * @return Vista "index" con el mensaje Flash pertinente
     */
    public function store(UserRequest $request) {
        User::create($request->except('username', 'password'));
        flash()->success('El Cliente fue ingresado con exito.');
        return redirect('clients');
    }

    /// Muestra un Cliente (User) específico.
    /*!
     * Muestra específicamente un Cliente que es buscado por su $id,
     * esta función se llama con el método GET.
     * @param  int $id
     * @return Response
     */
    public function show($id) {
        $is_client = True;
        if($user = User::find($id))
            return view('users.show', compact('user', 'is_client'));
        flash()->error('Error!!! El Cliente que intenta ver no existe.');
        return redirect('clients');
    }

    /// Fomulario de edición de un Cliente (User) específico.
    /*!
     * Muestra el formulario para editar un Cliente que es buscado por su $id,
     * esta función se llama con el método GET.
     * @param  int $id
     * @return Response
     */
    public function edit($id) {
        $is_client = True;
        if($user = User::find($id))
            return view('users.edit', compact('user', 'is_client'));
        flash()->error('Error!!! El Cliente que intenta ver no existe.');
        return redirect('clients');
    }

    /// Edita un Cliente (User) específico.
    /*!
     * Realiza el proceso de editar un Cliente que es buscado por su $id,
     * esta función se llama con el método PUT/PATH.
     * @param  int $id
     * @param  UserRequest $request
     * @return Response
     */
    public function update($id, UserRequest $request) {
        $is_client = True;
        $user = User::findOrFail($id);
        $user->update($request->except('username', 'password'));
        flash()->success('El Cliente fue editado con exito.');
        return redirect('clients');
    }

    /// Elimina un Cliente (User) específico.
    /*!
     * Realiza el proceso de eliminar un Cliente que es buscado por su $id,
     * esta función se llama con el método DELETE.
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('clients');
    }
}
