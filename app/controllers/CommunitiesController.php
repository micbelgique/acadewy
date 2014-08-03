<?php

class CommunitiesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$communities = Community::all();

		//return $categories;
		return View::make('communities.index') -> with("communities", $communities);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return 'create';
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
		return View::make('communities.show') -> with("categoriesTreeHtml", $categoriesTreeHtml);
	}


	public function categoriesTreeHtml($id) {
		$categories = Categorie::where('community_id', $id)->where('parent_id', NULL)->get();

		$categoriesTreeHtml = "";
		for ($i = 0; $i < $categories->count(); $i++) {
			$categoriesTreeHtml = $categoriesTreeHtml . $this->categoriesForCategorie($categories[$i]);
		}

		return $categoriesTreeHtml . "";
	}

	public function categoriesForCategorie($categorie) {
		
		$categorieChildrens = $categorie->categories();

		if ($categorieChildrens -> count() == 0) {
			return "
			<li class='list-group-item'>" . $categorie -> name . "</li>";
		}

		$ret = "
		<li class='list-group-item'>" . $categorie -> name;

		$ret .= '
		<ul class="list-group">';
		foreach ($categorieChildrens as $categorieChildren) {
			$ret .= $this->categoriesForCategorie($categorieChildren);
		}
		$ret .= "
		</ul></li>";

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
