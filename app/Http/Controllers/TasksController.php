<?php namespace FerEmma\Http\Controllers;

use FerEmma\Task;
use FerEmma\Role;
use FerEmma\Http\Requests\TaskRequest;

use Auth;

//! Controlador de Tareas (Task)
class TasksController extends Controller {

    /*! \brief Lista de Tareas (Task).
     *
     * @return Vista con Tareas (Task)
     */
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', ['tasks'=>$tasks]);
    }

    /**
     * Starts one task.
     *
     * @return Response
     */
    public function start($id)
    {
        Task::find($id)->start();
        return view('home');
    }

    /**
     * Ends one task.
     *
     * @return Response
     */
    public function end($id)
    {
        Task::find($id)->end();
        return view('home');
    }


    /*! \brief Fomulario de nueva Tarea (Task).
     *
     * Muestra el formulario para ingresar una nueva Tarea esta función se
     * llama con el método GET.
     *
     * @return Vista con una Tarea (Task) vacía
     */
    public function create() {
        $datas = Role::all();
        $roles = array();

        foreach ($datas as $data) {
            $roles[$data->id] = $data->name;
        }

        return view('tasks.create', ['roles'=>$roles]);
    }

    public function createMine()
    {
        return view('tasks.create-mine');
    }

    /*! \brief Crea una Tarea (Task).
     *
     * Realiza el proceso de crear una nueva Tarea,
     * esta función se llama con el método POST.
     *
     * @param TaskRequest $request
     * @return Vista "index" con el mensaje Flash pertinente
     */
    public function store(TaskRequest $request) {
        Task::create($request->all());
        flash()->success('La Tarea fue ingresada con exito.');
        return redirect('home');
    }

    /*! \brief Muestra una Tarea (Task) específica.
     *
     * Muestra específicamente una Tarea que es buscada por su $id,
     * esta función se llama con el método GET.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /*! \brief Fomulario de edición de una Tarea (Task) específica.
     *
     * Muestra el formulario para editar una Tarea que es buscada por su $id,
     * esta función se llama con el método GET.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id) {
        $datas = Role::all();
        $roles = array();
        foreach ($datas as $data) {
            $roles[$data->id] = $data->name;
        }
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task', 'roles'));
    }

    /*! \brief Edita una Tarea (Task) específica.
     *
     * Realiza el proceso de editar una Tarea que es buscada por su $id,
     * esta función se llama con el método PUT/PATH.
     *
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

    /*! \brief Elimina una Tarea (Task) específica.
     *
     * Realiza el proceso de eliminar una Tarea que es buscada por su $id,
     * esta función se llama con el método DELETE.
     *
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
