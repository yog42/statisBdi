<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="row">

        <div class="col-xl-4 col-md-6 mb-4">
            <?php if ($_SESSION["role_id"] == "1") { ?><a href="<?= base_url('tamu'); ?>"><?php } ?>
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data (Tamu)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahtamu; ?> Tamu</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
</div>
</div>
<!-- End of Main Content -->