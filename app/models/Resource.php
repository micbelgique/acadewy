<?php

class Resource extends Eloquent {
   /**
    * Fillable fields. To prevent MASS ASSIGNMENT of other fields
    *
    * @var string
    */
   protected $fillable = array('description', 'link', 'level');

   public function user()
   {
      return $this->belongsTo('User');
   }

   /*
   public function setUserIdAttribute()
   {
      $this->attributes['user_id'] = Auth::id();
   }*/
}