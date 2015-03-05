@extends('layouts.default')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			@include('partials.create-task')

			<h1 class="page-header">Your Tasks</h1>


	

		<div class="col-lg-6">
		   <h3>Assigned Tasks</h3>

		   @if(count($projects) == 0)
		   	 	<div class="alert alert-info">You don't have any assigned tasks at the moment.</div>

		   	@else
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Complete?</th>
						<th>Project Name</th>
						<th>Deadline</th>
					</tr>
				</thead>

				<tbody>
				  @foreach($projects as $project)
					<tr>
						<td><input type="checkbox"></td> 
						<td>{{ $project->client_name }}</td>
						<td>N/A</td> 
					</tr>	
				  @endforeach
				</tbody>
			</table>
		@endif
		</div><!-- /col-lg-6 -->


		<div class="col-lg-6">
		  <h3>Custom Tasks</h3>


        @if(count($tasks) == 0)

           <div class="alert alert-info">You don't have any custom tasks at the moment.</div>

        @else

			<table class="table table-striped">
				<thead>
					<tr>

						<th>Complete?</th>
						<th>Task Name</th>
						<th>Deadline</th>
					</tr>
				</thead>

				<tbody>
			 
			     @foreach($tasks as $task)
					<tr>
						<td><input type="checkbox"></td>
						<td>{{ $task->task_name }}</td>
						<td>{{ $task->deadline }}</td>
						<td>
							<a href="/user/{{$user->id}}/tasks/edit/{{$task->task_name}}" class="btn btn-xs btn-warning">Edit</a>
						</td>
					</tr>
				@endforeach

				
				</tbody>
			</table>

			@include('partials.edit-task')

		@endif
		</div><!-- /col-lg-6 -->
		</div>
	</div>
@stop