<?php

class HomeController extends BaseController {

	public function showIndex()
	{
		return Redirect::to('posts');
	}

	public function showLogin()
	{
		return View::make('home.login');
	}

	public function postLogin()
	{
		$input = Input::all();
		$rules = array('email' => 'required', 'password' => 'required');

		$valid = Validator::make($input, $rules);

		if ($valid->passes())
		{
			$credentials = array('email' => $input['email'], 'password' => $input['password']);

			if (Auth::attempt($credentials))
			{
				return Redirect::intended('/');
			}
			else
			{
				return Redirect::to('login');
			}
		}

		return Redirect::to('login')->withErrors($valid);
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::to('/');
	}
}