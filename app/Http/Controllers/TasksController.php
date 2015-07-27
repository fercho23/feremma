<?php namespace FerEmma\Http\Controllers;

use FerEmma\Task;
use FerEmma\Role;
use FerEmma\Http\Requests\TaskRequest;

use Auth;

class TasksController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
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

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $datas = Role::all();
        $roles = array();

        foreach ($datas as $data) {
            $roles[$data->id] = $data->name;
        }

        return view('tasks.create', ['roles'=>$roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function createMine()
    {
        return view('tasks.create-mine');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(TaskRequest $request)
    {
        Task::create($request->all());
        flash()->success('La Tarea fue ingresada con exito.');
        return redirect('home');
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
        $datas = Role::all();
        $roles = array();
        foreach ($datas as $data) {
            $roles[$data->id] = $data->name;
        }
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, TaskRequest $request)
    {
        $task = Task::findOrFail($id);
        $task->update($request->all());
        flash()->success('La Tarea fue editada con exito.');
        return redirect('tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        flash()->success('La Tarea fue borrada con exito.');
        return redirect('tasks');
    }

}
