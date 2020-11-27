@extends('layouts.master')
@section('title')
    Bugs | Admin |BugTraq
@endsection

@section('content')

    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-9 col-lg-9 col-sm-9 pull-left">
                <div class="row">
                    <div class="col-12">
                        <div class="card" style="margin-left: 3rem;margin-top: 2rem">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h4 class="card-title"><strong>{{$bug->title}}</strong> :Bug Information</h4>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">

                                        <div class="form-body">


                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="control-label text-right col-md-5">Assigned To:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static"> {{$bug->assigned}} </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="control-label text-right col-md-5">Due On:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static">{{$bug->due_date}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <!--/row-->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="control-label text-right col-md-5">Project:</label>
                                                            <div class="col-md-7">
                                                                @if($bug->projects)
                                                                <p class="form-control-static">{{$bug->projects->pj_name}}</p>
                                                                    @else
                                                                    <p class="form-control-static text-danger">Cannot be retrieved</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            {{--TODO: Reveiw this section please based on authentication--}}
                                                            <label class="control-label text-right col-md-5">Status:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static">{{$bug->status}}</p>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->

                                                </div>
                                                <!--/row-->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="control-label text-right col-md-5">Priority:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static">{{$bug->priority}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="control-label text-right col-md-5">Classification:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static">{{$bug->type}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <!--/row-->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="control-label text-right col-md-5">Created:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static">{{$bug->created_at}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="control-label text-right col-md-5">Updated:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static">{{$bug->updated_at}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="control-label text-right col-md-5">Reported by:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static">{{$bug->reporter}}</p>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <!--/span-->
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="control-label text-right col-md-5">Description:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static">{{$bug->description}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <hr>

                                        </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                &nbsp;

            </div>
            <!--Start of Sidebar-->
            <div class="col-sm-3 col-md-3 col-lg-3 pr-4 pt-5 pull-right">
                <div class="sidebar-module sidebar-module-inset">
                    <div class="sidebar-module">

                        <h4>Actions</h4>
                        <br class="list-unstyled">
                        </br>
                            <li><a href="#" onclick="
                        var  result=confirm('You are about to delete this bug, proceed?')
                            if(result){
                                event.preventDefault();
                                document.getElementById('delete-bug').submit();
                            }


                            ">
                                    <i class="fas fa-trash"></i>Delete Bug
                                </a>
                                <form id="delete-bug" action="{{route('admin.bugs.destroy',$bug->id)}}"
                                      method="POST" style="display:none">
                                    <input type="hidden" name="_method" value="delete">
                                    {{csrf_field()}}
                                </form>
                            </li>
                            <br/>
                        </ol>

                    </div>


                </div><!--end of sidebar-->
            </div>
        </div>




    </div><!-- end of major row-->




    </div><!--end of content wrapper -->

@endsection
@section('scripts')
    <!-- <script src="../../assets/demo/demo.js"></script> -->

    <script src="../../../public/plugins/jquery/jquery.min.js"></script>
@endsection