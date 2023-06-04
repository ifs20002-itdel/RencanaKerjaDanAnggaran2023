<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>  
  <nav class="main-header navbar navbar-expand navbar-dark" style="background-color: #3C8DBC; background-image: url('{{ asset('layout/dist/img/bg.svg') }}'); filter: contrast(140%);">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item dropdown mr-2">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell" style="color:white"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link nama" style="color: white; font-size:14px" data-toggle="dropdown" href="#">
          <i class="fa-solid fa-user mr-2"></i>

         
          <?php
            //GetDataPegawai
            $token = session('token');
            $responseDataPegawai = Http::withToken($token)->asForm()->post('https://cis-dev.del.ac.id/api/library-api/pegawai?userid='.session('user')['user_id'])->body();
            $pegawai = json_decode($responseDataPegawai, true);

          ?>

          @foreach ($pegawai['data']['pegawai'] as $item)

          @if($item['user_id'] == session('user')['user_id'])

            {{$item['nama']}}
                   
          <i class="right fas fa-angle-down ml-2"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right">

          @if(isset(session('user')['jabatan'][0]['jabatan']))
          <span class="dropdown-item dropdown-header">{{ session('user')['jabatan'][0]['jabatan'] }}</span>
          @endif

             
           @endif

           @endforeach   

         
           
          <div class="dropdown-divider"></div>
          <a href="/profile" class="dropdown-item text-center">
            <i class="fa-solid fa-person-chalkboard mr-2"></i>Profile
          </a>
          <div class="dropdown-divider"></div>
          <a href=""></a>
          <div class="dropdown-divider"></div>
          <a href="/user/logout" class="dropdown-item text-center">
            <i class="fa-solid fa-right-from-bracket mr-2"></i> Logout
          </a>
        </div>
      </li> 
      <!-- Notifications Dropdown Menu -->
      
    </ul>
  </nav>

  <script>
  </script>

</body>
</html>