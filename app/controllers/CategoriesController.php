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
		$categories = $this->queryToArray(Categorie::all());

		return View::make('categories.create') -> with("categories", $categories);
	}

	public function queryToArray($query){

		$array = array();
		$array[0] = "--------";	
		
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
		$input = Input::only('name', 'parent_id', 'description');
		$rules = [
			'name' => 'required',
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
		$categoriesTreeHtml = $this->categoriesTreeHtml($id);

		$categorie = Categorie::where("id", $id)->first();
		$parentLiList = $this->parentLiList($categorie);

		return View::make('categories.show') -> with("categoriesTreeHtml", $categoriesTreeHtml)
											 -> with("parentLiList", $parentLiList);
	}

	/*
	 * Used for breadcrumb
	 */
	public function parentLiList($categorie) {
		$parentCategorie = $categorie->parentCategorie();

		//return $parentCategorie . " - " . $categorie;

		if ($parentCategorie -> count() == 0) {
			return "";
		}

		$ret = "<li class='active'><a href='/'>Home</a></li>";
		if ($parentCategorie -> parent_id != null) {
			$ret .= parentLiList($parentCategorie);
			//return "<li class='list-group-item'>" . 
			//	link_to_action('CategoriesController@show', $categorie->name, $parameters = array('id' => $categorie->id), $attributes = array()) .
			//	"</li>";
		}

		//$ret = "<li class='list-group-item'>" . 
		//	link_to_action('CategoriesController@show', $categorie->name, $parameters = array('id' => $categorie->id), $attributes = array()) . 
		//	"</li>";

		
		
		//$ret .= "<ul>";
		
		return $ret;
	}

	/*
	 * Used to create the categories tree
	 */
	public function categoriesTreeHtml($id) {
		$categories = Categorie::Where('id', $id)->get();

		$categoriesTreeHtml = "<ul>";
		for ($i = 0; $i < $categories->count(); $i++) {
			$categoriesTreeHtml = $categoriesTreeHtml . $this->categoriesForCategorie($categories[$i]);
		}

		return $categoriesTreeHtml . "</ul>";
	}

	/*
	 * Used to create the categories tree
	 */
	public function categoriesForCategorie($categorie) {
		
		$categorieChildrens = $categorie->childrenCategories();

		if ($categorieChildrens -> count() == 0) {
			return "<li class='list-group-item'>" . 
				link_to_action('CategoriesController@show', $categorie->name, $parameters = array('id' => $categorie->id), $attributes = array()) .
				"</li>";
		}

		$ret = "<li class='list-group-item'>" . 
			link_to_action('CategoriesController@show', $categorie->name, $parameters = array('id' => $categorie->id), $attributes = array()) . 
			"</li>";

		$ret .= "<ul>";
		foreach ($categorieChildrens as $categorieChildren) {
			$ret .= $this->categoriesForCategorie($categorieChildren);
		}
		$ret .= "</ul>";

		return $ret;
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
