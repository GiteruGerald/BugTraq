@extends('layouts.master')
@section('content')


    <main role="main">
        <div class="col-md-9 col-lg-9 col-sm-9 pull-left">


            <section class="well well-lg">
                <div class="container-fluid">
                    <h1 class="jumbotron-heading">{{$project->pj_name}}</h1>
                    <p class="lead text-muted">{{$project->pj_description}}</p>
                </div>
            </section>

        </div>
        <!--Beginning of sidebar-->
        <div class="col-sm-3 col-md-3 col-lg-3 pull-right">
                <p>Hello Sidebar</p>
        </div>
    </main>

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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/docs/4.2/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-zDnhMsjVZfS3hiP7oCBRmfjkQC4fzxVxFhBx8Hkz2aZX8gEvA/jsP3eXRCvzTofP" crossorigin="anonymous"></script>

@endsection