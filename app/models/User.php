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

	protected $fillable = ['first_name', 'last_name', 'username', 'email', 'password'];

	public $timestamps = false;

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function getAuthPassword() {
		return $this->password;
	}


  public function scopeSearch($query, $search)
  { 
    return $query->where('first_name', 'LIKE', "%$search%"); 
  }

     
	/*** Roles ***/

  public function roles() {
		return $this->belongsToMany('Role')->withTimestamps();
	}

	public function hasRole($name) {
      foreach($this->roles as $role) {
      	if($role->name == $name) return true;
      }

      return false;
	}

	public function assignRole($role) {
		return $this->roles()->attach($role);
	} 

	public function removeRole($role) {
		return $this->roles()->detach($role);
	}


    /*** projects ***/

    public function projects() {
      	
      return $this->belongsToMany('Project')
       				->withPivot('ot_hours')
       				->withPivot('hours_spent')
       				->withPivot('number_of_changes')
       				->withPivot('hours_on_changes')
       				->withTimestamps();
    }

    public function hasProject($name) {
        foreach($this->projects as $project) {
            if($project->client_name == $name) return true;

        }

        return false;
    }

    public function assignProject($project) {
        return $this->projects()->attach($project);
    }


    public function removeProject($project) {
        return $this->projects()->detach($project);
    }

    public function tasks()
    {
      return $this->hasMany('Task');
    }

    // grab data from pivot table -- one-to-many
    /*public function projectuser() {
    	return $this->hasMany('ProjectUser', 'project_id', 'id');
    }*/
}
