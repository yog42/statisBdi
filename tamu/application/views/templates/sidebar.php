<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fa fa-bed" aria-hidden="true"></i>
            </div>
            <?php if ($user['role_id'] == 1) : ?>
                <div class="sidebar-brand-text mx-3">Admin<sup></sup></div>
            <?php else : ?>
                <div class="sidebar-brand-text mx-3">Tamu<sup></sup></div>
            <?php endif; ?>


        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin'); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        <?php if ($_SESSION["role_id"] == ("1" and "2")) { ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url('tamu/index'); ?>">
                    <i class="fas fa-user"></i>
                    <span>Tamu</span>
                </a>
            </li>
        <?php } ?>
        <?php if ($_SESSION["role_id"] == ("1" and "2")) { ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url('laporan/index'); ?>">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Laporan</span>
                </a>
            </li>
        <?php } ?>




        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->