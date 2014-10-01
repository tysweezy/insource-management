<?php

class ProjectController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /project
	 *
	 * @return Response
	 */
	public function index()
    {

        $users = User::all();

        //$user = User::with('Project');

        $projects = Project::all();

        /*foreach($users as $user) {
            return $user->projects;
        }*/

        /*foreach($projects as $project) {
            return $project->user;
        }*/



        return View::make('home')->with('users', $users);
	}


    /**
     * Assign project page.
     * GET /assign
     *
     * @return Response
     */
    public function assign() {

        $users = User::lists('first_name');
        $projects = Project::lists('client_name');

        // user/project query

        return View::make('project.assign')->with('users', $users)->with('projects', $projects);
    }

    public function postAssign() {

        $rules = array(
            'user'    => 'required',
            'project' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
           return Redirect::route('project-assign')->withErrors($validator);
        } else {

            //extra validation to check if user is fully booked.

            // assign project to user


           /*$user     = Input::get('user');
           $project  = Input::get('project');
            $user->assignProject($project);*/

        }

    }


	/**
	 * Show the form for creating a new resource.
	 * GET /project/create
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('project.create');
    }
	/**
	 * Store a newly created resource in storage.
	 * POST /project
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(

            'requester_name' => 'required',
            'client_name'    => 'required',
            'project_number' => 'required'

        );


        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::route('project-create')
                     ->withErrors($validator);
        } else {

            $project = new Project;

            $project->requested_month   = Input::get('month');
            $project->requester_name    = Input::get('requester_name');
            $project->client_name       = Input::get('client_name');
            $project->project_number    = Input::get('project_number');
            $project->project_status    = Input::get('project_status');
            $project->request_type      = Input::get('request_type');
            $project->complexity        = Input::get('complexity');
            $project->department        = Input::get('department');
            $project->question_count    = Input::get('question_count');
            $project->qa_name           = Input::get('qa_name');
            $project->hours_spent       = Input::get('hrs_qa');
            $project->number_of_changes = Input::get('number_changes');
            $project->hours_on_changes  = Input::get('hrs_changes');
            $project->ot_hours          = Input::get('ot_hours');
            $project->notes             = Input::get('notes');


            $project->save();

            return Redirect::to('/admin')
                     ->with('global', 'Project has been successfully created!');
        }


        return Redirect::route('project-create')
                 ->with('global', 'Something went wrong. Please try again later');

	}

	/**
	 * Display the specified resource.
	 * GET /project/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /project/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /project/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /project/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}