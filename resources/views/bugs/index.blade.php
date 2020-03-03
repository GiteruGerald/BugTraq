@extends('layouts.dashboard')

@section('title')
    Bugs | BugTraq
@endsection


@section('content')
    <div class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-9">
                            <h4 class="card-title"> All Bugs</h4></div>
                    </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>
                                Id
                            </th>
                            <th>
                                Priority
                            </th>
                            <th>
                                Bug
                            </th>

                            <th>
                                Created
                            </th>
                            <th>
                                User
                            </th>
                            <th>
                                Project
                            </th>
                            <th>
                                Due
                            </th>

                            <th class="text-right">
                                Status
                            </th>
                            </thead>
                            <tbody>
                            @foreach($bugs as $bug)
                                <tr>
                                    <td><a href="/bugs/{{$bug->id}}" >{{$bug->pj_name}}</a></td>
                                    <td>{{$bug->pj_type}}</td>
                                    <td>0</td>
                                    <td class="text-right">{{$bug->created_at}}</td>
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
    </div>
@endsection

@section('scripts')

@endsection