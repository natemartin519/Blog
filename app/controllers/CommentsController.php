<?php

class CommentsController extends BaseController 
{

	private $comment;

	public function __construct(Comment $comment)
	{
		$this->beforeFilter('auth');
		$this->beforeFilter('admin', array('only' => array('edit', 'update', 'destroy')));
		$this->comment = $comment;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Auth::user()->isAdmin()) {
			$comments = $this->comment->with('user', 'post')->get();
		}
		else {
			$userID = Auth::user()->id;
			$comments = $this->comment->where("user_id", $userID )->with('user', 'post')->get();
		}

        return View::make('comments.index')
        	->with('comments', $comments);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if (Input::has('post')) {
			$postID = Input::get('post');
			$post = Post::find($postID);

			if (is_null($post)) {
				return Redirect::route('posts.index');
			}

        	return View::make('comments.create')
        		->with('post_id', $postID);
        }

        return Redirect::route('comments.index'); 
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$rules = Comment::$rules;
		$valid = Validator::make($input, $rules);

		if ($valid->passes()) {
			$this->comment->create($input);
			return Redirect::route('comments.index');
		}

		return Redirect::route('comments.create')
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
		$comment = $this->comment->find($id);

		if (isset($comment)) {
	        return View::make('comments.show')
    	    	->with('comment', $comment);
		}
		
		return Redirect::route('comments.index')
			->withErrors('A comment with the ID of ' . $id . ' does not exist.');       	
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$comment = $this->comment->find($id);

		if (isset($comment)) {
        	return View::make('comments.edit')
        		->with('comment', $comment);
		}

		return Redirect::route('comments.index')
			->withErrors('A comment with the ID of ' . $id . ' does not exist.');
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
		$valid = Validator::make($input, Comment::$rules);

		if ($valid->passes()){
			$comment = $this->comment->find($id);
			$comment->update($input);

			return Redirect::route('comments.index');
		}

		return Redirect::route('comments.edit', $id)
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
		$this->comment->find($id)->delete();
		return Redirect::route('comments.index');
	}
}