@extends('layouts.dashboard')

@section('title')
    Bugs | BugTraq
@endsection


@section('content')
    <div class="content-wrapper">

    <div class="row">
        <div class="col-md-12">
            <div class="card" style="margin: 2rem;">
                {!! $chart->container() !!}
            </div>
            <div class="card" style="margin: 2rem;">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-9">
                            @if(Auth::user()->user_group=='Manager')
                            <h4 class="card-title">All Bugs Reported</h4></div>
                                @endif
                        @if(Auth::user()->user_group=='Test Engineer')
                                    <h4 class="card-title">Bugs Reported</h4></div>
                                @endif
                        @if(Auth::user()->user_group=='Developer')
                                    <h4 class="card-title">Bugs Assigned</h4></div>
                                @endif
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
                            <th>
                                Action
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
                                    <td>
                                        <a class="btn btn-sm btn-success" href="{{route('bugs.show',$bug->id)}}">Show</a>
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

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

    {!! $chart->script() !!}
@endsection