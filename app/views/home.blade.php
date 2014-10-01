@extends('layouts.default')

@section('content')
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User/Project Overview</h1>


                     @foreach($users as $user)
                       <img class="img-circle" src="//www.gravatar.com/avatar/{{ md5($user->email)  }}?s=30" alt="{{ $user->username  }}"/>

                       {{ $user->username }}
                     @endforeach

            </div> <!-- /row -->
@stop