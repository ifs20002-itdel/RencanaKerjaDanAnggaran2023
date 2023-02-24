<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | RKA-2023</title>
  <link href="{{ asset('layout/dist/img/logo.svg') }}" rel="shortcut icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('layout/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('layout/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('layout/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary w-100">
    <div class="card-header text-center">
      <img src="{{ asset('layout/dist/img/del.png') }}" alt="Logo Del" width="25%" class="mt-2 mb-1">
      <h4 class="mt-2">Rencana Kerja Dan Anggaran</h4>
      <h6>Institut Teknologi Del</h6>
    </div>
    <div class="card-body">
    
      <form action="/login/auth" method="POST">
        @csrf
        <div class="mb-3">
            <label for="username">Username</label>
            <input type="text" id="username" name="usernameLogin"
                class="form-control @error('password') is-invalid @enderror" value="@error('password'){{ old('usernameLogin') }}@enderror"
                onclick="removeRedBorder()">
            <div class="invalid-feedback"></div>
        </div>
        <div class="mb-4">
            <label for="password">Password</label>
            <input type="password" id="password" name="passwordLogin"
                class="form-control @error('password') is-invalid @enderror"
                onclick="removeRedBorder()">
            <div class="invalid-feedback">
                Username atau password salah
            </div>
        </div>
       
        <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <br>

        <div class="input-group mb-3">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
        </div>

      </form>

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('layout/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('layout/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('layout/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
