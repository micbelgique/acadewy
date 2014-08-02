<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * Fillable fields. To prevent MASS ASSIGNMENT of other fields
	 *
	 * @var string
	 */
	protected $fillable = array('username', 'email', 'password');

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function setPasswordAttribute($password)
	{
		$this->attributes['password'] = Hash::make($password);
	}

	public function profile()
   {
      return $this->hasOne('Profile');
   }

   public function resources()
   {
   	return $this->hasMany('Resource');
   }

<<<<<<< HEAD
   public function courses()
   {
      return $this->hasMany('Course');
=======
   public function userResourceLink()
   {
   	return $this->hasMany('UserResourceLink');
>>>>>>> origin/didier
   }
}
