@extends('layouts.dashboard')
@section('title')
    Projects | BugTraq
    @endsection

@section('content')

    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-12">
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
                </div>
        </div>

        <div class="container">
            <div class="row" style="background: white; margin-left: 3rem; margin-right: 3rem">
                <div class="col-lg-10 col-md-9 col-sm-9">
                    <h4 class="card-title"> List Of Bugs</h4>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-3">
                    <a href="/bugs/create/{{$project->id}}" class="pull-right btn btn-primary btn-sm ">Report Bug</a>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                        <th>
                            Name
                        </th>

                        <th>
                            Type
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
                                <td class="text-right">{{$bugs->created_at}}</td>
                                <td class="text-right">{{$bugs->updated_at}}</td>
                                <td>{{$bugs->status}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
        </div>
    </div>
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