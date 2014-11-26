@extends('layouts.default')

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Your Status</h1>

      {{ Form::model($user, ['route' => array('post-status', $user->id)]) }}

        {{ Form::label('status', 'Status')  }}
        {{ Form::text('status', null, ['class' => 'form-control']) }}

        <br/>

        {{ Form::submit('Add Status', ['class' => 'btn btn-primary']) }}

      {{ Form::close() }}
    </div>
  </div>
@stop