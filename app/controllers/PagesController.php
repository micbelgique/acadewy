<?php

class PagesController extends \BaseController {

	/**
	 * Display the home page
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('pages.index');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $page
	 * @return Response
	 */
	public function show($page)
	{
		if(View::exists('pages.' . $page))
		{
			return View::make('pages.' . $page);
		}

		return Redirect::home();
	}

}
