<?php

class CommentsController extends BaseController {

	private $comment;

	public function __construct(Comment $comment)
	{
		$this->comment = $comment;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$comments = $this->comment->all();

        return View::make('comment.comments.index', compact('comments'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('comment.comments.create');
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

		if ($valid = passes())
		{
			$this->comment->create($input);

			return Redirect::route('comment.comments.index');
		}

		return Request::route('comment.comments.create')
			->withInputs()
			->withErrors($valid)
			->with('message', 'Error:  Unable to validate record');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$comment = $this->comment->findOrFail($id)

        return View::make('comment.comments.show', compact('comment'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$comment $this->comment->find($id);

		if (is_null($comment))
		{
			return Redirect::route('post.posts.index');
		}

        return View::make('comment.comments.edit', compact('comment'));
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

		if ($valid->passes())
		{
			$comment = $this->comment->find($id);
			$comment->update($input);

			return View::make('comment.comments.show', $id);
		}

		return Redirect::route('comment.comments.edit', $id)
			->withInput()
			->withErrors($valid)
			->with('message', 'Error:  Unable to validate record');
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

		return Redirect::route('comment.comments.index');
	}

}
