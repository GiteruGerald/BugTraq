@extends('layouts.master')
@section('content')


<div class="col-md-9">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Create New Project</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action ="{{route('projects.store')}}" method="post">
            {{csrf_field() }}
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Project Name</label>
                    <input type="text" class="form-control" name="pj_name" placeholder="Enter name" required>
                </div>
                <div class="form-group">
                    <label>Select TYPE</label>
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
                    <textarea class="form-control" rows="3" name="pj_description" placeholder="Enter ..."re\
                    ></textarea>
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <input type="submit" class="btn btn-primary" value="Submit"></input>
            </div>
        </form>
    </div>
</div>
@endsection