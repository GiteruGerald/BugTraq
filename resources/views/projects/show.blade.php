@extends('layouts.dashboard')
@section('title')
    Projects | BugTraq
    @endsection

@section('content')

    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-9 col-lg-9 col-sm-9 pull-left">
                <div class="card" style="margin: 3rem;">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9">
                                <h4 class="card-title">{{$project->pj_name}}</h4>
                           </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                           <div class="card-body">
                                <p class="lead text-muted">{{$project->pj_description}}</p>
                           </div>
                        </div>
                    </div>
                    </div>

                <div class="container">
                    <div class="row" style="background: white; margin-left: 3rem; margin-right: 3rem">
                        <div class="col-lg-10 col-md-9 col-sm-9">
                            <h4 class="card-title"> Bugs Reported</h4>
                        </div>
                        @if(Auth::user()->user_group =='Test Engineer')
                        <div class="col-lg-2 col-md-3 col-sm-3">
                            <a href="/bugs/create/{{$project->id}}" class="pull-right btn btn-primary btn-sm ">Report Bug</a>
                        </div>
                        @endif
                        @if(count($project->bugs) < 1)
                            <p> No reported bugs found</p>
                        @else
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>
                                    Name
                                </th>

                                <th>
                                    Type
                                </th>
                                @if(Auth::user()->user_group=='Manager'||'Developer')
                                    <th>
                                        Issued by
                                    </th>
                                    @endif
                                @if(Auth::user()->user_group=='Manager'||'Test Engineer')
                                    <th>
                                        Dev Assigned
                                    </th>
                                    @endif
                                <th class="text-right">
                                    Reported On
                                </th>
                                <th class="text-right">
                                    Date Modified
                                </th>
                                <th>
                                    Status
                                </th>
                                </thead>
                                <tbody>
                                @foreach($project->bugs as $bugs)
                                    <tr>
                                        <td><a href="/bugs/{{$bugs->id}}" >{{$bugs->title}}</a></td>
                                        <td>{{$bugs->type}}</td>
                                        @if(Auth::user()->user_group=='Manager'||'Developer')
                                            <td>{{$bugs->reporter}}</td>
                                        @endif
                                            @if(Auth::user()->user_group=='Manager'||'Test Engineer')
                                            <td>{{$bugs->assigned}}</td>
                                        @endif

                                        <td class="text-right">{{$bugs->created_at}}</td>
                                        <td class="text-right">{{$bugs->updated_at}}</td>
                                        <td>{{$bugs->status}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif
                    </div>
                </div>
                </div>



            <!--Start of Sidebar-->
            <div class="col-sm-3 col-md-3 col-lg-3 pr-4 pt-5 pull-right">
                <div class="sidebar-module sidebar-module-inset">
                    <div class="sidebar-module">
                        @if(Auth::user()->user_group=='Manager')
                        <h4>Actions</h4>
                        <ol class="list-unstyled">
                            <li><a href="/projects/{{$project->id}}/edit"><i class="fas fa-edit"></i>Edit</a></li>
                            <li><a href="/projects/create"><i class="fas fa-briefcase"></i>Create new project</a></li>
                            <li><a href="#add-tester" data-toggle="modal" data-target="#add-tester">
                                    <i class="fas fa-id-badge"></i>Assign Tester</a></li>


                            <br/>
                            @if($project->user_id == Auth::user()->id)
                                <li>
                                    <i class="fa fa-power-off" aria-hidden="true"></i>
                                    <a href="#"
                                       onclick="
                        var result=confirm('Are you sure yoo wish to delete this Project?');
                            if(result){
                                event.preventDefault();
                                document.getElementById('delete-form').submit();

                       }
                            "
                                    >
                                        Delete
                                    </a>
                                    <form id="delete-form" action="{{route('projects.destroy',[$project->id]) }}"
                                          method="POST" style="display:none;">
                                        <input type="hidden" name="_method" value="delete">
                                        {{csrf_field()}}
                                    </form>
                                </li>

                            @endif

                        </ol>
                        <hr/>
                        <br/>
                        @endif
                        <h4>Team Members</h4>
                        <ol class="list-unstyled">
                            @foreach($project->users as $tester)
                            <li><a href="#">{{$tester->email}}</a> </li>
                            @endforeach
                        </ol>
                    </div>


                </div><!--end of sidebar-->
            </div>
        </div><!-- end of major row-->

        <div class="modal fade" id="add-tester">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Assign Tester for {{$project->pj_name}}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('projects.addtester')}}" method="POST">
                            {{csrf_field()}}
                            <input type="hidden" class="form-control" name="project_id" value="{{$project->id}}">
                            <div class="form-group">
                                <label>Select Test Engineer(s)</label>
                                            <select multiple class="form-control" name="email" >
                                               @foreach($testers as $tester)
                                                    <option value="{{$tester->email}}">{{$tester->name.' '.$tester->lastname}}</option>
                                                   @endforeach
                                            </select>
                                        </div>
                            <hr>
                            <button type="submit" class="btn btn-primary btn-sm">Add Tester</button>
                        </form>
                    </div>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

    </div><!--end of content wrapper -->
    <!--TODO:Check this go to top page-->
    <!--   <footer class="text-muted">
            <div class="container">
                <p class="float-center">
                    <a href="#">Back to top</a>
                </p>
                <p>Album example is © Bootstrap, but please download and customize it for yourself!</p>
                <p>New to Bootstrap? <a href="https://getbootstrap.com/">Visit the homepage</a> or read our <a href="/docs/4.2/getting-started/introduction/">getting started guide</a>.</p>
            </div>
        </footer>
    -->

@endsection
@section('scripts')
   <!-- <script src="../../assets/demo/demo.js"></script> -->

    <script src="../../../public/plugins/jquery/jquery.min.js"></script>
@endsection