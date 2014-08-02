<?php

class RegistrationController extends \BaseController {

	/**
	 * Show the user registration form.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('registration.create');
	}


	/**
	 * Stores the user in the DB after input validation checks
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only('username', 'email', 'password', 'password_confirmation');
		$rules = [
			'username' => 'required|unique:users',
			'email' => 'required|email|unique:users',
			'password' => 'required|confirmed'
		];
		
		$validator = Validator::make($input, $rules);

		if($validator->passes())
		{
			// Password hashing is done by the setPasswordAttribute function in the User model
			$user = User::create($input);
			
			// This directly creates an associated profile for this user
			$profile = new Profile();
			$profile = $user->profile()->save($profile);

			Auth::login($user);

			return Redirect::home();
		}
		
		return Redirect::back()->withInput()->withErrors($validator);	
	}

}
