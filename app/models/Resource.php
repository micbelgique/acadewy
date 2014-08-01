<?php

class Resource extends Eloquent {
   /**
    * Fillable fields. To prevent MASS ASSIGNMENT of other fields
    *
    * @var string
    */
   protected $fillable = array('description', 'link', 'level');

   /*
   public function setUserIdAttribute() {
      $this->attributes['user_id'] = Auth::user->id;
   }
   */
}