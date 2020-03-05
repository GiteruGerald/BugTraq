@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-header">
            <h1 class="m-0 text-dark">Admin Dashboard</h1>
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

                                        You are logged in as <strong>{{ Auth::guard('admin')->user()->user_group }}</strong>!
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</div>
@endsection
