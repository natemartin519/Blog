<?php

class UsersController extends BaseController {

	protected $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = $this->user->all();

        return View::make('user.users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('user.users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$valid = Validator::make($input, User::$rules);

		if ($valid->passes())
		{
			$this->user->create($input);

			return Redirect::route('user.users.index');
		}

		return Redirect::route('user.users.create')
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
        return View::make('user.users.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = $this->user->find($id);

		if (is_null($post))
		{
			return Redirect::route('user.users.index');
		}

        return View::make('user.users.edit', compact('user'));
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
		$valid = Validator::make($input, User::$rules);

		if ($valid->passes()){
			$user = $this->user->find($id);
			$user->update($input);

			return View::make('user.users.show', $id);
		}

		return Redirect::route('user.users.edit', $id)
			->withInput()
			->withErrors($valid)
			->wiht('message', 'Error: Unable to validate record');
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

		return Redirect::route('user.users.index');
	}

}
