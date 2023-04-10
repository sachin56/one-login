
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ADVEX | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">


  </div>
  <!-- /.login-logo -->
  <div class="card">
  <div class="card-header">
  <div class="col">

    <img src="{{URL::asset('dist/img/logo.png')}}" height="200" width="250"> <br>
  </div>
  </div>
    <div class="card-body login-card-body">
      <p class="login-box-msg">Enter email to reset your password ! </p>

      <form method="POST" action="/reset_password">
        @csrf
        {{-- <input type="hidden" name="_token" value="eOmv1EiEJJJ20XTAIX9Wum6IjS7yiiZaqRmHEHyZ"> --}}

                        <div class="form-group row">
                            <div class="input-group mb-3">
                                <input id="email" type="email" class="form-control " name="email" value="" required autocomplete="email" autofocus placeholder="Email">
                                <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                                </div>
                                </div>

                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-8">
                                <div class="captcha">
                                    <span><img id="captcha_img" src="{{ $img }}" alt=""></span>
                                    <button type="button" class="btn btn-info" class="reload" id="reload">
                                        ↻
                                    </button>
                                    <br>
                                    <input id="captcha" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Captcha" id="captcha" name="captcha" >
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first() }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="form-group row">

                            <div class="col-4">
                            <button type="submit" class="btn btn-primary">
                                    Reset
                                </button>
                            </div>

                        </div>
      </form>
    </div>
  </div>
</div>
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>

<script>
    $('#reload').click(function() {
            $.ajax({
                type: 'GET',
                url: '/user_captcha',
                success: function(data) {
                   $("#captcha_img").attr("src",data);
                }
            });
        });

</script>

</body>
</html>


