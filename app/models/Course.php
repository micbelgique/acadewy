<?php

class Course extends Eloquent {
	/**
	 * Fillable fields. To prevent MASS ASSIGNMENT of other fields
	 *
	 * @var string
	 */
	protected $fillable = array('title', 'description');

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function courseResourceLink()
	{
		return $this->hasMany('CourseResourceLink')->orderBy('order');
	}
}