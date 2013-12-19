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
        return View::make('posts.index')
        	->with('posts', $posts);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// Convert tags from an array of objects to an array key/value pairs
		$rawTags = Tag::all();
		$formattedTags = array();

		foreach ($rawTags as $rawTag) {
			$formattedTags[$rawTag->id] = $rawTag->name;
		}

        return View::make('posts.create')
        	->with('tags', $formattedTags);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = array_except(Input::all(), 'tags');		
		$valid = Validator::make($input, Post::$rules);

		if ($valid->passes()) {		
			// First create the post in the database
			$post = new Post();
			$post->user_id = $input['user_id'];
			$post->header = $input['header'];
			$post->body = $input['body'];
			$post->status = $input['status'];
			$post->save();

			// Then update the post_tag pivet table	now tha		
			if (Input::has('tags')) {
				$tags = Input::get('tags');
				$post->tags()->sync($tags);
				$post->save();
			}

			return Redirect::route('posts.index');
		}

		return Redirect::route('posts.create')
			->withInput()
			->withErrors($valid);
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

        return View::make('posts.show')
        	->with('post', $post);
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
		

		// Convert tags from an array of objects to an array key/value pairs
		$rawTags = Tag::all();
		$formattedTags = array();

		foreach ($rawTags as $rawTag) {
			$formattedTags[$rawTag->id] = $rawTag->name;
		}


        return View::make('posts.edit')
        	->with('post', $post)
        	->with('tags', $formattedTags);
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), array('_method', 'tags'));
		$valid = Validator::make($input, Post::$rules);

		if ($valid->passes()) {
			$post = $this->post->find($id);
			$post->update($input);

			if (Input::has('tags')) {
				$tags = Input::get('tags');
				$post->tags()->sync($tags);
				$post->save();
			}

			return Redirect::route('posts.index');
		}

		return Redirect::route('posts.edit', $id)
			->withInput()
			->withErrors($valid);
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