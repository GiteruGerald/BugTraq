@extends('layouts.master')

@section('title')
    User Profile
@endsection


@section('content')

    <div class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Profile</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">

                            <div class="col-md-5 px-3">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" placeholder="Username" value="michael23">
                                </div>
                            </div>
                            <div class="col-md-3 pr-2">
                                <div class="form-group">
                                    <label>Employee ID(disabled)</label>
                                    <input type="text" class="form-control" disabled="" placeholder="Company" value="Creative Code Inc.">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 px-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-5 px-3">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" placeholder="First Name" value="Mike">
                                </div>
                            </div>
                            <div class="col-md-5 pr-2">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" placeholder="Last Name" value="Andrew">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 px-3">
                                <div class="form-group">
                                    <label>Department</label>
                                    <input type="text" class="form-control" placeholder="Department" value="Mike">
                                </div>
                            </div>
                            <div class ="col-md-1">

                            </div>

                            <div class="col-md-4 px-8">
                                <div class="form-group">
                                    <label>Issues </label>
                                    <input type="number" class="form-control" placeholder="Issues">
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-user">
                <div class="image">
                    <img src="../assets/img/bg5.jpg" alt="...">
                </div>
                <div class="card-body">
                    <div class="author">
                        <a href="#">
                            <img class="avatar border-gray" src="../assets/img/gerry.jpg" alt="...">
                            <h5 class="title">Mike Andrew</h5>
                        </a>
                        <p class="description">
                            michael24
                        </p>
                    </div>
                    <p class="description text-center">
                        "Lamborghini Mercy <br>
                        Your chick she so thirsty <br>
                        I'm in that two seat Lambo"
                    </p>
                </div>
                <hr>
                <div class="button-container">
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
    </div>
</div>

@endsection

@section('scripts')

@endsection