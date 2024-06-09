<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-paw"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin Puskeswan</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">Home</div>
    <li class="nav-item active">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('admin/dashboard'); ?>">
                    <i class="fa fa-table"></i>
                    <span>Dashboard</span>
                </a>
            </li>
        </li>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mt-3">
    <!-- Heading -->
    <div class="sidebar-heading">Data</div>
        <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url('admin/dataPasien'); ?>"><!--ini ntar ubah ke buku/kategori -->
                <i class="fas fa-paw"></i>
                <span>Data Pasien</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url('admin/dataUser'); ?>"><!--ini ntar ubah ke buku/kategori -->
                <i class="fas fa-user"></i>
                <span>Data Pemilik Hewan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url('admin/dataRM'); ?>"><!--ini ntar ubah ke buku/kategori -->
                <i class="fas fa-list"></i>
                <span>Data Rekam Medis</span>
            </a>
        </li>
   
    <!-- Divider -->
    <hr class="sidebar-divider mt-3">
    <!-- Heading -->
    <div class="sidebar-heading">Akun</div>
    <li class="nav-item active">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url('autentifikasi/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                <i class="fa fa-fw fa-sign-out-alt"></i>
                <span>Logout</span></a>
        </li>
    </li>
    <hr class="sidebar-divider mt-3">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->