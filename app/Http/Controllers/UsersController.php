<?php namespace FerEmma\Http\Controllers;

use Illuminate\HttpResponse;
use Illuminate\Support\Facades\Request;

use FerEmma\User;
use FerEmma\Post;
use FerEmma\Http\Requests;
use FerEmma\Http\Requests\UserRequest;
use FerEmma\Http\Controllers\Controller;

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
        $datas = Post::all();
        $posts = array();

        foreach ($datas as $data) {
            $posts[$data->id] = $data->name;
        }

        return view('users.create', ['posts'=>$posts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(UserRequest $request)
    {
        User::create($request->all());
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
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
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
        return redirect('users');
    }

}
