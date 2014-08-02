<?php

class UserResourceLink extends Eloquent {

	protected $table = 'users_resources_link';
	/**
	 * Fillable fields. To prevent MASS ASSIGNMENT of other fields
	 *
	 * @var string
	 */
	protected $fillable = array('user_id', 'resource_id', 'favorited', 'whishlisted', 'completed');

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function resource()
	{
		return $this->belongsTo('Resource');
	}
}