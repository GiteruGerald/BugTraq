@extends('layouts.dashboard')
@section('title')
    {{$bug->title}}| BugTraq
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
                                        <h4 class="card-title">{{$bug->title}}</h4>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <form class="form-horizontal" method="post" action="{{route('bugs.update',[$bug->id])}}">
                                        {{csrf_field() }}
                                        <input type="hidden" name="_method" value="put">
                                        <div class="form-body">
                                            <p style="margin-left: 1rem"><strong>Bug Information</strong></p>

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
                                                                <p class="form-control-static">{{$bug->projects->pj_name}}</p>
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
                                                            <label class="control-label text-right col-md-5">Description:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static">{{$bug->description}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>

                                            </div>
                                            <hr>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                &nbsp;

            </div>

        </div>




    </div><!-- end of major row-->



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