<?php

class TasksController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /tasks
	 *
	 * @return Response
	 */
	public function index($id)
	{	
		$user = User::where('id', '=', $id);
		$fuser = User::find($id);	
        $projects = $user->first()->projects;

        //$task = Task::where('user_id', '=', $fuser->id)->first();

        $tasks = User::find($id)->tasks;

        //$task = $task->first();

		  return View::make('tasks.main')
		  			->with('tasks', $tasks)
		  			->with('projects', $projects)
		  			->with('user', $fuser);
        
	 	
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /tasks
	 *
	 * @return Response
	 */
	public function store($id)
	{
		$v = Validator::make(Input::all(), array(
			'task_name'  => 'required'
		));

		if ($v->fails()) {
			return Redirect::to('/')
				->with('error', $v);
		} else {

			$user = User::where('id', '=', $id)->first();

			$task = new Task;

			$task->task_name   = Input::get('task_name');
			$task->deadline    = Input::get('deadline');
			$task->user_id     = $user->id;

			$task->save();

			return Redirect::to('/user/' . $user->id . '/tasks')->with('success', 'Task Created!');
		}
	}


	/**
	 * Show the form for editing the specified resource.
	 * GET /tasks/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id, $taskName)
	{
		$user = User::find($id);

		$task = $user->tasks()->where('task_name', '=', $taskName)->first();

		return View::make('tasks.edit')
				->with('user', $user)
				->with('task', $task);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /tasks/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, $taskName)
	{
		$user = User::find($id);

		$task = $user->tasks()->where('task_name', '=', $taskName)->first(); 

		$task->task_name   = Input::get('task_name');
		$task->deadline    = Input::get('deadline');

		$task->save();

		return Redirect::to('/user/'. Auth::user()->id . '/tasks')->with('success', 'Custom Task Updated');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /tasks/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}