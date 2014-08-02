<?php

class Resource extends Eloquent {
	/**
	 * Fillable fields. To prevent MASS ASSIGNMENT of other fields
	 *
	 * @var string
	 */
	protected $fillable = array('description', 'link', 'level', 'title');

	public function user()
	{
		return $this->belongsTo('User');
	}
}