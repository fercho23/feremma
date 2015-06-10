<?php namespace FerEmma\Http\Controllers;

use FerEmma\Post;
use FerEmma\Http\Requests;
use FerEmma\Http\Requests\PostRequest;
use Illuminate\HttpResponse;
use Illuminate\Support\Facades\Request;
use FerEmma\Http\Controllers\Controller;


class PostsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::all();
		return view('posts.index',['posts'=>$posts]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('posts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(PostRequest $request)
	{
		Post::create($request->all());
		return redirect('posts');
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
		$post=Post::findOrFail($id);
		return view('posts.edit',compact('post'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, PostRequest $request)
	{
		$post = Post::findOrFail($id);
		$post->update($request->all());
		return redirect('posts');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$post = Post::findOrFail($id);
		$post->delete();
		return redirect('posts');
	}

}
