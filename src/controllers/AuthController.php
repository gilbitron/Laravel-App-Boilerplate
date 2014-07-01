<?php namespace Gilbitron\LaravelAppBoilerplate;

class AuthController extends \Controller {

	public function login()
	{
		return \View::make('laravel-app-boilerplate::auth.login')->with(array('page_title' => 'Login'));
	}

	public function processLogin()
	{
		$data = array(
			'email' => \Input::get('email'),
			'password' => \Input::get('password')
		);

		$validator = \Validator::make($data, array(
			'email' => 'required|email',
			'password' => 'required'
		));
	    if($validator->fails()){
			\Input::flashOnly('email');
			return \Redirect::to('login')->withErrors($validator);
		}

		if(\Auth::attempt($data)){
			return \Redirect::to(\Config::get('laravel-app-boilerplate::redirect_after_login', '/'));
		} else {
			\Input::flashOnly('email');
			return \Redirect::to('login')->withError('Invalid email address or password.');
		}
	}

	public function signup()
	{
		return \View::make('laravel-app-boilerplate::auth.signup')->with(array('page_title' => 'Sign Up'));
	}

	public function processSignup()
	{
		$validator = \Validator::make(\Input::all(), array(
			'name' => 'required',
			'email' => 'required|email|unique:users',
			'password' => 'required|confirmed'
		));
		if($validator->fails()){
			\Input::flashOnly('name', 'email');
			return \Redirect::to('signup')->withErrors($validator);
		}

		$user = User::firstOrNew(\Input::only('name', 'email', 'password'));
		if($user->save()){
			// Listen to this event to send a welcome email for example
			\Event::fire('auth.signup', array($user));

			\Auth::login($user);
		} else {
			return \Redirect::to('signup')->withError('Invalid name, email address or password.');
		}

		return \Redirect::to(\Config::get('laravel-app-boilerplate::redirect_after_signup', '/'));
	}

	public function logout()
	{
		\Auth::logout();
		return \Redirect::to(\Config::get('laravel-app-boilerplate::redirect_after_logout', '/login'));
	}

}
