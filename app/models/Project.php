<?php 

class Project extends Eloquent {

  public $timestamps = true;

  protected $table = 'projects';

  public function user() {
      return $this->belongsTo('User');
  }

}