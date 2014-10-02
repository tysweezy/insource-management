@extends('layouts.default')

@section('content')

   <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Edit Project</h1>

         {{ Form::model($project, array('route' => 'project-edit'), $project->id) }}


       {{ Form::label('requested_month', 'Requested Month')  }}

       {{ Form::text('requested_month', null, array('class' => 'form-control')) }}

             {{ Form::label('requester_name', 'Requester Name')  }}
             {{ Form::text('requester_name', null, array('class' => 'form-control'))  }}



             {{ Form::label('client_name', 'Client Name')  }}
             {{ Form::text('client_name', null, array('class' => 'form-control')) }}


             {{ Form::label('project_number', 'Project Number') }}
             {{ Form::text('project_number', null, array('class' => 'form-control'))  }}




         {{ Form::close() }}

      </div>
   </div>

@stop