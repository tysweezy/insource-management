@extends('layouts.default')

@section('content')

  <div class="row">
    <div class="col-lg-12">

    <h1 class="page-header">Projects</h1>


      @if($projects->count() == 0)
        <p>This user doesn't have any projects assigned.</p>
      @else

      <table class="table" style="font-size: .9em;">
        <thead>
          <tr>
            <th>Client Name</th>
            <th>Project Number</th>
            <th>Question Count</th>
            <th>Request Type</th>
            <th>Complexity</th>
            <th>Hours Spent</th>
            <th># of Changes</th>
            <th>Hours on Changes</th>

          </tr>
        </thead>
       <thead>

      @foreach($projects as $project)
        <tr>
           <td>{{ $project->client_name }}</td>
           <td>{{ $project->project_number }}</td>
           <td>{{ $project->question_count  }}</td>
           <td>{{ $project->request_type  }}</td>
           <td>{{ $project->complexity }}</td>
           <td>{{ $project->hours_spent }}</td>
           <td>{{ $project->number_of_changes }}</td>
           <td>{{ $project->hours_on_changes }}</td>
           <td><a href="/project/{{ $project->id }}/edit">Edit</a></td>
           <td><a href="">More Info</a></td>
        </tr>
      @endforeach

      </thead>

      </table>

      @endif

    </div>

  </div>

@stop