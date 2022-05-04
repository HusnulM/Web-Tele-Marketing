<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      {{-- <img src="/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">Tele-Marketing</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/img/avatar.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="/" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          @if(Auth::user()->typeuser === 'Administrator')
          <li class="nav-item">
            <a href="/input-data" class="nav-link">
              <i class="nav-icon"></i>
              <p>
                Input Data
                <i class="fas fa-plus right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/display-data" class="nav-link">
              <i class="nav-icon"></i>
              <p>
                Belum Di Telephone
                <i class="fas fa-copy right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/laporan" class="nav-link">
              <i class="nav-icon"></i>
              <p>
                Laporan
                <i class="fas fa-file-alt right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/user" class="nav-link">
              <i class="nav-icon"></i>
              <p>
                Data User
                <i class="fas fa-users right"></i>
              </p>
            </a>
          </li>
          @elseif(Auth::user()->typeuser === 'Admin')
          <li class="nav-item">
            <a href="/input-data" class="nav-link">
              <i class="nav-icon"></i>
              <p>
                Input Data
                <i class="fas fa-plus right"></i>
              </p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="/display-data" class="nav-link">
              <i class="nav-icon"></i>
              <p>
                Belum Di Telephone
                <i class="fas fa-copy right"></i>
              </p>
            </a>
          </li> --}}
          <li class="nav-item">
            <a href="/laporan" class="nav-link">
              <i class="nav-icon"></i>
              <p>
                Laporan
                <i class="fas fa-file-alt right"></i>
              </p>
            </a>
          </li>
          @elseif(Auth::user()->typeuser === 'CS')
          <li class="nav-item">
            <a href="/display-data" class="nav-link">
              <i class="nav-icon"></i>
              <p>
                Belum Di Telephone
                <i class="fas fa-copy right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/laporan" class="nav-link">
              <i class="nav-icon"></i>
              <p>
                Laporan
                <i class="fas fa-file-alt right"></i>
              </p>
            </a>
          </li>
          @endif
          {{-- <li class="nav-item menu-open">
            <a href="/" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Input Data
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li> --}}
          {{-- @foreach(userMenu() as $headMenu)
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon {{ $headMenu->groupicon }}"></i>
                <p>
                {{ $headMenu->groupname }}
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                @foreach(userSubMenu() as $detailMenu)
                  @if($headMenu->menugroup === $detailMenu->menugroup)
                    <li class="nav-item">
                      <a href="{{ url($detailMenu->route) }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ $detailMenu->description }}</p>
                      </a>
                    </li>
                  @endif
                @endforeach 
              </ul>
            </li>
          @endforeach --}}

          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Transaksi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/layout/top-nav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Deposit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Withdraw</p>
                </a>
              </li>
            </ul>
          </li> -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>