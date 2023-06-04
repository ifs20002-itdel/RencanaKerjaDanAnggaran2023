<aside class="main-sidebar sidebar-dark-primary elevation-1" style="background-color: #242424;">

  <!-- Brand Logo -->
  <a href="{{asset("/")}}" class="brand-link" style="border-right: 0.5px black; background-image: url('{{ asset('layout/dist/img/bg.svg') }}');filter: saturate(124%);">
    <img src="{{ asset("layout/dist/img/del.png") }}" alt="ITDel Logo" class="brand-image text-outline" style="opacity: 1;text-shadow: -2px -2px 0 black, 2px -2px 0 black, -2px 2px 0 black, 2px 2px 0 black;">
    <span class="brand-text font-weight-bolder d-flex flex-row text-outline" style="color: white; text-shadow: -0.5px -0.5px 0 black, 0.5px -0.5px 0 black, -0.5px 0.5px 0 black, 0.5px 0.5px 0 black;">RKA - IT DEL 2023</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar" style="font-size:13.5px;">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item mt-2">
          <a href="/" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
            <i class="nav-icon fas fa fa-home"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-header mt-2 ml-2" style="color:white; font-size:17px">ANGGARAN</li>

        <li class="nav-item mt-2">
          <a href="/workgroup" class="nav-link {{ Request::is('workgroup') ? 'active' : '' }}">
            <i class="fa-solid fa-people-group nav-icon"></i>
            <p>
              Add WorkGroup
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="/jp" class="nav-link {{ Request::is('jp') ? 'active' : '' }}">
            <i class="fa-solid fa-line-chart nav-icon"></i>
            <p>
              Mata Anggaran
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="/addJenisPenggunaan" class="nav-link {{ Request::is('addJenisPenggunaan') ? 'active' : '' }}">
            <i class="fa-solid fa-plus-square nav-icon"></i>
            <p>Add Jenis Anggaran</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="/listJenisAnggaran" class="nav-link {{ Request::is('listJenisAnggaran') ? 'active' : '' }}">
            <i class="fa-sharp fa-solid fa-print nav-icon"></i>
            <p>Jenis Anggaran</p>
          </a>
        </li>

        <br>

        <li class="nav-header mt-3 ml-2" style="color:white; font-size:17px">WORK PLAN</li>

        <li class="nav-item">
          <a href="/RKA" class="nav-link {{ Request::is('RKA') ? 'active' : '' }}">
            <i class="fa-sharp fa-solid fa-clipboard-list nav-icon"></i>
            <p>
              List Pengajuan RKA
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="/pengajuan" class="nav-link {{ Request::is('pengajuan') ? 'active' : '' }}">
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
