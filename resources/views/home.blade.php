@extends('layouts.dashboard')
@section('title')
   Dashboard
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="card">

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

                                          You are logged in as <strong>{{ Auth::user()->user_group }}</strong>!
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-lg-3 col-xs-6">
                                  <div class="small-box bg-gradient-primary">
                                      <div class="inner">
                                          @if(Auth::user()->user_group == 'Manager')
                                          <h3>{{App\Project::where('user_id', Auth::user()->id)->count()}}</h3>
                                              <p>Total Projects Created</p>

                                          @elseif(Auth::user()->user_group == 'Test Engineer')
                                              <h3>{{count($pj_tester->toArray())}}</h3>
                                              <p>Total Projects Assigned</p>

                                              @elseif(Auth::user()->user_group=='Developer')
                                              <h3>{{count($pj_dev->toArray())}}</h3>
                                              <p>Total Projects Assigned</p>

                                                @endif
                                      </div>
                                      <div class="icon">
                                          <i class="ion ion-bag"></i>
                                      </div>
                                      <a href="{{url('projects')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                  </div>

                              </div>
                              <div class="col-lg-3 col-xs-6">
                                    <div class="small-box bg-dark">
                                          <div class="inner">
                                              @if(Auth::user()->user_group == 'Manager')
                                                  <h3>{{count(App\Bug::all()->toArray())}}</h3>
                                                  <p>Bugs Reported</p>

                                              @elseif(Auth::user()->user_group == 'Test Engineer')
                                                  <h3>{{App\Bug::where('reporter', Auth::user()->name .' '.Auth::user()->lastname)->count()}}</h3>
                                                  <p>Bugs Reported</p>

                                              @elseif(Auth::user()->user_group=='Developer')
                                                  <h3>{{App\Bug::where('assigned',Auth::user()->name.' '.Auth::user()->lastname)->count()}}</h3>
                                                  <p>Bugs Assigned</p>

                                              @endif


                                          </div>
                                          <div class="icon">
                                              <i class="ion ion-bug"></i>
                                          </div>
                                  <a href="{{url('bugs')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                              </div>
                              </div>
                              <div class="col-lg-3 col-xs-6">
                                    <div class="small-box bg-gradient-green">
                                        <div class="inner">
                                            <h3>2</h3>
                                            <p>Reports</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-stats-bars"></i>
                                        </div>
                                        <a href="{{url('project_reports')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

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

    </div>

@endsection
@section('scripts')
    {!! $chart->script() !!}
    {!! $pj_chart->script() !!}

@endsection