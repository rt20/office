  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('img/bpom.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">e-Office</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="/eoffice/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @if(Auth::user()->roles == 'ADMIN')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Master Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                  <i class="fa fa-users nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('items.index') }}" class="nav-link">
                  <i class="fa fa-archive nav-icon"></i>
                  <p>BMN</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('report.index') }}" class="nav-link">
                  <i class="fa fa-file nav-icon"></i>
                  <p>Laporan</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          <li class="nav-item has-treeview">
            <a href="{{ route('books.index') }}" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Booking Ruangan
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="{{ route('borrows.index') }}" class="nav-link">
              <i class="nav-icon fas fa-laptop"></i>
              <p>
                Peminjaman Barang
              </p>
            </a>

          </li>
          <!-- <li class="nav-item has-treeview">
            <a href="{{ route('mutasi.index') }}" class="nav-link">
              <i class="nav-icon fa fa-file"></i>
              <p>
                Mutasi Barang
              </p>
            </a>
          </li> -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                QMS SOP
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item has-treeview">
                <a href="{{ route('qms.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-circle"></i>
                  <p>
                    SOP
                  </p>
                </a>
            </ul>
            <!-- <ul class="nav nav-treeview">
              <li class="nav-item has-treeview">
                <a href="{{ route('qms.mikro') }}" class="nav-link">
                  <i class="nav-icon fas fa-circle"></i>
                  <p>
                    SOP Mikro
                  </p>
                </a>
            </ul> -->
            <ul class="nav nav-treeview">
              <li class="nav-item has-treeview">
                <a href="https://s.id/tesmocoyuk" class="nav-link" target="_blank">
                  <i class="nav-icon fas fa-circle"></i>
                  <p>
                    Post Test
                  </p>
                </a>
            </ul>
          </li>
          <li class="nav-header">SUPPORT</li>
          <li class="nav-item has-treeview">
          <a href="https://drive.google.com/file/d/1EltCFl5YHJQr5hMiCZFcv5eFl8s5ewXE/view?usp=sharing" class="nav-link" target="_blank">
              <i class="nav-icon fas fa-map"></i>
              <p>
              Panduan
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
          <a href="https://s.id/kotaksaraneoffice" class="nav-link" target="_blank">
              <i class="nav-icon fas fa-box"></i>
              <p>
              Kotak Saran
              </p>
            </a>
          </li>
          
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>