@extends('layouts.dashboard')
@section('content')

    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-12">
                <div class="card" style="margin: 3rem;">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9">
                                <h4 class="card-title">Report New Bug for <strong><span class="highlight primary">{{$projects->pj_name}}</span></strong></h4>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="row">
                        <div class="col-md-12">
                            <form action ="{{route('bugs.store')}}" method="post">
                                {{csrf_field() }}
                                <div class="card-body">
                                    @if($projects != null)
                                        <input type="hidden" name="project_id"
                                               class="form-control"
                                               value="{{$project_id}}"/>
                                    @endif
                             <div class="row">
                                        <div class="col-8">
                                            <div class="form-group">
                                                <label for="Title">Bug Title</label>
                                                <input type="text" class="form-control" name="title" placeholder="Enter Title" required>
                                            </div>
                                 </div>
                             </div>


                           <div class="row">
                               <div class="col-5">
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
                               </div>
                               <div class="col-1">
                               </div>
                               <div class="col-5">
                                   <div class="form-group">
                                       <label for="Assigned">Assign To:(Dev)</label>
                                       <select class="form-control" name="assigned" data-placeholder="...">
                                           <option value="">...</option>
                                           @foreach($devs as $dev)
                                               <option value="{{$dev->name.' '.$dev->lastname}}">{{$dev->name.' '.$dev->lastname}}</option>
                                           @endforeach
                                       </select>
                                   </div>
                               </div>
                           </div>
                            <div class="row">
                                <div class="col-5">
                                <div class="form-group">
                                        <label for="bugType">Select Priority</label>
                                        <select class="form-control" name="priority">
                                            <option>Major</option>
                                            <option>Medium</option>
                                            <option>Minor</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-1"></div>
                                <div class="col-5">
                                    <div class="form-group">
                                        <label>Due Date:</label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                              </span>
                                            </div>

                                            <input type="text" name="due_date" class="form-control float-right" id="reservation" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label>Bug Description</label>
                                            <textarea class="form-control" rows="2" name="description" placeholder="Enter ... " required></textarea>
                                        </div>
                                    </div>
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