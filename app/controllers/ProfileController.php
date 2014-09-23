<?php

class ProfileController extends BaseController {

  public function user($username) {

    $user = User::where('username', '=', $username);

    if ($user->count()) {
      $user = $user->first();

      return View::make('profile.user')->with('user', $user);
    }

      return App::abort(404);
  }

  public function edit($username) {
      $user = User::where('username', '=', $username);

      if ($user->count()) {
        $user = $user->first();
      
        return View::make('profile.edit')->with('user', $user);
      }

  }


  /**
    * Validate and save changes to the database
  **/
  public function postEditProfile($username) {

        $validator = Validator::make(Input::all(), array(
          'username'  => 'required|unique:users'
        ));

        if ($validator->fails()) {
          return Redirect::route('profile-edit')->withErrors($validator)->withInput();
        } else {

          $user = new User;

          $user->username      = Input::get('username');
          $user->job_title     = Input::get('job_title');

          $user->save();

          if ($user) {
            return Redirect::route('profile-edit', $username)->with('global', 'Success');
          } else {
            return Redirect::route('profile-edit')->with('global', 'Could not update profile.');
          }

        }
 }

}