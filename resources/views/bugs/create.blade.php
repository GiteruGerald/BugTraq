@extends('layouts.dashboard')
@section('content')

    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9">
                                <h4 class="card-title">Report New Bug</h4>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="row">
                        <div class="col-md-7">
                            <form action ="{{route('bugs.store')}}" method="post">
                                {{csrf_field() }}
                                <div class="card-body">
                                    @if($projects == null)
                                        <input type="hidden" name="project_id"
                                               class="form-control"
                                               value="{{$project_id}}"/>
                                    @endif

                                    <div class="form-group">
                                        <label for="Title">Bug Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Enter Title" required>
                                    </div>
                                        <div>
                                        @if($projects != null)

                                            <div class="form-group">
                                                <label for="projectName">Select Project</label>

                                                    <select name="project_name" class="form-control">

                                                        @foreach($projects as $project)
                                                            <option value="{{$project->id}}">
                                                                {{$project->pj_name}}
                                                            </option>
                                                        @endforeach
                                                             </select>
                                                     </div>
                                                    @endif
                                        </div>
                                    <div class="form-group">
                                        <label for="bugType">Select TYPE</label>
                                        <select class="form-control" name="bug_type">

                                            <option>Functional</option>
                                            <option>Communication
                                            <option>Missing Commands</option>
                                            <option>Syntactic</option>
                                            <option>Error handling</option>
                                            <option>Calculation</option>
                                            <option>Control flow</option>


                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="Assigned">Assign To:</label>
                                        <input type="text" class="form-control" name="assigned" placeholder="Enter name">
                                    </div>
                                    <div class="form-group">
                                        <label for="bugType">Select Priority</label>
                                        <select class="form-control" name="priority">
                                            <option>Major</option>
                                            <option>Medium</option>
                                            <option>Minor</option>
                                        </select>
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="due_date" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                    </div>
                                    <div class="form-group">
                                        <label>Bug Description</label>
                                        <textarea class="form-control" rows="4" name="description" placeholder="Enter ... " required></textarea>
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