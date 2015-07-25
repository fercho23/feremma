<?php namespace FerEmma\Http\Controllers;

use Illuminate\HttpResponse;
use Illuminate\Support\Facades\Request;

use FerEmma\Task;
use FerEmma\Role;
use FerEmma\Http\Requests;
use FerEmma\Http\Requests\TaskRequest;
use FerEmma\Http\Controllers\Controller;
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
        //return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(TaskRequest $request)
    {
        Task::create($request->all());
        return redirect('tasks');
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
        return redirect('tasks');
    }

    /**
     * Shows my tasks.
     *
     * @param  int  $id
     * @return Response
     */
    public function mine()
    {
        $tasks = Auth::user()->role->tasks;
        return view('tasks.mine')->with('tasks',$tasks);
    }
}
