@extends('layouts.default')

@section('content')

<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Assign Project</h1>

        <ul>
          @foreach($errors->all() as $error)
            <li class="bg-danger">{{ $error }}</li>
          @endforeach
        </ul>

     {{ Form::open(['route' => ['project-assign-post', $user->id]])  }}

       <div class="input-group">
           <strong>User</strong>

           <p>{{ $user->first_name }} {{ $user->last_name }}</p>
       </div>

     <div class="input-group">
       {{ Form::label('project', 'Project')  }}
       <select name="project" id="project" class="form-control">
          @foreach($projects as $p)
            <option value="{{ $p->id }}">{{ $p->client_name  }}</option>
          @endforeach
       </select>
     </div>

     <br/>

    <div class="input-group">
      <label for="deadline">Deadline</label>
      <input class="datepicker form-control" name="deadline">

      
    </div>
    
    <br />

     <div class="input-group">
       {{ Form::submit('Assign Project', array('class' => 'btn btn-primary'))  }}
     </div>

     {{ Form::close()  }}

  </div>
 </div>

@stop