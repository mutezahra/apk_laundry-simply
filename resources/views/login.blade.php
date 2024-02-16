<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Berbaju Laundry | Log in</title>    
    
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{url('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page dark-mode">
<div class="login-box dark-mode">
  <!-- /.login-logo -->
    <div class="card card-outline card-light elevation-5">
    <div class="card-header text-center">
        <a href="#" class="h1"><b>Berbaju</b>Laundry</a>
    </div>
    <div class="card-body">
        <p class="login-box-msg">Login</p>

    @if(session('success'))
    <p class="alert alert-success">{{ session('success') }}</p>
    @endif
    @if($errors->any())
    @foreach($errors->all() as $err)
    <p class="alert alert-danger">{{ $err }}</p>
    @endforeach
    @endif

    <form action="{{ route('login.action') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
            <input type="username"name="username" value="{{ old('username') }}" class="form-control" placeholder="Username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
        <div class="row">
            <div class="col-8">
            
            </div>
            <!-- /.col -->
            <div class="col-4" >
                <button type="submit" class="btn btn-primary btn-block shadow">Log in</button>
            </div>
            <!-- /.col -->
        </div>
    </form>
        <!-- /.social-auth-links -->
        {{-- <p class="mb-0">
            <a href="{{url('register')}}" class="text-center">Register a new membership</a>
        </p> --}}
    </div>
    <!-- /.card-body -->
</div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('dist/js/adminlte.min.js')}}"></script>
</body>
</html>