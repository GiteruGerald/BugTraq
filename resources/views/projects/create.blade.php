@extends('layouts.dashboard')
@section('content')

    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-12">
                <div class="card" style="margin: 3rem;">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9">
                                <h4 class="card-title">Create New Project</h4>
                            </div>
                        </div>
                    </div>
                             <!-- /.card-header -->
                        <!-- form start -->
                    <div class="row">
                        <div class="col-12">
                        <form action ="{{route('projects.store')}}" method="post">
                            {{csrf_field() }}
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="inputName">Project Title</label>
                                            <input type="text" class="form-control" name="pj_name" placeholder="Enter name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="owner">Owner</label>
                                            <select class="form-control" name="owner">
                                               @foreach($users as $user)
                                                     <option value="{{$user->name.' '.$user->lastname}}">{{$user->name.' '.$user->lastname}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="projectType">Select Type</label>
                                            <select class="form-control" name="pj_type">

                                                <option>Maintenance</option>
                                                <option>Conversion</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label>Project Description</label>
                                            <textarea class="form-control" rows="2" name="pj_description" placeholder="Enter ... " required></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>


                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection