<?php

class Categorie extends Eloquent {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'categories';

	/**
	 * Fillable fields. To prevent MASS ASSIGNMENT of other fields
	 *
	 * @var string
	 */
	protected $fillable = array('name', 'parent_id', 'description');


	public function childrenCategories() {
		return Categorie::where('parent_id', $this->id)->get();
	}

	public function parentCategorie() {
		return Categorie::where('id', $this->parent_id)->get();
	}
}
