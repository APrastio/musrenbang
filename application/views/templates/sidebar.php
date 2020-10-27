<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin') ?>">
        <div class="sidebar-brand-icon">
            <i class="fas fa-university"></i>
        </div>
        <?php $role = $this->session->userdata('role_id');
        if ($role == 3) {
            $data['role'] = 'Administrator';
        } else if ($role == 1) {
            $data['role'] = 'Kecamatan';
        } else if ($role == 2) {
            $data['role'] = 'Verifikator';
        } ?>
        <div class="sidebar-brand-text mx-3"><?= $data['role'] ?></div>
    </a>

    <?php
    $role_id = $this->session->userdata('role_id');
    if ($role_id == 1 || $role_id == 2 || $role_id == 3) :
    ?>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="<?= base_url('admin') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <?php if ($role_id == 1 || $role_id == 3) : ?>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                KECAMATAN
            </div>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('kecamatan/musrenbang') ?>">
                    <i class="fas fa-fw fa-file-contract"></i>
                    <span>Data Musrenbang</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('kecamatan/inputMusrenbang') ?>">
                    <i class="fas fa-fw fa-plus-square"></i>
                    <span>Input Musrenbang</span>
                </a>
            </li>
        <?php endif; ?>

        <?php if ($role_id == 2 || $role_id == 3) : ?>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Verifikator
            </div>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('verifikator/vMusrenbang') ?>">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Data Musrenbang</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('verifikator/musrenbangDiterima') ?>">
                    <i class="fas fa-fw fa-clipboard-check"></i>
                    <span>Musrenbang Diterima</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('verifikator/musrenbangDitolak') ?>">
                    <i class="fas fa-fw fa-times-circle"></i>
                    <span>Musrenbang Ditolak</span>
                </a>
            </li>
        <?php endif; ?>

        <?php if ($role_id == 3) : ?>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Administrator
            </div>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/data_user') ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Data User</span>
                </a>
            </li>
        <?php endif ?>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth/logout') ?>">
                <i class="fas fa-fw fa-arrow-alt-circle-left"></i>
                <span>Keluar</span>
            </a>
        </li>
    <?php endif ?>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->