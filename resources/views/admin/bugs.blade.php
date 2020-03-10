@extends('layouts.master')

@section('title')
    Bugs | Admin
@endsection


@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9">
                                <h4 class="card-title"> List of Bugs</h4></div>
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
                                    <th width="180px">
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
                                                <a class="btn btn-sm btn-warning" href="{{route('bugs.edit',$bug->id)}}">Edit</a>
                                                <a class="btn btn-sm btn-danger" href="#"
                                                   onclick="
                                                    var result=confirm('Are you sure you want to delete this Bug?');
                                                        if (result){
                                                            event.preventDefault();
                                                            document.getElementById('delete-form').submit();
                                                        } ">
                                                    Delete</a>
                                                <form id="delete-form" action="" method="post" style="display: none">
                                                    <input type="hidden" name="_method" value="delete">
                                                    {{csrf_field()}}
                                                </form>
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
    </div>
@endsection

@section('scripts')

@endsection