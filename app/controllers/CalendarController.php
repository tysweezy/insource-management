<?php

class CalendarController extends BaseController {

    /**
      * Main calendar function(view)
      * @return response
    **/

	public function main() 
	{
		return View::make('calendar.main');
	}

}