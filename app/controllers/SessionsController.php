<?php

class SessionsController extends BaseController {

	/**
	 * Show login page.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}

	/**
	 * Authenticate and login user.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$credentials = array('email' => $input['email'], 'password' => $input['password']);		
		$attempt = Auth::attempt($credentials);	

		if ($attempt) {
			return Redirect::intended('/');
		}

		return Redirect::to('login');
	}


	/**
	 * Logout user
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();
		return Redirect::to('/');
	}

}