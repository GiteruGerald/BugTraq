@extends('layouts.dashboard')

@section('title')
    Projects | BugTraq
@endsection


@section('content')
    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-12">
                 <div class="card" style="margin: 2rem;">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9">
                                @if(Auth::user()->user_group=='Manager')
                                    <h4 class="card-title"> Your Projects</h4></div>

                                    <div class="col-md-3">
                                        <a class="pull-right btn btn-primary btn-sm" href="/projects/create">Create new </a></div>
                                     </div>
                                @else
                                    <h4 class="card-title"> Projects Assigned</h4></div>
                                @endif

                </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>
                                    Name
                                </th>

                                <th>
                                    Type
                                </th>
                                @if(Auth::user()->user_group=='Manager')
                                    <th>
                                    Issues
                                </th>
                                    @endif
                                @if(Auth::user()->user_group=='Test Engineer' || Auth::user()->user_group=='Developer')
                                <th>
                                    Manager
                                </th>
                                @endif
                                <th class="text-right">
                                    Created On
                                </th>
                                <th width="180px">
                                    Action
                                </th>
                                </thead>
                                <tbody>
                                @if(count($projects) < 1)
                                    <tr>
                                        <td>No projects found</td>
                                    </tr>
                                @else
                                @foreach($projects as $project)
                                    <tr>
                                        <td>{{$project->pj_name}}</td>
                                        <td>{{$project->pj_type}}</td>
                                    @if(Auth::user()->user_group=='Manager')

                                        <td> {{count($project->bugs->toArray())}} </td>
                                        @endif
                                     @if(Auth::user()->user_group=='Test Engineer' || Auth::user()->user_group=='Developer')
                                        <td>{{$project->owner}}</td>
                                     @endif
                                        <td class="text-right">{{$project->created_at}}</td>
                                        <td>

                                        <a class="btn btn-sm btn-success" href="{{route('projects.show',$project->id)}}">Show</a>
                                            @if(Auth::user()->user_group=='Manager')
                                        <a class="btn btn-sm btn-warning" href="{{route('projects.edit',$project->id)}}">Edit</a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')

@endsection