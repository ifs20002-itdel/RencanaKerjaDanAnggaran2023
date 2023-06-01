<aside class="main-sidebar sidebar-dark-primary elevation-1">
  <!-- Brand Logo -->
    <a href="{{asset("/")}}" class="brand-link" style="border-right: 0.5px black; background-image: url('layout/dist/img/bg.svg')">
      <img src="{{asset("layout/dist/img/del.png")}}" alt="ITDel Logo" class="brand-image" style="opacity: 1">
      <span class="brand-text font-weight-bolder d-flex flex-row" style="color: white">RKA - IT DEL 2023</span>
    </a>
 

  <!-- Sidebar -->
  <div class="sidebar" style="font-size:14.5px;">
    

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item mt-2">
          <a href="/" class="nav-link">
            <i class="nav-icon fas fa fa-home"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>


        <li class="nav-header mt-2">Anggaran</li>


        {{-- Add WorkGroup --}}
        <li class="nav-item mt-2">
          <a href="/workgroup" class="nav-link">
            <i class="fa-solid fa-people-group nav-icon"></i>
            <p>
              Add WorkGroup
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="/jp" class="nav-link">
          <i class="fa-solid fa-line-chart nav-icon"></i>
            <p>
              Mata Anggaran
            </p>
          </a>
        </li>

      
            <!--JenisPenggunaan-->
            <li class="nav-item">
              <a href="/addJenisPenggunaan" class="nav-link">
                <i class="fa-solid fa-plus-square nav-icon"></i>
                <p>Add Jenis Anggaran</p>
              </a>
            </li>
        

        <li class="nav-item">
          <a href="/listJenisAnggaran" class="nav-link">
            <i class="fa-sharp fa-solid fa-print nav-icon"></i>
            <p>Jenis Anggaran</p>
          </a>
        </li>

        <br>
      

        <li class="nav-header mt-3">Work Plan</li>
        <li class="nav-item">
          <a href="/RKA" class="nav-link">
            <i class="fa-sharp fa-solid fa-clipboard-list nav-icon"></i>
            <p>
              List Pengajuan RKA
            </p>
          </a>
        </li>

        <!-- Ajukan RKA -->
        <li class="nav-item">
          <a href="/pengajuan" class="nav-link">
            <i class="nav-icon fa-solid fa-sack-dollar"></i>
            <p>Ajukan Program</p>
          </a>
        </li>
      
        
      
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>