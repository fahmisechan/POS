<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">POS<sup> 01</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    @if(Auth::guard('admin')->user()->name == 'admin')
    <li class="nav-item {{Request::segment(1) == 'dashboard' ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{Request::segment(1) == 'supplier' ? 'active' : '' }}">
        <a class="nav-link" href="{{route('supplier.index')}}">
            <i class="fas fa-fw fa-user"></i>
            <span>Daftar Supplier</span></a>
    </li>
    <li class="nav-item {{Request::segment(1) == 'akun' ? 'active' : '' }}">
        <a class="nav-link" href="{{route('profile.index')}}">
            <i class="fas fa-fw fa-user"></i>
            <span>Daftar Kasir</span></a>
    </li>
    @endif
    <li class="nav-item {{Request::segment(1) == 'barang' ? 'active' : '' }}">
      <a class="nav-link " href="{{route('barang.index')}}">
          <i class="fas fa-fw fa-box"></i>
          <span>Daftar Barang</span></a>
  </li>
    {{-- <li class="nav-item {{Request::segment(1) == 'transaksi' ? 'active' : '' }}">
        <a class="nav-link" href="{{url('transaksi')}}">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Transaksi</span></a>
    </li> --}}
    <!-- Nav Item - Utilities Collapse Menu -->
    @if(Auth::guard('admin')->user()->name == 'admin')
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Laporan</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Laporan</h6>
                <a class="collapse-item {{Request::segment(1) == 'laporan/table' ? 'active' : '' }}"
                    href="{{route('laporan.table')}}">Table</a>
                <a class="collapse-item {{Request::segment(1) == 'laporan/grafik' ? 'active' : '' }}"
                    href="{{url('laporan/chart')}}">Grafik</a>
            </div>
        </div>
    </li>
    @endif
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
