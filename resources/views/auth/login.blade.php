<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<title>Dashboard | Doctor Display</title>
<!-- Fevicon -->
<link rel="shortcut icon" href="assets\images\favicon.ico">
<!-- Start css -->
<link href="assets\css\bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="assets\css\icons.css" rel="stylesheet" type="text/css">
<link href="assets\css\style.css" rel="stylesheet" type="text/css">
<!-- End css -->
</head>
<body class="vertical-layout">
<!-- Start Containerbar -->
<div id="containerbar" class="containerbar authenticate-bg">
<!-- Start Container -->
<div class="container">
<div class="auth-box login-box">
<!-- Start row -->
<div class="row no-gutters align-items-center justify-content-center">
<!-- Start col -->
<div class="col-md-6 col-lg-5">
<!-- Start Auth Box -->
<div class="auth-box-right">
<div class="card">
<div class="card-body">
<form method="POST" action="{{ route('login') }}">
  @csrf
  <div class="form-head">
      <a href="/login" class="logo"><img src="{{ asset('img/logo/logo.png') }}" class="img-fluid" alt="logo"></a>
  </div>
  <div class="form-group">
    <input id="email" type="email" placeholder="Email/ Username" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="form-group">
    <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="form-row mb-3">
      <div class="col-sm-6">
          <div class="custom-control custom-checkbox text-left">

            <input type="checkbox" class="custom-control-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="custom-control-label font-14" for="remember">
                {{ __('Remember Me') }}</label>
          </div>
      </div>
      <div class="col-sm-6">
        <div class="forgot-psw">
          @if (Route::has('password.request'))
              <a class="btn btn-link" href="{{ route('password.request') }}">
                  {{ __('Forgot Your Password?') }}
              </a>
          @endif
        </div>
      </div>
  </div>
<button type="submit" class="btn btn-success btn-lg btn-block font-18">
    {{ __('Login') }}</button>
</form>
<div class="login-or">
  <h6 class="text-muted">OR</h6>
</div>
<p class="mb-0 mt-3">Don't have a account? <a href="/register">Sign up</a></p>
</div>
</div>
</div>
<!-- End Auth Box -->
</div>
<!-- End col -->
</div>
<!-- End row -->
</div>
</div>
<!-- End Container -->
</div>
<!-- End Containerbar -->
<!-- Start js -->
<script src="assets\js\jquery.min.js"></script>
<script src="assets\js\popper.min.js"></script>
<script src="assets\js\bootstrap.min.js"></script>
<script src="assets\js\modernizr.min.js"></script>
<script src="assets\js\detect.js"></script>
<script src="assets\js\jquery.slimscroll.js"></script>
<!-- End js -->
</body>
</html>
