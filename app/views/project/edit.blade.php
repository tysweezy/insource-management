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



             {{ Form::label('question_count', 'Question Count') }}
             {{ Form::text('question_count', null, array('class' => 'form-control')) }}


             {{ Form::label('department', 'Department')  }}
             {{ Form::text('department', null, array('class' => 'form-control')) }}


             {{ Form::label('hours_spent', 'Hours Spent') }}
             {{ Form::text('hours_spent', null, array('class' => 'form-control')) }}

             {{ Form::label('number_of_changes', 'Number of Changes') }}
             {{ Form::text('number_of_changes', null, array('class' => 'form-control'))  }}

             {{ Form::label('hours_on_changes', 'Hours on Changes') }}
             {{ Form::text('hours_on_changes', null, array('class' => 'form-control')) }}


             {{ Form::label('ot_hours', 'OT Hours') }}
             {{ Form::text('ot_hours', null, array('class' => 'form-control')) }}

             {{ Form::submit("Edit Project", array('class' => 'btn btn-primary'))  }}



         {{ Form::close() }}

      </div>
   </div>

@stop