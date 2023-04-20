<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>  
  <nav class="main-header navbar navbar-expand navbar-light ganti" style="background-color: #3C8DBC;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <div class="cont d-flex flex-row">
        <li>
          <div class="a yah mx-2 my-2" style="width: 20px; height: 20px; background-color:#3C8DBC; border: 2px solid white; cursor: pointer"></div>
        </li>
        <li>
          <div class="b yah mx-2 my-2" style="width: 20px; height: 20px; background-color:#DD4B39; border: 2px solid white; cursor: pointer"></div>
        </li>
        <li>
          <div class="c yah mx-2 my-2" style="width: 20px; height: 20px; background-color:#000; border: 2px solid white; cursor: pointer"></div>
        </li>
        <li>
          <div class="d yah mx-2 my-2" style="width: 20px; height: 20px; background-color:#019875; border: 2px solid white; cursor: pointer"></div>
        </li>
        <li>
          <div class="e yah mx-2 my-2" style="width: 20px; height: 20px; background-color:#605CA8; border: 2px solid white; cursor: pointer"></div>
        </li>
      </div>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item dropdown mr-2">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link nama" style="color: black" data-toggle="dropdown" href="#">
          <i class="fa-solid fa-user mr-2"></i>
          {{(Auth::user()->nama)}}
          <i class="right fas fa-angle-down ml-2"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

          <span class="dropdown-item dropdown-header">{{Auth::user()->jabatan_fungsional}}</span>
           
          <div class="dropdown-divider"></div>
          <a href="/profile" class="dropdown-item text-center">
            <i class="fa-solid fa-person-chalkboard mr-2"></i>Profile
          </a>
          <div class="dropdown-divider"></div>
          <a href=""><hr></a>
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
  let yah = document.querySelectorAll(".yah")
  let ganti = document.querySelector(".ganti")
  let nama = document.querySelector(".nama")
  let bars = document.querySelector(".fa-bars")

  for (let i = 0; i < yah.length; i++) { 
      yah[i].addEventListener("click", function () {
          if (i == 0) {
              ganti.style.background = "#3C8DBC"
          }
          else if (i == 1) {
              ganti.style.background = "#DD4B39"
          }
          else if (i == 2) {
              ganti.style.background = "#000"
              nama.style.color = "white"
          }
          else if (i == 3) {
              ganti.style.background = "#019875"
          }
          else {
              ganti.style.background = "#605CA8"
          }
      })
  }
  </script>

</body>
</html>