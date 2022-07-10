  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="/" class="brand-link" title="e-Office Direktorat Pengawasan Peredaran Pangan Olahan">
          <img src="{{ asset('img/bpom.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
              style="opacity: .8">
          <span class="brand-text font-weight-light">e-Office</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">


          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               @guest
                  <a href="{{ URL::route('login') }}" title="Login e-Office">
                      <div class="info-box bg-info">

                          <span class="info-box-icon"><i class="fas fa-user-shield"></i></span>

                          <div class="info-box-content">
                              <span class="info-box-text">Login</span>

                          </div>
                          <!-- /.info-box-content -->
                      </div>
                  </a>
                  @endguest
                  @auth
                  <a href="/dashboard" title="Login e-Office">
                      <div class="info-box bg-info">

                          <span class="info-box-icon"><i class="fas fa-tachometer-alt"></i></span>

                          <div class="info-box-content">
                              <span class="info-box-text">Dashboard</span>

                          </div>
                          <!-- /.info-box-content -->
                      </div>
                  </a>
                  @endauth
                  <a href="http://sipensa.balok.id" target="_blank" title="Sistem Informasi Pengawasan Sarana"> 
                  <div class="info-box bg-warning">
                      <span class="info-box-icon"><i class="fas fa-store"></i></span>

                      <div class="info-box-content">
                          <span class="info-box-text">SIPENSA</span>

                      </div>
                      <!-- /.info-box-content -->
                  </div>
                  </a>
                  <a href="http://wasdar.weebly.com" target="_blank" title="Wasdar Weebly">
                  <div class="info-box bg-info">
                      <span class="info-box-icon"><i class="fab fa-mixcloud"></i></span>

                      <div class="info-box-content">
                          <span class="info-box-text">WEEBLY</span>

                      </div>
                      <!-- /.info-box-content -->
                  </div>
                  </a>
                  <a href="http://peredaranpangan.pom.go.id" target="_blank" title="Subsite Peredaran Pangan Olahan">
                  <div class="info-box bg-success">
                      <span class="info-box-icon"><i class="fas fa-atlas"></i></span>

                      <div class="info-box-content">
                          <span class="info-box-text">SUBSITE</span>

                      </div>
                      <!-- /.info-box-content -->
                  </div>
                  </a>
                  <!-- <a href="/register" title="Pendaftaran Akun e-Office">
                  <div class="info-box bg-warning">
                      <span class="info-box-icon"><i class="fa fa-registered"></i></span> -->
<!-- 
                      <div class="info-box-content">
                          <span class="info-box-text">DAFTAR</span>

                      </div> -->
                      <!-- /.info-box-content -->
                  <!-- </div>
                  </a> -->
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>