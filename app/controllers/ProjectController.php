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


    $query = Input::get('q');


    if ($query) {
      $users = User::search($query)->paginate(5);
    
    } else {
      $users = User::orderBy('assigned_task_count', 'ASC')->paginate(5);
    }

    return View::make('home')->with('users', $users);
    
	}

    
    /**
      * Display all projects -- project overview
      * @return Response
    **/
    /*public function all() {
        return "Projects page";
    }*/

    /**    
     * Assign project page.
     * GET /assign/user/{id}
     *
     * @return Response
     */
    public function assign($id) {
        $user = User::where('id', '=', $id);

        if($user->count()) {
            $user = $user->first();

            $projects = Project::all();

            return View::make('project.assign')
                ->with('user', $user)
                ->with('projects', $projects);
        }

    }

    /**
      * Post data and assign user project
      * POST /assign/user/{id}
      *
      * @return Response
    **/

    public function postAssign($id) {

        $user = User::find($id);

        if ($user) {
            $user->assignProject(Input::get('project'));

            return Redirect::to('/')->with('global', 'Project has been assigned');
        }

        return Redirect::route('project-assign')->with('global', 'Something went wrong');

    }


    /**
      * Need to un-assign project from user
      * 
      * GET /assign/user/{id}
      * 
      * @return Response
    **/

    public function unassignProject($id) {
      
      $user = User::find($id);

      if ($user) {
        $user->removeProject(Input::get('project'));


        return Redirect::to('/user/'. $user->username . '/projects')->with('success', 'Project Unassigned');
      }

      return Redirect::to('/user/'. $user->username . '/projects')->with('error', 'Something went wrong.');
      
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
     * @todo Might use for specific project details.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
      // project details will go here.
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
		  $project = Project::where('id', '=', $id);

        if ($project->count()) {
            $project->first();

            return View::make('project.edit')->with('project', Project::find($id));
        }
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
		$project = Project::find($id);

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
		$project = Project::find($id);
    

    if ($project->delete()) { 

      return Redirect::to('/admin')->with('success', 'Project deleted');

    }
	}

    /**
     * Edits user in the admin level
     *
     * @param int $id
     * @return Response
     */
    public function editUser($id) {
        $user = User::find($id);

        return View::make('project.admin-user-edit')
                 ->with('user', $user);
    }

    public function updateUser($id) {

        $user = User::find($id);

        $user->shift_hours   = Input::get('shift_hours');
        $user->save();

        return Redirect::to('/admin')
            ->with('global', 'User has been updated.');
    }

    public function exportExcel()
    {
      $excel = App::make('excel');
      
      Excel::create('projects', function($excel) {
        $projects = Project::all()->toArray();

        $excel->sheet('project', function($sheet) use ($projects) {
          $sheet->fromArray($projects, null, 'A1', true);

        });
      })->export('xls');

      return Redirect::to('/admin');
    }

    public function qaExport()
    {
      $excel = App::make('excel');

      Excel::create('qa', function($excel) {
        $users = User::all()->toArray();

        $excel->sheet('qa', function($sheet) use ($users) {
          $sheet->fromArray($users, null, 'A1', true);
        });
      })->export('xls');


      return Redirect::to('/admin');
    }
}