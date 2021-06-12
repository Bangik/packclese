<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Saya<sup>GoodLooking</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Master
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" href="#multiCollapseExample1" role="button"
        aria-expanded="false" aria-controls="multiCollapseExample1">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pengguna / User</span>
        </a>
        <div id="multiCollapseExample1" class="collapse multi-collapse" >
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Pengguna</h6>
                <a class="collapse-item" href="{{route('index-user')}}">List Pengguna</a>
                <a class="collapse-item" href="{{route('index-user')}}">List Komentar Pengguna</a>

            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" type="button" data-toggle="collapse" data-target="#multiCollapseExample2"
        aria-expanded="false" aria-controls="multiCollapseExample2">
            <i class="fas fa-fw fa-folder"></i>
            <span>JenisLayanan</span>
        </a>
        <div id="multiCollapseExample2" class="collapse multi-collapse" >
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">JenisLayanan</h6>
                <a class="collapse-item" href="{{route('Home-JenisLayanan')}}">List Layanan</a>
                <a class="collapse-item" href="{{route('Create-JenisLayanan')}}">Tambah Layanan</a>

            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
