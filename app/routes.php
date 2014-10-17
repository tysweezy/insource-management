<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


/**
 * Unauthenticated groups
 */
Route::group(array('before' => 'guest'), function(){


  /**
    * CSRF Protection
  **/
  Route::group(array('before' => 'csrf'), function() {

      /**
       * Register (POST)
      **/
     Route::post('account/register', array(
       'as'    => 'account-register-post',
       'uses'  => 'AccountController@postRegister'
     ));


     /**
       * Forgot Password (POST)
     **/
     Route::post('/account/forgot', array(
       'as'    => 'account-forgot-password-post',
       'uses'  => 'AccountController@postForgotPassword'
     ));

  });


 /**
   * Login (GET)
  **/
 Route::get('account/login', array(
   'as'    => 'account-login',
   'uses'  => 'AccountController@getLogin'
 ));

    /**
   * Login (POST)
  **/
 Route::post('account/login', array(
   'as'    => 'account-login-post',
   'uses'  => 'AccountController@postLogin'
 ));


  /**
   * Create account
   * Register (GET)
  **/
 Route::get('account/register', array(
   'as'    => 'account-register',
   'uses'  => 'AccountController@getRegister'
 ));

 Route::get('/account/activate/{code}', array(
   'as'    => 'account-activate',
   'uses'  => 'AccountController@getActivate'
 ));

 /**
   * Forgot Password (GET)
 **/
 Route::get('/account/forgot', array(
   'as'    => 'account-forgot-password',
   'uses'  => 'AccountController@getForgotPassword'
 ));

 Route::get('/account/recovery/{code}', array(
   'as'     => 'account-recover',
   'uses'   => 'AccountController@getRecover'
 ));


});

/**
  * Authenticated Groups
**/
Route::group(array('before' => 'auth'), function() {

  /**
    * CSRF Protection
  **/
  Route::group(array('before' => 'csrf'), function() {
      /**
        * Change Password (POST)
      **/
      Route::post('/account/change-password', array(
        'as'     => 'account-change-password-post',
        'uses'   => 'AccountController@postChangePassword'
      ));


      // edit profile (POST)
      Route::post('/profile/{username}/edit', array(
        'as'       => 'profile-edit-post',
        'uses'     => 'ProfileController@postEditProfile'
      ));
  });


  Route::get('/', array(
      'as'     => 'home',
      'uses'   => 'ProjectController@index'
  ));

  /**
   * Assign project -- before('role:admin')
   */



  Route::post('/assign', array(
     'as'   => 'project-assign-post',
     'uses' => 'ProjectController@postAssign'
  ));

  Route::get('logout', array(
   'as'   => 'account-logout',
   'uses' => 'AccountController@getLogout'
  ));

  /**
    * Change Password (GET)
  **/
  Route::get('/account/change-password', array(
    'as'     => 'account-change-password',
    'uses'   => 'AccountController@getChangePassword'
  ));

  /**
    * Applcation Routes
    *
    * Some basic CRUD action
  **/

  // profile
  Route::get('/profile/{username}', array(
    'as'     => 'profile-user',
    'uses'   => 'ProfileController@user'
   ));

  // edit profile
  Route::get('/profile/{username}/edit', array(
    'as'       => 'profile-edit',
    'uses'     => 'ProfileController@edit'
  ));


    Route::get('/user/{username}/projects', array(
        'as'   => 'user-projects',
        'uses' => 'AccountController@projectList'
    ));


    /**
     * Edit project
     */

    Route::get('/project/{id}/edit', array(
        'as'     => 'project-edit',
        'uses'   => 'ProjectController@edit'
    ));


    /***
     * Administrator group
     */

    Route::group(array('before' => 'role:admin'), function() {

        Route::get('/admin', function () {

            $users    = User::all();
            $projects = Project::paginate(20);

            return View::make('project.admin')
                    ->with('users', $users)
                    ->with('projects', $projects);
        });

        /**
         * Create project -- GET
         */

        Route::get('/admin/project/create', array(
            'as'     => 'project-create',
            'uses'   => 'ProjectController@create'
        ));


       Route::group(array('before' => 'csrf'), function() {
           /***
            * Store Project -- POST
            */

           Route::post('/admin/project/create', array(
               'as' => 'project-store',
               'uses' => 'ProjectController@store'
           ));


           Route::post('/assign/user/{id}', array(
               'as'    => 'project-assign-post',
               'uses'  => 'ProjectController@postAssign'
           ));

       });

        /***
         * Assign project -- based on user id
         */


        Route::get('/assign/user/{id}', array(
            'as'    => 'project-assign',
            'uses'  => 'ProjectController@assign'
        ));

    });

});
