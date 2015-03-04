@extends('layouts.default')

@section('content')
           <div id="profile">
             <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><img class="img-circle" src="//www.gravatar.com/avatar/{{ md5($user->email)  }}" alt="{{ $user->username  }}"/>

                       {{ $user->first_name }} {{ $user->last_name }}


                     @if($user->status)
                       <span class="profile-status pull-right">"{{ $user->status }}"</span>
                     @endif
                    </h1>

                </div>
                <!-- /.col-lg-12 -->
            </div>


      <!-- basic info row -->
        <div class="row">
          <div class="col-md-4">
             <h4>Assigned Task Count</h4>

             <p id="atc">
               
               
                 {{ count($user->projects) }}
               
             </p>
          </div>


          <div class="col-md-4">
            <h4>Shift Hours</h4>

            @if ($user->shift_hours == 0)
              <p>N/A </p>
            @endif

            <p id="shift">{{ $user->shift_hours }}</p>
          </div>

          <div class="col-md-4">
            <h4>Current Status</h4>

            <p id="work-status">
              @if (count($user->projects) < 5)
                Available
              @else 
                Fully Booked
              @endif
            </p>
          </div>

        </div><!-- /row -->

        <!-- current project row -->
        <div class="row">
          <div class="col-lg-12">


            <h3>Current Projects</h3>

            <table class="table">
              <thead>
                <tr>
                  <th>Project #</th>
                  <th>Client Name</th>
                  <th>Due Date</th>
                  <th>Hrs. On QA</th>
                  <th># of Change Rounds</th>
                  <th>Hrs. Spend on Changes</th>
                  <th>OT Hours</th>
                </tr>
              </thead>

              <thead>
               @foreach($projects as $project)
               
                <tr>
                  <td>{{ $project->project_number }}</td>
                  <td>{{ $project->client_name }}</td>
                  <td>N/A</td>
                  <td>{{ $project->pivot->hours_spent }}</td>
                  <td>{{ $project->pivot->number_of_changes }}</td>
                  <td>{{ $project->pivot->hours_on_changes }}</td>
                  <td>{{ $project->pivot->ot_hours }}</td>
                </tr>
               
               @endforeach
              </thead>
            </table>
          </div>
        </div>
      </div><!-- /profile -->
@stop