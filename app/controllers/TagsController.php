<?php

class TagsController extends BaseController {

	protected $tag;

	public function __construct(Tag $tag)
	{
		$this->tag = $tag;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tag = $this->tag->all();

        return View::make('tag.tags.index', compact('tags'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('tag.tags.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$valid = Validator::make($input, Tag::$rules);

		if ($valid->passes())
		{
			$this->tag->create($input);

			return Redirect::route('tag.tags.index');
		}

		return Redirect::route('tag.tags.create')
			->withInput()
			->withErrors($valid)
			->with('message', 'Error: Unable to validate record');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$tag = $this->tag->findOrfail($id);		

        return View::make('tag.tags.show', compact('tag'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tag = $this->tag->find($id);

		if (is_null($tag))
		{
			return Redirect::route('tag.tags.index');
		}

        return View::make('tag.tags.edit', compact('tag'));
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
		$valid = Validator::make($input, Tag::$rules);

		if ($valid->passes())
		{
			$tag = $this->tag->find($id);
			$tag->update($input);

			return View::make('tag.tags.show', $id)
		}

		return Redirect::route('tag.tags.edit', $id)
			->withInput()
			->withErrors($valid)
			->with('message', 'Error: Unable to validate record');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->tag->find($id)->delete();

		return Redirect::route('tag.tags.index');
	}

}
