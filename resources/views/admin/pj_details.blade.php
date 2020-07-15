@extends('layouts.master')
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
                                        <th>
                                            Issued by
                                        </th>

                                        <th>
                                            Dev Assigned
                                        </th>
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
                                                <td>{{$bugs->reporter}}</td>

                                                <td>{{$bugs->assigned}}</td>


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
                        <h4>Actions</h4>
                        <ol class="list-unstyled">

                        <li>
                            <i class="fa fa-power-off" aria-hidden="true"></i>
                            <a href="#"
                               onclick="
                        var result=confirm('Are you sure you wish to delete this Project?');
                            if(result){
                                event.preventDefault();
                                document.getElementById('delete-form').submit();

                       }
                            "
                            >
                                Delete
                            </a>
                            <form id="delete-form" action="{{route('admin.projects.destroy',$project->id) }}"
                                  method="POST" style="display:none;">
                                <input type="hidden" name="_method" value="delete">
                                {{csrf_field()}}
                            </form>
                        </li>
                        </ol>
                        <br>
                        <h4>Team Members</h4>
                        <ol class="list-unstyled">
                            @foreach($project->users as $tester)
                                <li><a href="{{url('admin/user_details/'.$tester->id)}}">{{$tester->email}}</a> </li>
                            @endforeach
                        </ol>
                    </div>


                </div><!--end of sidebar-->
            </div>
        </div><!-- end of major row-->

    </div>

@endsection
@section('scripts')
    <!-- <script src="../../assets/demo/demo.js"></script> -->

    <script src="../../../public/plugins/jquery/jquery.min.js"></script>
@endsection