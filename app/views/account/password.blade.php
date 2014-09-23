@extends('layouts.account')

@section('form')

     <div class="row">
            <div class="col-md-4 col-md-offset-4">

                   @if(Session::has('global'))
                      {{ Session::get('global') }}

                    <br />
                   @endif

                    <ul>
                        @foreach($errors->all() as $error)
                         <li class="bg-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Change Password  <span style="font-size: 12px; float:right;"><a href="/">&#8592; Back to Dashboard</a></span></h3>
                    </div>
                    <div class="panel-body">
                        {{ Form::open() }}
                            <fieldset>
                                <div class="form-group">
                                    <!-- <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus> -->

                                    {{ Form::password('old_password',  array('class' => 'form-control', 'placeholder' => 'Old Password')) }}
                                </div>
                                <div class="form-group">
                                    <!--<input class="form-control" placeholder="Password" name="password" type="password" value="">-->

                                    {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'New Password', 'value' => '')) }}
                                </div>

                                <div class="form-group">
                                    <!--<input class="form-control" placeholder="Password" name="password" type="password" value="">-->

                                    {{ Form::password('password_repeat', array('class' => 'form-control', 'placeholder' => 'Repeat Password', 'value' => '')) }}
                                </div>
                                <!-- Change this to a button or input when using this as a form -->

                                {{ Form::submit('Change Password', array('class' => 'btn btn-lg btn-success btn-block'))  }}
                            </fieldset>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>


@stop