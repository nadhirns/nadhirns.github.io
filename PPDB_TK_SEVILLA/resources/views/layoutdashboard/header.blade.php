  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
          <li class="nav-item">
              <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                  <i class="fas fa-expand-arrows-alt"></i>
              </a>
          </li>
          <!-- Logout -->
          <li class="nav-item">
              <a href="{{ url('keluar') }}" class="btn btn-light @if (Request::segment(2) == 'dashboard')  @endif">
                  <i class="nav-icon fas fa-sign-out-alt"></i> Logout
              </a>
          </li>
          <!-- End Logout -->
      </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{ url('/') }}" class="brand-link">
          <img src="../../../dist/img/TKSevillaLogo1.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
              style="opacity: .8">
          <span class="brand-text font-weight-light">TK SEVILLA</span>
      </a>


      @if (Auth::user()->user_type == 1)
          <!-- Sidebar -->
          <div class="sidebar">
              <!-- Sidebar user panel (optional) -->
              <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                  {{-- <div class="image"> --}}
                  {{-- @if (Auth::user()->profile->foto != null)
            <img class="profile-user-img img-fluid img-circle"
              src="{{ url('upload/profile/' . Auth::user()->profile->foto) }}"
              alt="User Image"> --}}
                  {{-- @else --}}
                  {{-- <img src="../../dist/img/user4-128x128.jpg" class="img-circle elevation-2" alt="User Image"> --}}
                  {{-- @endif --}}
                  {{-- </div> --}}
                  <div class="info">
                      <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                  </div>
              </div>

              <!-- Sidebar Menu -->
              <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                      data-accordion="false">
                      <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


                      <!-- Dashboard -->
                      <li class="nav-item">
                          <a href="{{ url('admin/dashboard') }}"
                              class="nav-link @if (Request::segment(2) == 'dashboard')  @endif">
                              <i class="nav-icon fas fa-tachometer-alt"></i>
                              <p>
                                  Dashboard
                                  {{-- <i class="right fas fa-angle-left"></i> --}}
                              </p>
                          </a>
                      </li>
                      <!-- End Dashboard -->

                      <!-- List Admin -->
                      <li class="nav-item">
                          <a href="{{ url('admin/admin/list-admin') }}"
                              class="nav-link @if (Request::segment(2) == 'dashboard')  @endif">
                              <i class="nav-icon far fa-user"></i>
                              <p>
                                  Admin
                                  {{-- <i class="right fas fa-angle-left"></i> --}}
                              </p>
                          </a>
                      </li>
                      <!-- End List Admin -->

                      <!-- List Student -->
                      <li class="nav-item">
                          <a href="{{ url('admin/siswa/list-siswa') }}"
                              class="nav-link @if (Request::segment(2) == 'dashboard')  @endif">
                              <i class="nav-icon fas fa-graduation-cap"></i>
                              <p>
                                  Siswa
                                  {{-- <i class="right fas fa-angle-left"></i> --}}
                              </p>
                          </a>
                      </li>
                      <!-- End List Siswa -->

                      <!-- Info Assignment -->
                      <li class="nav-item">
                          <a href="#" class="nav-link @if (Request::segment(2) == 'dashboard')  @endif">
                              <i class="nav-icon fas fa-address-card"></i>
                              <p>
                                  Info Pendaftaran
                                  <i class="right fas fa-angle-left right"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ url('admin/data-pendaftaran') }}"
                                      class="nav-link @if (Request::segment(2) == 'dashboard')  @endif">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Data Pendaftar</p>
                                  </a>
                              </li>

                              <li class="nav-item">
                                  <a href="{{ url('admin/data-pembayaran') }}"
                                      class="nav-link @if (Request::segment(2) == 'dashboard')  @endif">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>
                                          Data Pembayaran
                                      </p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                      <!-- End Info Assignment -->

                      <!-- Info Assignment -->
                      <li class="nav-item">
                          <a href="#" class="nav-link @if (Request::segment(2) == 'dashboard')  @endif">
                              <i class="nav-icon fas fa-address-card"></i>
                              <p>
                                  Ranking Metode SAW
                                  <i class="right fas fa-angle-left right"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <!-- Info Kriteria -->
                              <li class="nav-item">
                                  <a href="{{ url('admin/kriteria/list-kriteria') }}"
                                      class="nav-link @if (Request::segment(2) == 'kriteria')  @endif">
                                      <i class="nav-icon far fa-circle nav-icon"></i>
                                      <p>
                                          Kriteria
                                      </p>
                                  </a>
                              </li>
                              <!-- End Info Kriteria -->

                              <!-- Info Alternatif -->
                              <li class="nav-item">
                                  <a href="{{ url('admin/alternatif/list-alternatif') }}"
                                      class="nav-link @if (Request::segment(2) == 'alternatif')  @endif">
                                      <i class="nav-icon far fa-circle nav-icon"></i>
                                      <p>
                                          Alternatif
                                      </p>
                                  </a>
                              </li>
                              <!-- End Info Alternatif -->

                              <!-- Info Penilaian -->
                              <li class="nav-item">
                                  <a href="{{ url('admin/penilaian/list-penilaian') }}"
                                      class="nav-link @if (Request::segment(2) == 'penilaian')  @endif">
                                      <i class="nav-icon far fa-circle nav-icon"></i>
                                      <p>
                                          Penilaian
                                      </p>
                                  </a>
                              </li>
                              <!-- End Info Penilaian -->

                              <!-- Info Perhitungan -->
                              <li class="nav-item">
                                  <a href="{{ url('admin/perhitungan/list-perhitungan') }}"
                                      class="nav-link @if (Request::segment(2) == 'penilaian')  @endif">
                                      <i class="nav-icon far fa-circle nav-icon"></i>
                                      <p>
                                          Perhitungan
                                      </p>
                                  </a>
                              </li>
                              <!-- End Info Perhitungan -->
                          </ul>
                      </li>
                      <!-- End Info Assignment -->
                  </ul>
              </nav>
              <!-- /.sidebar-menu -->
          </div>

          <!-- Student -->
      @elseif(Auth::user()->user_type == 2)
          <!-- Sidebar -->
          <div class="sidebar">
              <!-- Sidebar user panel (optional) -->
              <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                  <div class="image">
                      @if (Auth::user()->profile->foto != null)
                          <img class="profile-user-img img-fluid img-circle"
                              src="{{ url('upload/profile/' . Auth::user()->profile->foto) }}" alt="User Image">
                      @else
                          <img src="../../dist/img/user4-128x128.jpg" class="img-circle elevation-2" alt="User Image">
                      @endif
                  </div>
                  <div class="info">
                      <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                  </div>
              </div>

              <!-- Sidebar Menu -->
              <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                      data-accordion="false">
                      <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                      <!-- Profile -->
                      <li class="nav-item">
                          <a href="{{ url('siswa/profile') }}"
                              class="nav-link @if (Request::segment(2) == 'profile')  @endif">
                              <i class="nav-icon fas fa-user-circle"></i>
                              <p>
                                  Profile
                              </p>
                          </a>
                      </li>
                      <!-- End Profile -->

                      <!-- Info Assignment -->
                      <li class="nav-item">
                          <a href="{{ url('/siswa/data-pendaftaran') }}"
                              class="nav-link @if (Request::segment(2) == 'pendaftaran')  @endif">
                              <i class="nav-icon fas fa-address-card"></i>
                              <p>
                                  Info Pendaftaran
                              </p>
                          </a>
                      </li>
                      <!-- End Info Assignment -->

                      {{-- <!-- Form Pendaftaran -->
          <li class="nav-item">
            <a href="{{ url('siswa/formulir-pendaftaran') }}" class="nav-link @if (Request::segment(2) == 'pendaftaran') @endif">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                Formulir
              </p>
            </a>
          </li>
          <!-- End Form Pendaftaran --> --}}

      @endif
      <!-- End Student -->

      </ul>
      </nav>
      <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
