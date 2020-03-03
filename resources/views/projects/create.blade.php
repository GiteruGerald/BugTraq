@extends('layouts.dashboard')
@section('content')

    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
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
                        <div class="col-md-7">
                        <form action ="{{route('projects.store')}}" method="post">
                            {{csrf_field() }}
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="inputName">Project Name</label>
                                    <input type="text" class="form-control" name="pj_name" placeholder="Enter name" required>
                                </div>
                                <div class="form-group">
                                    <label for="projectType">Select TYPE</label>
                                    <select class="form-control" name="pj_type">

                                        <option>Maintenance</option>
                                        <option>Conversion</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Project Manager</label>
                                    <input type="text" class="form-control" name="pj_manager" placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                    <label>Project Description</label>
                                    <textarea class="form-control" rows="3" name="pj_description" placeholder="Enter ... " required></textarea>
                                </div>

                            </div>
                            <!-- /.card-body -->

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