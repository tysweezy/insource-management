@extends('layouts.default')

@section('content')

 <div class="row">
    <div class="col-lg-12">
       <h1 class="page-header">Edit QA: {{ $user->first_name }} {{ $user->last_name }}</h1>

       {{ Form::model($user, ['route' => array('admin-user-edit', $user->id)]) }}


         {{ Form::label('shift_hours', 'Shift Hours') }}

		<select name="shift_hours" class="form-control">
			<option value="">---</option>
			<option value="8am - 5pm">Normal Shift (8am - 5pm)</option>
			<option value="2:30pm - 11:30pm">Night Shift (2:30pm - 11:30pm)</option>
			<option value="1am - 10am">UK Shift (1am - 10am)</option>
		</select>

         <!--{{ Form::text('shift_hours', null, ['class' => 'form-control']) }}-->

         <br/>

         {{ Form::submit('Update User', ['class' => 'btn btn-primary']) }}

       {{ Form::close() }}
    </div>
 </div><!-- /row -->

@stop