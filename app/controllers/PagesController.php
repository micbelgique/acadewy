<?php

class PagesController extends \BaseController {

	/**
	 * Display the home page
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::with('profile')->orderBy('created_at')->get();
		$resources = Resource::all();
		$mainCategories = Categorie::where("parent_id", NULL)->get();
		
		return View::make('pages.index')->with(['users' => $users, 'resources' => $resources, 'mainCategories' => $mainCategories]);
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
