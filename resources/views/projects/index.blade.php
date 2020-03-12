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
                                <h4 class="card-title"> List Of Projects</h4></div>
                            <div class="col-md-3">
                            <a class="pull-right btn btn-primary btn-sm" href="/projects/create">Create new </a></div>
                        </div>
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
                                <th>
                                    Issues
                                </th>
                                <th>
                                    Manager
                                </th>
                                <th class="text-right">
                                    Created On
                                </th>
                                <th width="180px">
                                    Action
                                </th>
                                </thead>
                                <tbody>
                                @foreach($projects as $project)
                                    <tr>
                                        <td>{{$project->pj_name}}</td>
                                        <td>{{$project->pj_type}}</td>
                                        {{--TODO : Check this count function--}}
                                        <td>{{$bugCount}}</td>
                                        <td>{{$project->owner}}</td>
                                        <td class="text-right">{{$project->created_at}}</td>
                                        <td>

                                        <a class="btn btn-sm btn-success" href="{{route('projects.show',$project->id)}}">Show</a>
                                        <a class="btn btn-sm btn-warning" href="{{route('projects.edit',$project->id)}}">Edit</a>
                                        </td>
                                    </tr>
                                    @endforeach
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