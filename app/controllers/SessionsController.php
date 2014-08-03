<?php

class SessionsController extends \BaseController {
	
	public function __construct()
	{
		$this->beforeFilter('guest', array('only' => 'create', 'store'));
		$this->beforeFilter('auth', array('only' => 'logout'));
	}

	/**
	 * Show the login form
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}


	/**
	 * Log user in after input validation and DB checks
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only('email', 'password');
		$rules = [
			'email' => 'required|email',
			'password' => 'required'
		];
		
		$validator = Validator::make($input, $rules);

		if($validator->passes())
		{
			if (Auth::attempt($input))
			{
				return Redirect::intended('/');
			}

			return Redirect::back()->withInput()->withFlashMessage('Wrong email and/or password');
		}
		
		return Redirect::back()->withInput()->withErrors($validator);
	}


	/**
	 * Log user out
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id = null)
	{
		Auth::logout();

		return Redirect::home();
	}


}
