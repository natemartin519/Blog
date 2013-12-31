<?php

class UsersController extends BaseController 
{
	protected $user;

	public function __construct(User $user)
	{
		$this->beforeFilter('auth', array('except' => array('create', 'store')));
		$this->beforeFilter('admin', array('except' => array('show', 'edit', 'store', 'create', 'index')));
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

        return View::make('users.index')
        	->with('users', $users);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// Only admin users or guests are don't allow to creat of a new user.
		if (Auth::guest() || Auth::user()->isAdmin()) {
        	return View::make('users.create');
        }

        return Redirect::route('posts.index')
        	->withErrors('Please logout current user to create a new user.');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		if($this->user->isValid($input)) {
			$this->user->create($input);

			$RedirectRoute = Auth::check() ? 'users.index' : 'login';
			return Redirect::route($RedirectRoute);
		} 

		return Redirect::back()
			->withInput(Input::except('password','password_confirmation'))
			->withErrors($this->user->errors);
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

		if (isset($user)) {
	        return View::make('users.show')
	        	->with('user', $user);			
		}

		$redirectRoute = Auth::user()->isAdmin() ? 'users.index' : 'posts.index';
		return Redirect::route($redirectRoute)
			->withErrors('A user with the ID of ' . $id . ' does not exist.');
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

		if (isset($user)) {

			if ((Auth::user()->id == $id) || Auth::user()->isAdmin()) {
				return View::make('users.edit')
					->with('user', $user);		
			}

			$errors = 'You are not authorised to edit user ' . $id . '.';
		} 
		else {
			$errors = 'A user with the ID of ' . $id . ' does not exist.';
		}

	    return Redirect::route('posts.index')
	    	->withErrors($errors);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//TODO: Refactor
		$user = $this->user->find($id);

		if (is_null($user)) {
			return Redirect::route('users.index');
		}

		$input = array_except(Input::all(), '_method');

		$rules = array(
			'email' => 'required|unique:users,email,' . $id . '|email',
			'username' => 'required|unique:users,username,' . $id,
			'access_level' => 'required|in:0,1,2'
		);

		$valid = Validator::make($input, $rules);

		if ($valid->passes()) {			
			$user->update($input);

			return Redirect::route('users.index');
		}

		return Redirect::back()
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

		if (isset($user)) {
			$user->delete();

			return Redirect::route('users.index')
				->with('message', 'User successfully deleted.');
		}

		return Redirect::route('users.index')
			->withError('A user with the ID of ' . $id . ' does not exist.');
	}
}