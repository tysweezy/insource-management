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
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        {{ Form::open() }}
                            <fieldset>
                                <div class="form-group">
                                    <!-- <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus> -->

                                    {{ Form::email('email', '', array('class' => 'form-control email', 'placeholder' => 'Email')) }}
                                </div>
                                <div class="form-group">
                                    <!--<input class="form-control" placeholder="Password" name="password" type="password" value="">-->

                                    {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password', 'value' => '')) }}
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <!-- <input name="remember" type="checkbox" value="Remember Me">Remember Me-->

                                        {{ Form::checkbox('remember') }} Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->

                                {{ Form::submit('Login', array('class' => 'btn btn-lg btn-success btn-block'))  }}
                            </fieldset>
                        {{ Form::close() }}
                    </div>

                    <a href="{{ URL::route('account-register') }} " style="margin-left: 15%;">Sign up for an account</a>
                      |
                    <a href="{{ URL::route('account-forgot-password') }}">Forgot Password</a>
                </div>
            </div>
        </div>



@stop