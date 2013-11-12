<?php

class UsersController extends BaseController {

	protected $user;

	public function __construct(User $user)
	{
		$this->beforeFilter('admin', array('except' => array('create', 'store')));		
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

        return View::make('users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('users.create');
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

		if($valid->passes())
		{
			$password = $input['password'];
			$password = Hash::make($password);

			$user = new User();
			$user->email = $input['email'];
			$user->username = $input['username'];
			$user->password = $password;
			$user->access_level = 0;

			$user->save();

			return Redirect::to('login');
		} 

		return Redirect::to('register')
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
		$user = $this->user->find($id);

		if (is_null($user))
		{
			return Redirect::route('users.index');
		}

        return View::make('users.show', compact('user'));
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

		if (is_null($user))
		{
			return Redirect::route('users.index');
		}

        return View::make('users.edit', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = $this->user->find($id);

		if (is_null($user))
		{
			return Redirect::route('users.index');
		}

		$input = array_except(Input::all(), '_method');

		$rules = array(
			'email' => 'required|unique:users,email,' . $id . '|email',
			'username' => 'required|unique:users,username,' . $id,
			'access_level' => 'required|in:0,1,2'
		);

		$valid = Validator::make($input, $rules);

		if ($valid->passes()){			
			$user->update($input);
			return Redirect::route('users.index');
		}

		return Redirect::route('users.edit', $id)
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
		$user = $this->user->find($id);

		if (is_null($user))
		{
			return Redirect::route('users.index');
		}

		$user->delete();

		return Redirect::route('users.index');
	}
}
