<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Insource Management</title>
  {{ HTML::style('css/bootstrap.css') }}

  {{ HTML::style('css/plugins/metisMenu/metisMenu.min.css') }}

  {{ HTML::style('css/sb-admin-2.css') }}

  {{ HTML::style('font-awesome-4.1.0/css/font-awesome.min.css') }}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
  <div id="wrapper">
        <!-- Navigation -->
        <nav id="main-top" class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Insource Management</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

            <!-- /.dropdown -->


                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <!--<i class="fa fa-user fa-fw"></i>-->
                         <img class="img-circle" src="//www.gravatar.com/avatar/{{ md5(Auth::user()->email)  }}?s=25" alt="{{ Auth::user()->username }}"/>
                         {{ e(Auth::user()->username) }}  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{ URL::route('profile-user', [Auth::user()->username]) }}"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="{{ URL::route('profile-edit', [Auth::user()->username]) }} "><i class="fa fa-gear fa-fw"></i> Edit Profile</a>
                        </li>
                        <li>
                          <a href="{{ URL::route('account-change-password') }}"><i class="fa fa-key"></i> Change Password</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ URL::route('account-logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" id="main-search" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button id="searchButton" class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a class="active" href="/"><i class="fa fa-dashboard fa-fw"></i> Projects Overview</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts</a>

                        </li>
                        <li>
                            <a href=""><i class="fa fa-table fa-fw"></i> Caldendar</a>
                        </li>

                        @if (Auth::user()->hasRole('admin'))

                           <li>
                             <a href="/admin"><i class="fa fa-institution"></i> Admin Panel</a>
                           </li>

                        @endif

                        <!--<li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="blank.html">Blank Page</a>
                                </li>
                                <li>
                                    <a href="login.html">Login Page</a>
                                </li>
                            </ul>

                        </li>-->
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

<div id="page-wrapper">

  @if(Session::has('global'))
    {{ Session::get('global') }}

    <br />
  @endif

  @yield('content')
</div><!-- /page-wrapper -->


</div><!-- /wrapper -->

{{ HTML::script('js/jquery-1.11.0.js') }}

{{ HTML::script('js/bootstrap.min.js') }}

{{ HTML::script('js/plugins/metisMenu/metisMenu.min.js') }}

{{ HTML::script('js/sb-admin-2.js') }}

</body>
</html>