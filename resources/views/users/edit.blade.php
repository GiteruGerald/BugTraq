<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>
        User Profile | BugTraq
    </title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <a class="navbar-brand" href="#">User Profile</a>

        </ul>


        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

            <!-- Authentication Links -->
            @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @else
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                        <i class="far fa-user"></i>
                        {{ Auth::user()->name.' '.Auth::user()->lastname }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-sm-right">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                            <div class="media">
                                <div class="media-body">
                                    Logout
                                </div>
                            </div>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{url('home')}}" class="brand-link">
            <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
            <span class="brand-text font-weight-light">BUG-TRAQ</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="../../uploads/avatars/{{Auth::user()->avatar}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{Auth::user()->name.' '.Auth::user()->lastname}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{url('/home')}}" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Home
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('projects')}}" class="nav-link">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p>
                                Projects
                            </p>
                            @if(Auth::user()->user_group =='Manager')
                                <span class="badge badge-info right">{{\App\Project::where('user_id', Auth::user()->id)->count()}}</span>

                            @endif

                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('bugs')}}" class="nav-link">
                            <i class="nav-icon fas fa-bug"></i>
                            <p>
                                Bugs
                            </p>
                        </a>
                    </li>
                    {{--<li class="nav-item" >--}}
                        {{--<a href="{{url('calendar')}}" class="nav-link">--}}
                            {{--<i class="nav-icon fas fa-calendar-alt"></i>--}}
                            {{--<p>--}}
                                {{--My Timesheet--}}
                            {{--</p>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Reports & Analysis
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('project_reports')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Project Reports</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('bug_reports')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Bug Reports</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-header">USER</li>
                    <li class="nav-item">
                        <a href="/users/{{Auth::user()->id}}" class="nav-link">
                            <i class="nav-icon fas fa-user-alt"></i>
                            <p>
                                Profile
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="row">

            <div class="col-md-12">
                <div class="card" style="margin: 3rem;">
                    <div class="card-header">
                        <h3 class="title">Edit {{ $user->name }}'s Details</h3>
                    </div>
                    <div class="card-body">

                        <form method="post" action ="{{route('users.update',[Auth::user()->id])}}">
                            {{csrf_field() }}
                            <input type="hidden" name="_method" value="put">
                            <div class="row">
                                <div class="col-md-5 px-3">
                                    <div class="form-group">
                                        <label for="email">First Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="First Name" value="{{$user->name}}">
                                    </div>
                                </div>
                                <div class="col-md-5 px-3">
                                    <div class="form-group">
                                        <label for="email">Last Name</label>
                                        <input type="text" class="form-control" name="lastname" placeholder="Last Name" value="{{$user->lastname}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 px-3">
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="text" class="form-control" name="email" placeholder="Email" value="{{$user->email}}">
                                    </div>
                                </div>

                            </div>
                            <!--TODO : Try adding change password in User Mode-->

                            <div class="row">
                                <div class="col-md-5 px-3">
                                    <div class="form-group">
                                        <label for="phone">Phone No.</label>
                                        <input type="tel" class="form-control" name="phone" placeholder="Contact Phone" value="{{$user->phone_no}}">
                                    </div>
                                </div>
                            </div>
                            <br>
<hr>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-3 px-3">
                                        <input type="submit" class="btn btn-primary btn-sm"
                                               value="Save Changes"/>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div><!--Card Body-->
                </div>
            </div>

        </div>
    </div>

    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2019 <a href=url{{'/home'}}>BugTraq.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0
        </div>
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script type="text/javascript">
    $(document).ready(function () {
        bsCustomFileInput.init();
    });
</script>
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('../dist/js/adminlte.js') }}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('dist/js/demo.js') }}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>

<!-- PAGE SCRIPTS -->
<script src="{{ asset('dist/js/pages/dashboard2.js') }}"></script>
@yield('scripts')
</body>
</html>