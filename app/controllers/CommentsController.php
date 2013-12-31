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
			$comments = $this->comment->all();
		}
		else {
			$userID = Auth::user()->id;
			$comments = $this->comment->all($userID);
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
			$postID = Input::get('post');

    		return View::make('comments.create')
    			->with('post_id', $postID);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		if ($this->comment->fill($input)->isValid()) {
			
			$this->comment->save();			
			return Redirect::route('comments.index')
				->with('message', 'Comment successfully created.');
		}

		return Redirect::back()
			->withInput()
			->withErrors($this->comment->errors);
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
		$input = Input::all();
		$comment = $this->comment->find($id);

		if ($comment->fill($input)->isValid()){
			
			$comment->save();
			return Redirect::route('comments.index')
				->with('message', 'Comment successfully updated.');
		}

		return Redirect::back()
			->withInput()
			->withErrors($comment->errors);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$comment = $this->comment->find($id);

		if (isset($comment)) {

			$comment->delete();
			return Redirect::route('comments.index')
				->with('message', 'Comment successfully deleted.');
		}

		return Redirect::route('comments.index')
			->withError('A comment with the ID of ' . $id . ' does not exist.');
	}
}