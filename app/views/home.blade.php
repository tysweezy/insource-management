@extends('layouts.default')

@section('content')
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Project Activity</h1>


                     @foreach($users as $user)

                      <div class="overview-panel col-lg-12">

                      <a href="/profile/{{$user->username}}">

                       <img class="img-circle" src="//www.gravatar.com/avatar/{{ md5($user->email)  }}?s=65" alt="{{ $user->username  }}"/>
                      </a>
                       <a href="/profile/{{$user->username}}" class="users-name">{{ $user->first_name }} {{ $user->last_name }}</a>

                       <!-- add logic -->
                       @if($user->assigned_task_count < 5)

                          <span class="available">Available</span>

                       @else

                         <span class="booked">Fully Booked</span>

                       @endif

                        <div class="overview-actions pull-right">

                         @if(Auth::user()->hasRole('admin'))
                          <a href="" class="btn button-green">Assign Project</a>
                          @endif
                          <a href="/user/{{$user->username}}/projects" class="btn button-blue">View Projects</a>
                        </div>
                      </div>


                     @endforeach

                  {{ $users->links() }}


            </div> <!-- /row -->
@stop