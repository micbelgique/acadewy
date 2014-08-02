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
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	public function getUserByUsername($username)
	{
		return User::with('profile')->whereUsername($username)->first();
	}

}
