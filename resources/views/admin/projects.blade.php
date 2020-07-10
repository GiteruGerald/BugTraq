@extends('layouts.master')

@section('title')
    Projects | Admin
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

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>
                                    No.
                                </th>
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
                                        <td><b>{{++$i}}.</b></td>
                                        <td>{{$project->pj_name}}</td>
                                        <td>{{$project->pj_type}}</td>
                                        <td>{{count($project->bugs->toArray())}}</td>
                                        <td>{{$project->owner}}</td>
                                        <td class="text-right">{{$project->created_at}}</td>
                                        <td>
                                                <a class="btn btn-sm btn-success" href="{{url('admin/pj_details/'.$project->id)}}">Show</a>
                                            @if(Auth::guard('admin'))
                                                <a class="btn btn-sm btn-danger" href="#"
                                                   onclick="
                                                    var result=confirm('Are you sure you want to delete this Project({{$project->id}})?');
                                                        if (result){
                                                            event.preventDefault();
                                                            document.getElementById('delete-form').submit();
                                                        } ">
                                                    Delete</a>
                                            <form id="delete-form" action="{{route('projects.destroy',[$project->id]) }}" method="post" style="display: none">
                                                <input type="hidden" name="_method" value="delete">
                                                {{csrf_field()}}
                                            </form>
                                                @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {!! $projects->links() !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')

@endsection