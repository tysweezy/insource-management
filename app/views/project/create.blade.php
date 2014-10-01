@extends('layouts.default')

@section('content')

 <div class="row">
   <div class="col-lg-12">
     <h1 class="page-header">Create Project</h1>


        @if(Session::has('global'))
           {{ Session::get('global') }}

            <br />
        @endif

        <ul>
        @foreach($errors->all() as $error)
          <li class="bg-danger">{{ $error }}</li>
        @endforeach
        </ul>


    {{ Form::open()  }}


     <div class="input-group">

      <div class="col-md-6">

       {{ Form::label('month', 'Requested Month')  }}

       <select name="month" id="month" class="form-control">
         <option value="January">January</option>
         <option value="February">February</option>
         <option value="March">March</option>
         <option value="April">April</option>
         <option value="May">May</option>
         <option value="June">June</option>
         <option value="July">July</option>
         <option value="August">August</option>
         <option value="September">September</option>
         <option value="October">October</option>
         <option value="November">November</option>
         <option value="December">December</option>
       </select>

       </div>


     <div class="col-md-6">

       {{ Form::label('requester_name', 'Requester Name') }}
       {{ Form::text('requester_name', null, array('class' => 'form-control', 'placeholder' => 'Requester Name'))  }}

      </div>




     </div><!-- / input-group -->

     <br/>

     <div class="input-group">
         <div class="col-md-6">
           {{ Form::label('client_name', 'Client Name') }}
           {{ Form::text('client_name', null, array('class' => 'form-control', 'placeholder' => 'Client Name'))  }}



         </div>


         <div class="col-md-6">
            {{ Form::label('project_number', 'Project Number')  }}
            {{ Form::text('project_number', null, array('class' => 'form-control', 'placeholder' => 'Project Number')) }}

         </div>



     </div>


     <br/>

     <div class="input-group">
       <div class="col-md-6">
         {{ Form::label('project_status', 'Project Status')  }}
         <select name="project_status" id="project_status" class="form-control">
           <option value="Open">Open</option>
           <option value="Closed">Closed</option>
         </select>
       </div>


       <div class="col-md-6">
         {{ Form::label('request_type', 'Request Type') }}
         <select name="request_type" id="request_type" class="form-control">
            <option value="QA">QA</option>
            <option value="Tracker Maintenance">Tracker Maintenance</option>
         </select>
         
       </div>
     </div>


     <br/>

     <div class="input-group">
        <div class="col-md-6">
          {{ Form::label('question_count', 'Question Count') }}
          {{ Form::text('question_count', null, array('class' => 'form-control', 'placeholder' => 'Question Count')) }}
        </div>
        
        <div class="col-md-6">
          {{ Form::label('complexity', 'Complexity')  }}
          <select name="complexity" id="complexity" class="form-control">
            <option value="Easy">Easy</option>
            <option value="Easy/Moderate">Easy/Moderate</option>
            <option value="Moderate">Moderate</option>
            <option value="Moderate/Complex">Moderate/Complex</option>
            <option value="Complex">Complex</option>
          </select>
        </div>
     </div>

     <br/>

     <div class="input-group">
       <div class="col-md-6">
           {{ Form::label('department', 'Department') }}
           <select name="department" id="department" class="form-control">
             <option value="US Service Team">US Service Team</option>
             <option value="US Support Team">US Support Team</option>
             <option value="UK Service Team">UK Service Team</option>
             <option value="UK Support Team">UK Support Team</option>
             <option value="IS Training">IS Training</option>
             <option value="Development Testing">Development Testing</option>
             <option value="Onboarding">Onboarding</option>
           </select>
       </div>

       <div class="col-md-6">
         {{ Form::label('qa_name', 'QA Name') }}
         <select name="qa_name" id="qa_name" class="form-control">
            <option value=""></option>
            <option value="">Not Available yet</option>
         </select>
       </div>
     </div>

      <br/>

     <div class="input-group">
       <div class="col-md-6">
         {{ Form::label('hrs_qa', 'Hrs. Spent on QA')  }}
         {{ Form::text('hrs_qa', null, array('class' => 'form-control', 'placeholder' => 'Hrs. Spent on QA')) }}
       </div>

       <div class="col-md-6">
         {{ Form::label('number_changes', 'Number of Changes') }}
         {{ Form::text('number_changes', null, array('class' => 'form-control', 'placeholder' => 'Number of Changes')) }}
       </div>
     </div>

     <br/>

     <div class="input-group">
       <div class="col-md-6">
         {{ Form::label('hrs_changes', 'Hrs. Spent on Changes') }}
         {{ Form::text('hrs_changes', null, array('class' => 'form-control', 'placeholder' => 'Hrs. Spent on Changes')) }}

       </div>

       <div class="col-md-6">
         {{ Form::label('ot_hours', 'OT Hours')  }}
         {{ Form::text('ot_hours', null, array('class' => 'form-control', 'placeholder' => 'OT Hours'))  }}
       </div>
     </div>

     <br/>

      <div class="input-group">
        <div class="col-md-12">
          {{ Form::label('notes', 'Notes') }}
          {{ Form::textarea('notes', null, array('class' => 'form-control'))  }}
        </div>
      </div>

      <br/>

      <div class="input-group">
        <div class="col-md-12">
           {{ Form::submit('Create Project', array('class' => 'btn btn-primary'))  }}
        </div>
      </div>
    {{ Form::close() }}

   </div><!-- / col-lg-12 -->
 </div><!-- / row -->

@stop