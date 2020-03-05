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
                            <h4 class="card-title"> My Bugs</h4></div>
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
                                Bug Title
                            </th>

                            <th>
                                Created
                            </th>
                            <th>
                                Reporter
                            </th>
                            <th>
                                Dev Assigned
                            </th>
                            <th>
                                Due Date
                            </th>

                            <th class="text-right">
                                Status
                            </th>
                            </thead>
                            <tbody>
                            @foreach($bugs as $bug)
                                <tr>
                                    <td>{{$bug->id}}></td>
                                    <td>{{$bug->priority}}</td>
                                    <td>{{$bug->title}}</td>
                                    <td>{{$bug->created_at}}</td>
                                    <td>{{$bug->reporter}}</td>
                                    <td>{{$bug->assigned}}</td>
                                    <td>{{$bug->due_date}}</td>
                                    <td>{{$bug->status}}</td>
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