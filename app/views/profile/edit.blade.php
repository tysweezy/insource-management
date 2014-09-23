@extends('layouts.default')

@section('content')

 <div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Edit Profile</h1>

        @if(Session::has('global'))
          {{ Session::get('global') }}

          <br />
        @endif

        <ul>
          @foreach($errors->all() as $error)
            <li class="bg-danger">{{ $error }}</li>
          @endforeach
        </ul>

    <!-- Update Form -->
    {{ Form::open() }}

      <div class="form-group">
       {{ Form::label('username', 'Username') }}
       {{ Form::text('username', '', array('class' => 'form-control', 'placeholder' => $user->username)) }}
      </div>

      <div class="form-group">
       {{ Form::label('job_title', 'Job Title') }}
       {{ Form::text('job_title', '', array('class' => 'form-control', 'placeholder' => $user->job_title)) }}
      </div>


      <div class="form-group">
        {{ Form::label('profile_image', 'Add/Change Profile Image') }}
        {{ Form::file('profile_image') }}
      </div>

      {{ Form::submit('Update Profile', array('class' => 'btn btn-primary')) }}
    {{ Form::close() }}

  </div>
 </div>

@stop