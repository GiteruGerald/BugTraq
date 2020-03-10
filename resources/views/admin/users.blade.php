@extends('layouts.master')

@section('title')
    Users | Admin
@endsection


@section('content')
    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-12">
                <div class="card" style="margin: 2rem;">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9">
                                <h4 class="card-title"> List Of Users</h4></div>
                            <div class="col-md-3">
                                <a class="pull-right btn btn-primary btn-sm" href="/users/create">Create new </a></div>
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
                                    Email
                                </th>
                                <th>
                                    Employee ID
                                </th>
                                <th>
                                    Department
                                </th>
                                <th>
                                    Post
                                </th>
                                <th>
                                    Contact Phone
                                </th>
                                <th class="text-right">
                                    Joining Date
                                </th>
                                <th width="180px">
                                    Action
                                </th>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->emp_id}}</td>
                                        <td>{{$user->dept}}</td>
                                        <td>{{$user->user_group}}</td>
                                        <td>{{$user->phone_no}}</td>
                                        <td class="text-right">{{$user->created_at}}</td>
                                        <td>
                                            <a class="btn btn-sm btn-success" href="{{route('users.show',$user->id)}}">Show</a>
                                            <a class="btn btn-sm btn-warning" href="{{route('users.edit',$user->id)}}">Edit</a>
                                            <a class="btn btn-sm btn-danger" href="#"
                                               onclick="
                                                    var result=confirm('Are you sure you want to delete this User?');
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
@endsection

@section('scripts')

@endsection