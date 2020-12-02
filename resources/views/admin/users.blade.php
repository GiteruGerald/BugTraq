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

                                {{--<a class="pull-right btn btn-primary btn-sm" href="#new_user" data-toggle="modal"><i class="fas fa-user-plus"></i> Register New user </a></div>--}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="user_table" class="table">
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
                                @foreach($users as $indexKey => $user)
                                    <tr>
                                        <td><b>{{$indexKey+1}}.</b></td>
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
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="modal fade" id="new_user">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="login-box-msg">Register a new membership</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="{{ route('admin.users.create') }}" method="post">
                            {{ csrf_field() }}


                            <div class="row">
                                <div class="col-6">
                                    <div class="input-group mb-3 {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="col-md-4 control-label">First Name</label>
                                        <input id="name" value="{{ old('name') }}"  name="name" type="text" class="form-control" placeholder="First name" required autofocus>

                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                        @if($errors->has('name'))
                                            <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6 pl-4">
                                    <div class="input-group mb-3 {{ $errors->has('lastname') ? ' has-error' : '' }}">
                                        <label for="lastname" class="col-md-4 control-label">Last Name</label>
                                        <input id="lastname" value="{{ old('lastname') }}"  name="lastname" type="text" class="form-control" placeholder="Last name" required autofocus>

                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                        @if($errors->has('lastname'))
                                            <span class="help-block">
                                    <strong>{{ $errors->first('lastname') }}</strong>
                                </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="input-group mb-3 {{ $errors->has('emp_id') ? ' has-error' : '' }}">
                                        <label for="name" class="col-md-4 control-label">Employee ID</label>
                                        <div class="col-7">
                                            <div class="input-group">

                                                <input id="emp_id" name="emp_id" type="text" class="form-control" placeholder="Employee ID" required autofocus>
                                                @if($errors->has('emp_id'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('emp_id') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 pl-4">
                                    <div class="input-group mb-3 {{ $errors->has('phone_no') ? ' has-error' : '' }}">
                                        <label for="phone_no" class="col-md-4 control-label">Phone No:</label>
                                        <div class="col-7">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="text" name="phone_no" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask placeholder="(+254)">

                                                @if($errors->has('phone_no'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('phone_no') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="input-group mb-3" {{ $errors->has('dept') ? ' has-error' : '' }}>
                                        <label for="Department" class="col-md-4 control-label">Department</label>
                                        <div class="col-8">
                                            <select class="form-control" name="dept">
                                                <option>Development</option>
                                                <option>Quality Assurance</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 pl-4">
                                    <div class="input-group mb-3 {{ $errors->has('user_group') ? ' has-error' : '' }}">
                                        <label for="userGroup" class="col-md-4 control-label">User Role</label>
                                        <div class="col-7">
                                            <select class="form-control select2bs4" name="user_group">
                                                <option>Manager</option>
                                                <option>Test Engineer</option>
                                                <option>Developer</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            &nbsp;
                            <div class="row">
                                <div class="col-6">
                                    <div class="input-group mb-3 {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class="col-4 control-label">E-Mail Address</label>
                                        <input id="email" value="{{ old('email') }}"  name="email" type="email" class="form-control" placeholder="Email" required>

                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="text-danger">
                                    @if($errors->has('email'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="input-group mb-3{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password" class="col-md-4 control-label">Password</label>
                                        <input id="password" name="password" type="password" class="form-control" placeholder="Password" required>

                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="text-danger">
                                    @if($errors->has('password'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                                        <input id= "password-confirm" name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password">

                                    </div>
                                </div>
                            </div>

                            &nbsp;
                            <div class="row">
                                <div class="col-8"></div>
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Add user
                                    </button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>
                    </div>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready( function () {
            $('#user_table').DataTable();
        });
    </script>
@endsection