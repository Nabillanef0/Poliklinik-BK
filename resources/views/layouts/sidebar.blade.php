<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <span class="brand-text font-weight-light">Poliklinik BK</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
        </div>
        <div class="user-info">
          <p class="text-white">
              @if(auth()->user()->role === 'admin')
                  {{ ucfirst(auth()->user()->role) }} 
              @else
                  {{ ucfirst(auth()->user()->role) }} {{ auth()->user()->name }}
              @endif
          </p>
      </div>

      </div>
          @if(auth()->user()->role === 'admin')
          <li class="nav-item">
            <a href="/" class="nav-link {{ Request::is('/*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
                <span class="right badge badge-success">Admin</span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="dokter" class="nav-link {{ Request::is('dokter*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-user-md"></i>
              <p>
                Dokter
                <span class="right badge badge-success">Admin</span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="pasien" class="nav-link {{ Request::is('pasien*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user-injured"></i>
              <p>
                Pasien
                <span class="right badge badge-success">Admin</span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="poli" class="nav-link {{ Request::is('poli*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-hospital"></i>
              <p>
                Poli
                <span class="right badge badge-success">Admin</span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="obat" class="nav-link {{ Request::is('obat*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-pills"></i>
              <p>
                Obat
                <span class="right badge badge-success">Admin</span>
              </p>
            </a>
          </li>
          @elseif(auth()->user()->role === 'pasien')
          <li class="nav-item">
            <a href="/" class="nav-link {{ Request::is('/*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
                <span class="right badge badge-warning">Pasien</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="daftar_poli" class="nav-link {{ Request::is('daftar_poli*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-hospital"></i>
              <p>
                Poli
                <span class="right badge badge-warning">Pasien</span>
              </p>
            </a>
          </li>
          @elseif(auth()->user()->role === 'dokter')
          <li class="nav-item">
            <a href="/" class="nav-link {{ Request::is('/*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
                <span class="right badge badge-danger">Dokter</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="jadwal_periksa" class="nav-link {{ Request::is('jadwal_periksa*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                Jadwal Periksa
                <span class="right badge badge-danger">Dokter</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/" class="nav-link">
              <i class="nav-icon fas fa-stethoscope"></i>
              <p>
                Memeriksa Pasien
                <span class="right badge badge-danger">Dokter</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/" class="nav-link">
              <i class="nav-icon fas fa-notes-medical"></i>
              <p>
                Riwayat Pasien
                <span class="right badge badge-danger">Dokter</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profil
                <span class="right badge badge-danger">Dokter</span>
              </p>
            </a>
          </li>
          @endif
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <div class="content-wrapper">