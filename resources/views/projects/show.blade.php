@extends('layouts.dashboard')
@section('title')
    Projects | BugTraq
    @endsection

@section('content')

    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-12">
                <div class="card" style="margin-top: 3rem;
                margin-left: 2rem;
                margin-right: 2rem;">
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