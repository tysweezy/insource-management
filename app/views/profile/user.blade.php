@extends('layouts.default')

@section('content')
             <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ $user->first_name }} {{ $user->last_name }}</h1>

                </div>
                <!-- /.col-lg-12 -->
            </div>
@stop