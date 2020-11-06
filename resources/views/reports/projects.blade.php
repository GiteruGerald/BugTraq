@extends('layouts.dashboard')

@section('title')
    Reports
@endsection


@section('content')
    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-12">
                <div class="card" style="margin: 2rem;">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9">

                                    <h4 class="card-title">Projects Reports</h4>
                            </div>
                            <div class="col-md-3">
                                <a class="pull-right btn btn-primary btn-sm" href="{{url('dynamic_pdf/pdf')}}">Export to PDF </a>
                            </div>
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
                                    {{--TODO : Check this count function huh--}}
                                    <td> {{count($project->bugs->toArray())}} </td>
                                    <td>{{$project->owner}}</td>
                                    <td class="text-right">{{$project->created_at}}</td>
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