<?php

class PostsController extends BaseController 
{

	protected $post;

	public function __construct(Post $post) 
	{
		$this->beforeFilter('admin', array('only' => array('create', 'store', 'edit', 'update', 'destroy')));		
		$this->post = $post;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = $this->post->all();
        return View::make('posts.index', compact('posts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('posts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$valid = Validator::make($input, Post::$rules);

		if ($valid->passes()) {
			$this->post->create($input);
			return Redirect::route('posts.index');
		}

		return Redirect::route('posts.create')
			->withInput()
			->withErrors($valid);
			//->with('message', 'Error: Unable to validate record');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = $this->post->find($id);

		if (is_null($post)) {
			return Redirect::route('posts.index');
		}

		$user = Post::find($post->id)->user;
		$comments = Post::find($post->id)->comments;
		$tags = Post::find($post->id)->tags;

        return View::make('posts.show')
        	->with('post', $post)
        	->with('user', $user)
        	->with('comments', $comments)
        	->with('tags', $tags);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = $this->post->find($id);

		if (is_null($post)) {
			return Redirect::route('posts.index');
		}

        return View::make('posts.edit', compact('post'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$valid = Validator::make($input, Post::$rules);

		if ($valid->passes()) {
			$post = $this->post->find($id);
			$post->update($input);

			return Redirect::route('posts.index');
		}

		return Redirect::route('posts.edit', $id)
			->withInput()
			->withErrors($valid);
			//->with('message', 'Error: Unable to validate record');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->post->find($id)->delete();
		return Redirect::route('posts.index');
	}
}