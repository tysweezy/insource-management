@extends('layouts.default')

@section('content')

 <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Administration</h1>

      <span><em>* This page is only for managers (administrators). Use this page to
        create, assign, manage or delete projects.
      </em></span>

  <br/>

   <div class="admin-actions pull-right">

    <a href="{{ URL::route('project-create') }}" class="btn btn-primary"><i class="fa fa-file-code-o"></i> Create Project</a>
    <a href="#" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export Data (Excel)</a>

   </div>

    <ul class="nav nav-tabs">
       <li class="active"><a href="#qa" data-toggle="tab">QAs</a></li>
       <li><a href="#projects" data-toggle="tab">Projects</a></li>

    </ul>


    <div class="tab-content">
      <div class="tab-pane active in" id="qa">
        <table class="table">
          <thead>
            <tr>
              <th></th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Username</th>
              <th>Email</th>
              <th>Assigned Task Count</th>
              <th>Shift Hours</th>

            </tr>
          </thead>

          <thead>

          @if($users->count() == 0)

            <p>Not a single QA exits. A QA will have to create an account. Force them to create one. Do it!! Peer pressure!!</p>
          @else
            @foreach($users as $u)
              <tr>
                <td><img class="img-circle" src="//www.gravatar.com/avatar/{{ md5($u->email)  }}?s=30" alt="{{ $u->username  }}"/></td>
                <td>{{ $u->first_name }}</td>
                <td>{{ $u->last_name  }}</td>
                <td>{{ $u->username }}</td>
                <td>{{ $u->email }}</td>
                <td>{{ $u->assigned_task_count }}</td>
                <td>{{ $u->shift_hours }}</td>
                <td><a href="#" class="btn btn-warning">Edit</a></td>

              </tr>

            @endforeach
          </thead>
        </table>

        @endif
      </div>


      <div class="tab-pane" id="projects">


       @if ($projects->count() == 0)
         <br/><p>Not a single project exists. You can create one by clicking the Create Project button.</p>
       @else
        <table class="table" style="font-size: .9em;">
          <thead>
            <tr>
              <th>Month</th>
              <th>Requester Name</th>
              <th>Client</th>
              <th>Number</th>
              <th>Status</th>
              <th>Question Count</th>
              <th>Type</th>
              <th>Complexity</th>
              <th>Department</th>
              <th>Notes</th>
              <th>QA Name</th>
              <th>Hrs. Spent</th>
              <th># of Changes</th>
              <th>Hrs. On Changes</th>
              <th>OT Hours</th>
            </tr>
          </thead>

          <thead>
            @foreach($projects as $p)
              <tr>
                <td>{{ $p->requested_month  }}</td>
                <td>{{ $p->requester_name }}</td>
                <td>{{ $p->client_name }}</td>
                <td>{{ $p->project_number }}</td>
                <td>{{ $p->project_status }}</td>
                <td>{{ $p->question_count }}</td>
                <td>{{ $p->request_type }}</td>
                <td>{{ $p->complexity }}</td>
                <td>{{ $p->department }}</td>
                <td>{{ $p->notes }}</td>
                <td>{{ $p->qa_name }}</td>
                <td>{{ $p->hours_spent }}</td>
                <td>{{ $p->number_of_changes  }}</td>
                <td>{{ $p->hours_on_changes }}</td>
                <td>{{ $p->ot_hours }}</td>
                <td><a href="#">Edit</a></td>
                <td><a href="#">Delete</a></td>
              </tr>


            @endforeach
          </thead>
        </table>

        @endif
      </div>

    </div>

</div><!-- /col-lg-12 -->
 </div><!-- / row -->

@stop