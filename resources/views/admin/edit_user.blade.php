@extends('layouts.master')
@section('title')
    EditUser| Admin | BugTraq
@endsection

@section('content')

    <div class="content-wrapper">
        <div class="row">

            <div class="col-md-12">
                <div class="card" style="margin: 3rem;">
                    <div class="card-header">
                        <h3 class="title">Edit {{ $user->name }}'s Details</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{action('AdminController@update_user', $user->$id)}}" >
                        {{--<form method="post" action ="{{route('users.update',[$user()->id])}}">--}}
                            {{csrf_field() }}
                            <input type="hidden" name="_method" value="put">
                            <div class="row">
                                <div class="col-md-5 px-3">
                                    <div class="form-group">
                                        <label for="email">First Name</label>
                                        <input type="text" class="form-control" name="fname" placeholder="Email" value="{{$user->name}}">
                                    </div>
                                </div>
                                <div class="col-md-5 px-3">
                                    <div class="form-group">
                                        <label for="email">Last Name</label>
                                        <input type="text" class="form-control" name="lname" placeholder="Email" value="{{$user->lastname}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 px-3">
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="text" class="form-control" name="email" placeholder="Email" value="{{$user->email}}">
                                    </div>
                                </div>
                            </div>
                            <!--TODO : Try adding change password in User Mode-->

                            <div class="row">
                                <div class="col-md-5 px-3">
                                    <div class="form-group">
                                        <label for="phone">Phone No.</label>
                                        <input type="tel" class="form-control" name="phone" placeholder="Contact Phone" value="{{$user->phone_no}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-3 px-3">
                                        <input type="submit" class="btn btn-primary btn-sm"
                                               value="Save Changes"/>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div><!--Card Body-->
                </div>
            </div>

        </div>
    </div>



@endsection
    @section('scripts')
        <!-- <script src="../../assets/demo/demo.js"></script> -->

            <script src="../../../public/plugins/jquery/jquery.min.js"></script>
@endsection