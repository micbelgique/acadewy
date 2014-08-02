<?php

class ProfilesController extends \BaseController {


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($username)
	{
		$user = $this->getUserByUsername($username);

		if($user)
		{
			return View::make('profile.show')->with('user', $user);
		}
		
		return Redirect::home();
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit()
	{
		$user = $this->getUserByUsername(Auth::user()->username);
		return View::make('profile.edit')->with('user', $user);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::only('firstname', 'lastname', 'birthday', 'location', 'description');

		$profile = Profile::find(Auth::user()->id)->update($input);

		return Redirect::action('ProfilesController@show', ['username' => Auth::user()->username]);


	}

	public function getUserByUsername($username)
	{
		return User::with('profile')->whereUsername($username)->first();
	}

}
