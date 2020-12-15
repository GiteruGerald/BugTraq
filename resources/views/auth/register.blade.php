<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BugTraq | Registration Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">

</head>
<body class="hold-transition register-page">
<div class="register-box" style="width:800px;">
    <div class="register-logo">
        <a href="{{ url('/') }}"><b>Bug</b>Traq</a>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <h4 class="login-box-msg">Register a new membership</h4>
<hr>
            <form action="{{ route('register') }}" method="post">
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
                        <div class="input-group mb-3  {{ $errors->has('emp_id') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Employee ID</label>

                            <input id="emp_id" name="emp_id" type="text" value="{{ old('emp_id') }}"class="form-control" placeholder="Employee ID" required />
                            @if($errors->has('emp_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('emp_id') }}</strong>
                                </span>
                            @endif

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
                            <select class="custom-select" name="dept" id="main_menu" required>
                                <option value="">...</option>
                                <option>Development</option>
                                <option>QualityAssurance</option>
                            </select>
                            </div>
                        </div>
                    </div>
                        <div class="col-6 pl-4">
                            <div class="input-group mb-3 {{ $errors->has('user_group') ? ' has-error' : '' }}">
                                <label for="userGroup" class="col-md-4 control-label">User Role</label>
                                <div class="col-7">
                                    <select class="custom-select" name="user_group" id="sub_menu" required>
                                        <option value="">...</option>

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
                            @if($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
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
                            @if($errors->has('password'))
                                <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                            @endif
                        </div>
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
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

  <!--       <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-primary">
                    <i class="fab fa-facebook mr-2"></i>
                    Sign up using Facebook
                </a>
                <a href="#" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i>
                    Sign up using Google+
                </a>
            </div> -->

            <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->

<script type="javascript">
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2();

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    });
</script>


<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

<!-- InputMask -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
{{--Dynamic DropDown--}}
<script src="{{ asset('dist/js/dynamic.js') }}"></script>

</body>
</html>
