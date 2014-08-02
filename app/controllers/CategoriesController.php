<?php

class CategoriesController extends \BaseController {

	public function __construct()
    {
        $this->beforeFilter('isAdmin', array('only' => 'create'));
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = Categorie::all();

		//return $categories;
		return View::make('categories.index') -> with("categories", $categories);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categories = $this->queryToArray(Categorie::all(), true);
		$communities = $this->queryToArray(Community::all(), false);

		return View::make('categories.create') -> with("categories", $categories) -> with("communities", $communities);
	}

	public function queryToArray($query, $canBeUnset){

		$array = array();

		if ($canBeUnset) {
			$array[0] = "--------";	
		}
		
		for ($i = 0; $i < $query->count(); $i++) {
			$array[$query[$i]->id] = $query[$i]->name;
		}

		return $array;
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only('name', 'parent_id', 'community_id', 'description');
		$rules = [
			'name' => 'required',
			'community_id' => 'required',
			'description' => 'required' ];
		
		$validator = Validator::make($input, $rules);

		if($validator->passes())
		{
			// Password hashing is done by the setPasswordAttribute function in the User model
			$Categorie = Categorie::create($input);

			return Redirect::home();
		}
		
		return Redirect::back()->withInput()->withErrors($validator);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$categories = Categorie::where('community_id', $id)->get();
		return View::make('categories.index') -> with("categories", $categories);;
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return 'edit';
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


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
