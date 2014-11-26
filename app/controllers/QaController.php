<?php

class QaController extends \BaseController {

    /**
     * Controller to for editing QA statues and other QA matters.
     * QA specific controller
     */

    /**
     * Get view of form for status.
     *
     * /GET /user/{id}/status/
     * @return response
     */
    public function status($id) {
      $user = User::find($id); // might have to use where clause here

      // if (conditional) $user?

      return View::make('user.status')->with('user', $user);
    }


    /**
     * Update/add user status
     * /POST /user/{id}/status/
     *
     * @return response
     */
    public function postStatus($id) {

        // is validation needed? 
        // extra validation for status length.

        $user = User::find($id);
        $user->status   = Input::get('status');
        $user->save();

       return Redirect::to('/')->with('global', 'Your status has been posted');
    }
}