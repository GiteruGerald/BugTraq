@extends('layouts.dashboard')

@section('title')
    User Profile
@endsection


@section('content')

    <div class="content-wrapper">
        <div class="row">

            <div class="col-md-4 px-5">
                <div class="card card-user" style="margin-top: 3rem">

                    <div class="card-body">
                        <div class="author">

                                <img class="profile-user-img img-fluid"  src="../../uploads/avatars/{{Auth::user()->avatar}}" alt="..." style="height: 200px;width: 300px;">
                                &nbsp;
                                <p class="font-weight-bold">{{Auth::user()->name.' '.Auth::user()->lastname}}</p>

                            <p class="description">
                                {{Auth::user()->user_group}}
                            </p>
                        </div>

                    </div>
                    <hr>
                    <div class="button-container">

                        <form method="post" action="{{route('image.add')}}" enctype="multipart/form-data">
                            {{csrf_field() }}
                            <div class="col-md-2 pr-4">
                                <input type="file" name="image" id="image">
                                <input type="submit" value="Change Profile Pic">
                            </div>
                        </form>
                        <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                            <i class="fab fa-facebook-f"></i>
                        </button>
                        <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                            <i class="fab fa-twitter"></i>
                        </button>
                        <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                            <i class="fab fa-google-plus-g"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-7" style=" margin-top: 3rem">
                <div class="card">
                    <div class="card-header">
                        <h1 class="title">Profile</h1>
                    </div>
                    <div class="card-body">

                        <form>
                            <div class="row">


                                <div class="col-md-5 pr-2">
                                    <div class="form-group">
                                        <label>Employee ID(disabled)</label>
                                        <input type="text" class="form-control" disabled="" placeholder="Company" value="{{Auth::user()->emp_id}}">
                                    </div>
                                </div>
                                <div class="col-md-4 px-3">
                                    <div class="form-group">
                                        <label>Department</label>
                                        <input type="text" class="form-control" disabled="" placeholder="Department" value="{{Auth::user()->dept}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 px-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" disabled="" placeholder="Email" value="{{Auth::user()->email}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 px-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Phone No.</label>
                                        <input type="tel" class="form-control" disabled="" placeholder="Contact Phone" value="{{Auth::user()->phone_no}}">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-7">
                                    <a class=" btn btn-primary btn-sm" href="/users/{{Auth::user()->id}}/edit">Edit </a>
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

@endsection