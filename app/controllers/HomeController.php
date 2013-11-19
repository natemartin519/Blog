<?php

class HomeController extends BaseController 
{

	/**
	 * Display the index(home) page.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		return Redirect::to('posts');
	}

	/**
	 * Display the login page.
	 *
	 * @return Response
	 */
	public function getLogin()
	{
		return View::make('home.login');
	}

	/**
	 * Authenticate and login user.
	 *
	 * @return Response
	 */
	public function postLogin()
	{
		$input = Input::all();
		$rules = array('email' => 'required', 'password' => 'required');

		$valid = Validator::make($input, $rules);

		if ($valid->passes()) {
			$credentials = array('email' => $input['email'], 'password' => $input['password']);

			if (Auth::attempt($credentials)) {
				return Redirect::intended('/');
			}

			return Redirect::to('login');
		}

		return Redirect::to('login')->withErrors($valid);
	}

	/**
	 * Logout the user.
	 *
	 * @return Response
	 */
	public function logout()
	{
		Auth::logout();
		return Redirect::to('/');
	}
}