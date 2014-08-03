<?php

class CourseResourceLink extends Eloquent {

	protected $table = 'courses_resources_link';
	/**
	 * Fillable fields. To prevent MASS ASSIGNMENT of other fields
	 *
	 * @var string
	 */
	protected $fillable = array('course_id', 'resource_id', 'order');

	public function course()
	{
		return $this->belongsTo('Course');
	}

	public function resource()
	{
		return $this->belongsTo('Resource');
	}
}