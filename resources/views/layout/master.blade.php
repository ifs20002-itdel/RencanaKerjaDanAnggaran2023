<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <link href="{{ asset('layout/dist/img/logo.svg') }}" rel="shortcut icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('layout/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('layout/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('fontawesome/css/all.css')}}">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body class="hold-transition sidebar-mini layout-navbar-fixed">
<!-- Site wrapper -->
<div class="wrapper">


  <!-- Navbar -->
  @include('partial.nav')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('partial.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <div class="container-fluid">
        <div class="row ml-1 mb-2">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/"><i class="fa-solid fa-house mr-1"></i> Home</a></li>
            @yield('breadcrumb1')
            @yield('breadcrumb2')
          </ol>
        </div>
        <hr>
        <div class="mb-2">
            <h1 class="font-weight-bold">@yield('judul')</h1>
            <h1 class="font-weight-bold text-center">@yield('judulTengah')</h1>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

            <!-- Default box -->
            @yield('content')
            <!-- /.card -->
      
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Rencana Kerja Dan Anggaran</b>
    </div>
    <strong>Copyright &copy; 2023 -</strong> <a href="https://coda.io/d/RKA_dGvkMHI5SK0/Rencana-Kerja-dan-Anggaran-Institut-Teknologi-Del-T-A-2022-2023_su8Ub#_luXXM" target="_blank"> Kelompok 1</a> 
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('layout/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('layout/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('layout/dist/js/adminlte.min.js')}}"></script>

</body>
</html>
