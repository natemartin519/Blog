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
			$comments = User::find(Auth::user()->id)->comments;
		}       

        return View::make('comments.index', compact('comments'));
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
		$valid = Validator::make($input, Comment::$rules);

		if ($valid->passes()) {
			$this->comment->create($input);
			return Redirect::route('comments.index');
		}

		return Redirect::route('comments.create')
			->withInput()
			->withErrors($valid);
			//->with('message', 'Error:  Unable to validate record');
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

		if (is_null($comment)) {
			return Redirect::route('comments.index');
		}

        return View::make('comments.show', compact('comment'));
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

		if (is_null($comment)) {
			return Redirect::route('comments.index');
		}

        return View::make('comments.edit', compact('comment'));
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
			//->with('message', 'Error:  Unable to validate record');
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