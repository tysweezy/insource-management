@extends('layouts.default')

@section('content')
             <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><img class="img-circle" src="//www.gravatar.com/avatar/{{ md5(Auth::user()->email)  }}" alt="{{ Auth::user()->username  }}"/>

                       {{ $user->first_name }} {{ $user->last_name }}</h1>

                </div>
                <!-- /.col-lg-12 -->
            </div>
@stop