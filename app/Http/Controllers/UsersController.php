<?php namespace FerEmma\Http\Controllers;

use FerEmma\User;
use FerEmma\Role;
use FerEmma\Http\Requests\UserRequest;

class UsersController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users'=>$users]);
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

        return view('users.create', ['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(UserRequest $request)
    {
        $request->password = Hash::make('secret');
        User::create($request->all());
        flash()->success('El Usuario fue ingresado con exito.');
        return redirect('users');
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
        $user = User::findOrFail($id);
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, UserRequest $request)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        flash()->success('El Usuario fue editado con exito.');
        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        flash()->success('El Usuario fue borrado con exito.');
        return redirect('users');
    }

    /**
     * Count how many users are registered.
     *
     * @param  int  $id
     * @return Response
     */
    public static function count($id)
    {
        return $user = User::all()->count();
    }

}
