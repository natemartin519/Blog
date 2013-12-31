<?php

class TagsController extends BaseController 
{

	protected $tag;

	public function __construct(Tag $tag)
	{
		$this->beforeFilter('admin');
		$this->tag = $tag;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tags = $this->tag->all();

        return View::make('tags.index')
        	->with('tags', $tags);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('tags.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		if ($this->tag->fill($input)->isValid()) {
			
			$this->tag->save();
			return Redirect::route('tags.index')
				->with('message', 'New tag successfully created.');
		}

		return Redirect::back()
			->withInput()
			->withErrors($this->tag->errors);
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

		if (isset($tag)) {
			return View::make('tags.edit')
        		->with('tag', $tag);
		}

		return Redirect::route('tags.index')
			->withErrors('A tag with the ID of ' . $id . ' does not exist.');        
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
		$tag = $this->tag->find($id);
// error chatch
		if ($tag->fill($input)->isValid()) {

			$tag->save();
			return Redirect::route('tags.index')
				->with('message', 'Tag successfully updated.');
		}

		return Redirect::back()
			->withInput()
			->withErrors($tag->errors);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$tag = $this->tag->find($id);
		
		if (isset($tag)) {
			
			$tag->delete();
			return Redirect::route('tags.index')
				->with('message', 'Tag successfully deleted.');
		}

		return Redirect::route('tags.index')
			->withError('A tag with the ID of ' . $id . ' does not exist.');
	}
}