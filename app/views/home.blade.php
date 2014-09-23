@extends('layouts.default')

@section('content')
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Projects Overview</h1>

                  

                
                  
                    @foreach($user as $u)
                     <!-- pull in user data (it works) -->
                      <!-- <p>{{ $u->email }}</p> -->
                    @endforeach
                  
             
                </div>
                <!-- /.col-lg-12 -->
            </div> <!-- /row -->
@stop