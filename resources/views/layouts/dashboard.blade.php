<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>
    @yield('title')
  </title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/v4-shims.min.css') }}">

  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!--Lightbox CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="{{asset('plugins/fullcalendar/main.min.css') }}">
  <link rel="stylesheet" href="{{asset('plugins/fullcalendar-daygrid/main.min.css') }}">
  <link rel="stylesheet" href="{{asset('plugins/fullcalendar-timegrid/main.min.css') }}">
  <link rel="stylesheet" href="{{asset('plugins/fullcalendar-bootstrap/main.min.css') }}">
  <!-- Toastr -->
  {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" type="text/css">--}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <div class="container-fluid">

      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <a class="navbar-brand" href="#"> @yield('title')</a>

      </ul>


      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown" id="markasread" onclick="markNotificationAsRead()">
      <a class="nav-link" data-toggle="dropdown" href="#">
      <i class="far fa-bell"></i>
      <span class="badge badge-warning navbar-badge">{{count(auth()->user()->unreadNotifications)}}</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="max_width:400px">
      <span class="dropdown-item dropdown-header">Notifications</span>
      <div class="dropdown-divider"></div>

            @forelse( auth()->user()->unreadNotifications as $notification)
              @include('partials.notification.'.snake_case(class_basename($notification->type)))
                @empty
                  <a href="#" class="dropdown-item">No unread notifications</a>
            @endforelse

      <div class="dropdown-divider"></div>

      </div>
      </li>
      <!-- Authentication Links -->
        @guest
          <li><a href="{{ route('login') }}">Login</a></li>
          <li><a href="{{ route('register') }}">Register</a></li>
        @else
          <li class="nav-item dropdown">
            <a href="#" class="nav-link" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
              <i class="far fa-user"></i>
              {{ Auth::user()->name. ' '.Auth::user()->lastname }} <span class="caret"></span>
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
    </div>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('home')}}" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
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
      <nav class="mt-2" id="sidebar">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{url('/home')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('projects')}}" class="nav-link">
              <i class="nav-icon fas fa-briefcase"></i>
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
          {{--TODO: FIX CALENDAAR AND HOW TO ADD EVENTS USING LOCAL STORAGE--}}
          {{--<li class="nav-item" >--}}
          {{--<a href="{{url('calendar')}}" class="nav-link">--}}
          {{--<i class="nav-icon fas fa-calendar-alt"></i>--}}
          {{--<p>--}}
          {{--My Calendar--}}
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
          <li>
          {{--<li class="nav-header"></li>--}}

          {{--<li class="nav-item">--}}
            {{--<a href="{{url('help')}}" class="nav-link">--}}
              {{--<i class="nav-icon fas fa-question-circle"></i>--}}
              {{--<p>--}}
                {{--Help--}}
              {{--</p>--}}
            {{--</a>--}}
          {{--</li>--}}
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content">
    @include('partials.errors')
    @include('partials.success')

    @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href=url{{'/home'}}>BugTraq.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!--jQuery UI -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>

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
<!-- CALENDAR SCRIPTS -->
<!-- fullCalendar 2.2.5 -->
<script src="{{ asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('plugins/fullcalendar/main.min.js')}}"></script>
<script src="{{ asset('plugins/fullcalendar-daygrid/main.min.js')}}"></script>
<script src="{{ asset('plugins/fullcalendar-timegrid/main.min.js')}}"></script>
<script src="{{ asset('plugins/fullcalendar-interaction/main.min.js')}}"></script>
<script src="{{ asset('plugins/fullcalendar-bootstrap/main.min.js')}}"></script>
<!-- Notifications -->
<script src="{{ asset('js/main.js') }}"></script>
<!-- Toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>

@yield('scripts')
</body>
</html>
