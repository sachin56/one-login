
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ADVX | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page" style="background-color:white">
    <div class="login-box">
        <div class="login-logo">

          <img src="{{URL::asset('dist/img/logo.png')}}" height="200" width="250"> <br>
          <a href="{{ url('/home') }}"><b style="font-size: 20px;"></b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
        <div class="card-header">
        <div class="col">


        </div>
        </div>
          <div class="card-body login-card-body"> 
            <p class="login-box-msg">Sign in to start your session</p>

      <form action="{{ route('login') }}" method="post">
        @csrf

        <div class="input-group mb-3">
          <input type="email" class="form-control" value="{{ old('email') }}" placeholder="Email" id="email" name="email" @error('email') is-invalid @enderror>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
            @error('email')
            <span class="error invalid-feedback">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" id="password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <a class="btn btn-link" href="/reset_password">
                        Reset Your Password
              </a>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <!-- /.social-auth-links -->

      <p class="mb-1">

      </p>
      {{-- <p class="mb-0">
        <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
      </p> --}}
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
