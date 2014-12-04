<?php

class ProjectUser extends Eloquent {
  
  /**
    * Database table by project_user
    *
    * @var string
  **/

  protected $table = "project_user";

  public function user() {
  	return $this->belongsTo('User');
  }

}