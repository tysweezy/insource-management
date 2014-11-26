@extends('layouts.default')

@section('content')

 <div class="row">
    <div class="col-lg-12">
       <h1 class="page-header">Edit QA: {{ $user->first_name }} {{ $user->last_name }}</h1>

       {{ Form::model($user, ['route' => array('admin-user-edit', $user->id)]) }}


         {{ Form::label('shift_hours', 'Shift Hours') }}
         {{ Form::text('shift_hours', null, ['class' => 'form-control']) }}

         <br/>

         {{ Form::submit('Update User', ['class' => 'btn btn-primary']) }}

       {{ Form::close() }}
    </div>
 </div><!-- /row -->

@stop