@extends('layouts.master')
@section('title')
    Admin Dashboard
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-11">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    {{--You are logged in as <strong>{{ Auth::guard('admin')->user()->user_group }}</strong>!--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-gradient-primary">
                            <div class="inner">
                                <h3>{{App\Project::all()->count()}}</h3>

                                <p>Projects</p>

                            </div>
                            <div class="icon">
                                <i class="ion ion-briefcase"></i>
                            </div>
                            <a href="/admin/projects" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>

                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-dark">
                            <div class="inner">
                                <h3>{{count(App\Bug::all()->toArray())}}</h3>

                                <p>Bugs Reported</p>

                            </div>
                            <div class="icon">
                                <i class="ion ion-bug"></i>
                            </div>
                            <a href="/admin/bugs" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-gradient-red">
                            <div class="inner">
                                <h3>{{count(App\User::all())}}</h3>
                                <p>Users</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="/admin/users" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

                        </div>
                    </div>



                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-chart-pie mr-1"></i>
                                    Bug Status Distribution
                                </h3>

                            </div><!-- /.card-header -->
                            <div class="card-body">
                                {!! $chart->container() !!}
                            </div><!-- /.card-body -->
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-chart-pie mr-1"></i>
                                    Projects Type Distribution
                                </h3>

                            </div><!-- /.card-header -->
                            <div class="card-body">
                                {!! $pj_chart->container() !!}
                            </div><!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {!! $chart->script() !!}
    {!! $pj_chart->script() !!}

@endsection