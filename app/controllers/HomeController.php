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
				return Redirect::to('/');
			}
			else
			{
				return Redirect::to('login');
			}
		}

		return Redirect::to('login')->withErrors($valid);
	}

	public function showRegister()
	{
		return View::make('home.register');
	}

	public function postRegister()
	{
		$input = Input::all();
		$rules = array('email' => 'required|unique:users|email', 'password' => 'required|confirmed');

		$valid = Validator::make($input, $rules);

		if($valid->passes())
		{
			$password = $input['password'];
			$password = Hash::make($password);

			$user = new User();
			$user->email = $input['email'];
			$user->password = $password;
			$user->admin_access = 0;

			$user->save();

			return Redirect::to('login');
		} 

		return Redirect::to('register')
			->withInput()
			->withErrors($valid);
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::to('/');
	}
}