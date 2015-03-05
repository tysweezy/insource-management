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
    <a href="/excel/qa/export/" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export QA Data</a>
    <a href="/excel/project/export/" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export Project Data</a>


   </div>

    <ul class="nav nav-tabs">
       <li class="active"><a href="#qa" data-toggle="tab">QAs</a></li>
       <li><a href="#projects" data-toggle="tab">Projects</a></li>

    </ul>


    <div class="tab-content">
      <div class="tab-pane active in" id="qa">
        <table class="table table-striped" id="qa-table">
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
                <td>{{ count($u->projects) }}</td>
                <td>{{ $u->shift_hours }}</td>
                <td><a href="admin/user/{{$u->id}}/edit" class="btn btn-warning">Edit</a></td>

              </tr>

            @endforeach
          </thead>
        </table>

        @endif
      </div>


      <div class="tab-pane" id="projects">

      <script type="text/javascript">

            function deleteProject(id) {
              var confirmDelete = confirm('Are you sure you want to delete this project? You will not be able to recover this.');

              if (confirmDelete) {

                $.ajax({
                  url: 'project/'+id,
                  type: 'DELETE',
                  success: function(result) {

                    
                  }
                });

              alert('project deleted');
              window.location.reload();

            }
          }

  </script>


       @if ($projects->count() == 0)
         <br/><p>Not a single project exists. You can create one by clicking the Create Project button.</p>
       @else
        <table class="table table-striped" style="font-size: .9em;" id="project-table">
          <thead>
            <tr>
              <th>Month</th>
              <th>Requester Name</th>
              <th>Client</th>
              <th>Number</th>
              <th>Status</th>
              <th>Type</th>
              <th>Complexity</th>
              <th>Department</th>


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
                <td>{{ $p->request_type }}</td>
                <td>{{ $p->complexity }}</td>
                <td>{{ $p->department }}</td>

                <td><a href="/project/{{ $p->id }}/edit">Edit</a></td>
                <td><a class="btn btn-xs btn-danger" data-method="delete" onclick="deleteProject({{ $p->id }})"  href="javascript:void(0)">Delete</a></td>
                <td><a href="">More Info</a></td>
              </tr>

            @endforeach
          </thead>
        </table>
             {{ $projects->links() }}
        @endif
      </div>

    </div>

</div><!-- /col-lg-12 -->
 </div><!-- / row -->

@stop