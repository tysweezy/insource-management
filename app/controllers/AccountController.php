<?php

class AccountController extends BaseController {

  public function getLogin() {
    return View::make('account.login');
  }

  public function postLogin() {
    $rules = array(
      'email'     => 'required|email',
      'password'  => 'required'
    );

    $validator = Validator::make(Input::all(), $rules);

    if ($validator->fails()) {
      return Redirect::route('account-login')
              ->withErrors($validator)
              ->withInput();
    } else {
      // remember me checkbox
      $remember = (Input::has('remember')) ? true : false;

      $creds = Auth::attempt([
        'email'     => Input::get('email'),
        'password'  => Input::get('password'),
        'active'    => 1
      ], $remember);

      if ($creds) {
        return Redirect::to('/');
      } else {
        return Redirect::route('account-login')->with('global', 'Email/Password wrong or account not activated');
      }
    }

    return Redirect::route('account-login')->with('global', 'There was a problem with signing you in.');
  }

  public function getLogout() {
    Auth::logout();
    return Redirect::route('account-login')->with('global', 'You are now logged out.');
  }

  public function getRegister() {
    return View::make('account.register');
  }

  public function postRegister() {
    $rules = array(
      'first_name'      => 'required',
      'last_name'       => 'required',
      'username'        => 'required|min:5|unique:users',
      'email'           => 'required|email|unique:users',
      'password'        => 'required|min:6',
      'password_repeat' => 'required|same:password'
     );

     $validator = Validator::make(Input::all(), $rules);

     if ($validator->fails()) {
       return Redirect::route('account-register')->withErrors($validator)->withInput();
     } else {

       $user = new User;

       $user->first_name   = Input::get('first_name');
       $user->last_name    = Input::get('last_name');
       $user->username     = Input::get('username');
       $user->email        = Input::get('email');
       $user->password     = Hash::make(Input::get('password'));
       $user->code         = str_random(60);


       $user->save();

      // after user is saved, assign role 
       $user->assignRole(1);




       if ($user) {
         // mail user activation code
         Mail::send('emails.auth.activate', array('link' => URL::route('account-activate', $user->code),
                    'username' => $user->username), function($message) use ($user) {
            $message->to($user->email, $user->username)->subject('Activate your account');
          });

         // redirect to login page
         return Redirect::route('account-login')
                ->with('global', 'You have created your account! We have sent you an email to activate it');
       }

     }
  }

  public function getActivate($code) {
    $user = User::where('code', '=', $code)->where('active', '=', 0);

    if ($user->count()) {
      $user = $user->first();

      $user->active = 1;
      $user->code = '';

      if ($user->save()) {
        return Redirect::route('account-login')
                  ->with('global', 'Activated! You can now sign in.');
      }
    }

    return Redirect::route('account-login')
            ->with('global', 'We could not activate your account. Please try again later.');
  }

  /**
    * Change Password
  **/

  public function getChangePassword() {
    return View::make('account.password');
  }

  public function postChangePassword() {
    
    $password_rules = array(
      'old_password'     => 'required',
      'password'         => 'required|min:6',
      'password_repeat'  => 'required|same:password'
    );

    $validator = Validator::make(Input::all(), $password_rules);

    if ($validator->fails()) {
      return Redirect::route('account-change-password')
              ->withErrors($validator);
    } else {
      $user           = User::find(Auth::user()->id);

      $old_password   = Input::get('old_password');
      $password       = Input::get('password');

      if (Hash::check($old_password, $user->getAuthPassword())) {
        $user->password = Hash::make($password);

        if ($user->save()) {
          return Redirect::to('/')
                    ->with('global', 'Your password had been successfully changed.');
        }
      }

    }

    return Redirect::route('account-change-password')
              ->with('global', 'Your password could not be changed.');
  }

  public function getForgotPassword() {

    return View::make('account.forgot');
  }

  public function postForgotPassword() {
    $validator = Validator::make(Input::all(), array(
      'email'  => 'required|email'
    ));

    if ($validator->fails()) {
      return Redirect::route('account-forgot-password')
              ->withErrors($validator)
              ->withInput();
    } else {
      $user = User::where('email', '=', Input::get('email'));

      if ($user->count()) {
        $user = $user->first();

        $code       = str_random(60);
        $password   = str_random(10);

        $user->code             = $code;
        $user->password_temp    = Hash::make($password);

        if ($user->save()) {
          Mail::send('emails.auth.forgot', array('link' => URL::route('account-recover', $code), 'username' => $user->username, 'password' => $password), function($message) use ($user) {
             $message->to($user->email, $user->username)->subject('Your new password');
          });

          return Redirect::route('account-login')
                  ->with('global', 'We have sent you an email to change your password.');
        }
      }
    }

    return Redirect::route('account-change-password')
            ->with('global', 'Cannot request new password');
  }

  public function getRecover($code) {
    $user = User::where('code', '=', $code)
              ->where('password_temp', '!=', '');

    if ($user->count()) {
      $user = $user->first();

      $user->password        = $user->password_temp;
      $user->password_temp   = '';
      $user->code            = '';


        if ($user->save()) {
          return Redirect::route('account-login')
                   ->with('global', 'Your account has been recoverd and you can sign in with your new password.');
        }
    }

       return Redirect::route('account-change-password')
               ->with('global', 'Could not recover your account.');
  }

  /***
   * Show list of of projects
   * GET -- /user/{username}/projects
   */

    public function projectList($username) {
       // $user = User::find(34)->projects;

        $user = User::where('username', '=', $username);

        if ($user->count()) {

            $projects = $user->first()->projects;

            return View::make('project.show')->with('projects', $projects);

            /*foreach($user->first()->projects as $project) {
                echo $project->id . '<br/>' . $project->client_name . '<hr />';

            }*/

        }
    }
}
