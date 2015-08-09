<?php namespace FerEmma\Http\Controllers;

use FerEmma\Task;
use FerEmma\Role;
use FerEmma\Http\Requests\TaskRequest;

use Auth;

//! Controlador de Tareas (Task)
class TasksController extends Controller {

    /// Lista de Tareas (Task).
    /*!
     * @return Vista con Tareas (Task)
     */
    public function index() {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    /// Empieza una Tarea (Task) específica.
    /*!
     * Realiza el proceso de empezar una Tarea que es buscada por su $id,
     * esta función se llama con el método GET.
     * @param  int $id
     * @return Response
     */
    public function start($id) {
        Task::find($id)->start();
        return view('home');
    }

    /// Termina una Tarea (Task) específica.
    /*!
     * Realiza el proceso de terminar una Tarea que es buscada por su $id,
     * esta función se llama con el método GET.
     * @param  int $id
     * @return Response
     */
    public function end($id) {
        Task::find($id)->end();
        return view('home');
    }

    /// Fomulario de nueva Tarea (Task).
    /*!
     * Muestra el formulario para ingresar una nueva Tarea,
     * esta función se llama con el método GET.
     * @return Vista con una Tarea (Task) vacía
     */
    public function create() {
        $datas = Role::where('id','!=', 1)->get();
        $roles = array();
        foreach ($datas as $data)
            $roles[$data->id] = $data->name;
        return view('tasks.create', compact($roles));
    }

    /// Fomulario de nueva Tarea (Task) para su Cargo (Role).
    /*!
     * Muestra el formulario para ingresar una nueva Tarea para su Cargo (Role),
     * esta función se llama con el método GET.
     * @return Vista con una Tarea (Task) vacía
     */
    public function createMine() {
        return view('tasks.create-mine');
    }

    /// Crea una Tarea (Task).
    /*!
     * Realiza el proceso de crear una nueva Tarea,
     * esta función se llama con el método POST.
     * @param TaskRequest $request
     * @return Vista "index" con el mensaje Flash pertinente
     */
    public function store(TaskRequest $request) {
        Task::create($request->all());
        flash()->success('La Tarea fue ingresada con exito.');
        return redirect('home');
    }

    /// Muestra una Tarea (Task) específica.
    /*!
     * Muestra específicamente una Tarea que es buscada por su $id,
     * esta función se llama con el método GET.
     * @param  int $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /// Fomulario de edición de una Tarea (Task) específica.
    /*!
     * Muestra el formulario para editar una Tarea que es buscada por su $id,
     * esta función se llama con el método GET.
     * @param  int $id
     * @return Response
     */
    public function edit($id) {
        $datas = Role::where('id','!=', 1)->get();
        $roles = array();
        foreach ($datas as $data)
            $roles[$data->id] = $data->name;
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task', 'roles'));
    }

    /// Edita una Tarea (Task) específica.
    /*!
     * Realiza el proceso de editar una Tarea que es buscada por su $id,
     * esta función se llama con el método PUT/PATH.
     * @param  int $id
     * @param  TaskRequest $request
     * @return Response
     */
    public function update($id, TaskRequest $request) {
        $task = Task::findOrFail($id);
        $task->update($request->all());
        flash()->success('La Tarea fue editada con exito.');
        return redirect('tasks');
    }

    /// Elimina una Tarea (Task) específica.
    /*!
     * Realiza el proceso de eliminar una Tarea que es buscada por su $id,
     * esta función se llama con el método DELETE.
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {
        $task = Task::findOrFail($id);
        $task->delete();
        flash()->success('La Tarea fue borrada con exito.');
        return redirect('tasks');
    }

}
