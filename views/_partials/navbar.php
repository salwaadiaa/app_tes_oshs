<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #5997B8;">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard') ?>">
        <div class="sidebar-brand-icon">
            <i class="fas fa-compact-disc"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Skincare & Makeup</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item <?= $data == 'dashboard' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('dashboard') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Produk Skincare
    </div>

    <li class="nav-item <?= $data == 'kategori' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('kategori') ?>">
            <i class="fas fa-fw fa-eye"></i>
            <span>Data Kategori</span>
        </a>
    </li>
    
    <li class="nav-item <?= $data == 'merk' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('merk') ?>">
            <i class="fas fa-fw fa-paint-brush"></i>
            <span>Data Merk</span>
        </a>
    </li>
    <li class="nav-item <?= $data == 'barang' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('barang') ?>">
            <i class="fas fa-fw fa-leaf"></i>
            <span>Data Produk</span>
        </a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Pengaturan
    </div>

    <li class="nav-item <?= $data == 'akun' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('akun') ?>">
            <i class="fas fa-fw fa-cog"></i>
            <span>Manajemen Akun</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
