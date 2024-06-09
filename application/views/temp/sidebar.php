<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-paw"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Puskeswan Laladon</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider">
<li class="nav-item active">
    <!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link pb-0" href="<?= base_url('user/index'); ?>">
        <i class="fa fa-fw fa-home"></i>
        <span>Home</span></a>
</li>
</li>

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('user/periksa'); ?>">
            <i class="fa fa-fw fa-file-signature"></i>
            <span>Periksa</span></a>
        </li>
    </li>
    
    <!-- <li class="nav-item-active">
        <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url('user/rekamMedis'); ?>">
                <i class="fa fa-fw fa-list"></i>
                <span>Rekam Medis</span>
            </a>
        </li>
    </li> -->
    
    <li class="nav-item active">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url('user/profile'); ?>">
                <i class="fa fa-fw fa-user"></i>
                <span>Profil</span></a>
        </li>
    </li>
    
    <li class="nav-item active">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url('autentifikasi/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                <i class="fa fa-fw fa-sign-out-alt "></i>
                <span>Logout</span></a>
        </li>
    </li>

<br>
<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar --   > 