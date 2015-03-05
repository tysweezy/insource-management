@extends('layouts.default')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			
			<a href="/user/{{Auth::user()->id}}/tasks" class="btn btn-sm btn-primary pull-right" style="margin-top: 50px;"><i class="fa fa-caret-square-o-left"></i> Back To Tasks</a>
			<h1 class="page-header">Edit Custom Task</h1>



			    {{ Form::model($task, ['url' => 'user/' . $user->id . '/tasks/edit/' . $task->task_name, 'method' => 'post',  $task->id]) }}

                    <div class="form-group">
                        {{ Form::label('task_name', 'Task Name') }}
                        {{ Form::text('task_name', null, ['class'  => 'form-control', 'placeholder' => 'Task Name']) }}

                    </div>

                    <div class="form-group">
                        {{ Form::label('deadline', 'Deadline') }}
                        {{ Form::input('date', 'deadline', null, ['class' => 'form-control']) }}
                        
                    </div>

                    <div class="form-group">
                        {{ Form::submit('Edit Custom Task', ['class' => 'btn btn-primary']) }}
                    </div>

                {{ Form::close() }}
		</div>
	</div>
@stop


