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

     {{ Form::open()  }}

       <div class="input-group">
           {{ Form::label('user', 'User') }}

          <select name="user" id="user" class="form-control">

           @foreach($users as $u)
            <option value="{{ $u }}">{{ $u }}</option>
           @endforeach
          </select>
       </div>

     <div class="input-group">
       {{ Form::label('project', 'Project')  }}
       <select name="project" id="project" class="form-control">
          @foreach($projects as $p)
            <option value="{{ $p }}">{{ $p  }}</option>
          @endforeach
       </select>
     </div>

     <br/>

     <div class="input-group">
       {{ Form::submit('Assign Project', array('class' => 'btn btn-primary'))  }}
     </div>

     {{ Form::close()   }}

  </div>
 </div>

@stop