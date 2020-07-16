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
                                <!--TODO: Check this route -->
                                <a class="pull-right btn btn-primary btn-sm" href="{{url('user_reg')}}"><i class="fas fa-user-plus"></i> Register New user </a></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>

                                </th>
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
                                    Post
                                </th>
                                <th>
                                    Contact Phone
                                </th>

                                <th width="180px">
                                    Action
                                </th>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td><b>{{++$i}}</b></td>
                                        <td>{{$user->name.' '.$user->lastname}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->emp_id}}</td>
                                        <td>{{$user->user_group}}</td>
                                        <td>{{$user->phone_no}}</td>
                                        <td>
                                            <a class="btn btn-sm btn-success" href="{{url('admin/user_details/'.$user->id)}}">Details</a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {!! $users->links() !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')

@endsection