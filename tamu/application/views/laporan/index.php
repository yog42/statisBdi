<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tabel <?= $title; ?></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="container">
                <link rel="stylesheet" href="<?php echo base_url('assets/vendor/jquery/jquery-ui.min.css'); ?>" />
                <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script> <!-- Load file jquery -->
                <form method="get" action="" class="form">
                    <div class="form-group">
                        <label>Filter Berdasarkan</label>
                        <select class="form-control" name="filter" id="filter" style="width: 50%">
                            <option value="">Pilih</option>
                            <?php if ($_SESSION["role_id"] == ("1" and "2")) { ?>
                                <option value="1">Nama Tamu</option>
                            <?php } ?>
                            <option value="2">Chek in</option>
                            <?php if ($_SESSION["role_id"] == ("1" and "2")) { ?>
                                <option value="3">Chek Out</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group" id="form-nama">
                        <label>Nama Tamu</label>
                        <select name="nama" class="form-control" style="width: 50%">
                            <option value="">Pilih</option>
                            <?php
                            foreach ($nama as $data) { // Ambil data tahun dari model yang dikirim dari controller
                                echo '<option value="' . $data->nama . '">' . $data->nama . ' | ' . $data->id_tamu . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group" id="form-chekin">
                        <label>Dari Tanggal</label>
                        <input type="date" name="tanggal" class="form-control input-tanggal" style="width: 50%" />
                    </div>
                    <div class="form-group" id="form-chekin2">
                        <label>Sampai Tanggal</label>
                        <input type="date" name="tanggal2" class="form-control input-tanggal2" style="width: 50%" />
                    </div>
                    <div class="form-group" id="form-chekout">
                        <label>Dari Tanggal</label>
                        <input type="date" name="tanggal11" class="form-control input-tanggal" style="width: 50%" />
                    </div>
                    <div class="form-group" id="form-chekout2">
                        <label>Sampai Tanggal</label>
                        <input type="date" name="tanggal22" class="form-control input-tanggal2" style="width: 50%" />
                    </div>
                    <button class="btn btn-primary" type="submit">Tampilkan</button>
                    <a href="<?php echo base_url() . "laporan/index"; ?>">Reset Filter</a>
                </form>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo $ket; ?></h6>
        </div>
        <div class="card-body">
            <a href="<?php echo $url_cetak; ?>" class=" btn btn-danger mb-3"><i class="fas fa-file-pdf"></i>CETAK PDF</a>

            <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead style="text-align: center">
                        <tr>
                            <th style="text-align: center;">NO</th>
                            <th style="text-align: center;">ID tamu</th>
                            <th style="text-align: center;">Nama</th>
                            <th style="text-align: center;">No Hp</th>
                            <th style="text-align: center;">Alamat</th>
                            <th style="text-align: center;">No Ktp</th>
                            <th style="text-align: center;">Kd Kamar</th>
                            <th style="text-align: center;">kd Paket</th>
                            <th style="text-align: center;">Kd Fasilitas</th>
                            <th style="text-align: center;">Tgl Chekin</th>
                            <th style="text-align: center;">Tgl Chekout</th>
                            <th style="text-align: center;">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($tb_tamu as $data) {
                        ?>
                            <tr>
                                <td style="text-align: center;"><?php echo $no++ ?></td>
                                <td style="text-align: center;"><?php echo $data->id_tamu ?></td>
                                <td style="text-align: center;"><?php echo $data->nama ?></td>
                                <td style="text-align: center;"><?php echo $data->no_hp ?></td>
                                <td style="text-align: center;"><?php echo $data->alamat ?></td>
                                <td style="text-align: center;"><?php echo $data->no_ktp ?></td>
                                <td style="text-align: center;"><?php echo $data->kd_kamar ?></td>
                                <td style="text-align: center;"><?php echo $data->kd_paket ?></td>
                                <td style="text-align: center;"><?php echo $data->kd_fasilitas ?></td>
                                <td style="text-align: center;"><?php echo $data->tgl_chekin ?></td>
                                <td style="text-align: center;"><?php echo $data->tgl_chekout ?></td>
                                <td>
                                Rp. <?php 
                                if ($data->kd_paket == 'acc' && $data->kd_fasilitas == 'full') {
                                    $a = 150000;
                                    $b = 35000;

                                    echo $a+$b;
                                }elseif ($data->kd_paket == 'nonac' && $data->kd_fasilitas == 'biasa') {
                                    $a = 130000;

                                    echo $a;
                                }elseif ($data->kd_paket == 'nonac' && $data->kd_fasilitas == 'full') {
                                    $a = 130000;
                                    $b = 35000;

                                    echo $a+$b;
                                }else {
                                    $a = 150000;

                                    echo $a;
                                } ?>
                                </td>
                            </tr>
                        <?php }

                        ?>
                    </tbody>
                    <script src="<?php echo base_url('assets/vendor/jquery/jquery-ui.min.js'); ?>"></script> <!-- Load file plugin js jquery-ui -->
                    <script>
                        $(document).ready(function() { // Ketika halaman selesai di load
                            $('#form-nama, #form-chekin, #form-chekin2, #form-chekout, #form-chekout2').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya
                            $('#filter').change(function() { // Ketika user memilih filter
                                if ($(this).val() == '1') { // Jika filter nya 1 (per tanggal)
                                    $('#form-chekin, #form-chekin2, #form-chekout, #form-chekout2').hide();
                                    $('#form-nama').show(); // Tampilkan form tanggal

                                } else if ($(this).val() == '2') { // Jika filter nya 2 (per bulan)
                                    $('#form-nama, #form-chekout, #form-chekout2').hide();
                                    $('#form-chekin').show(); // Tampilkan form bulan dan tahun
                                    $('#form-chekin2').show();
                                } else if ($(this).val() == '3') { // Jika filter nya 2 (per bulan)
                                    $('#form-nama, #form-chekin, #form-chekin2').hide();
                                    $('#form-chekout').show(); // Tampilkan form bulan dan tahun
                                    $('#form-chekout2').show();
                                } else { // Jika filternya 3 (per tahun)
                                    $('#form-kas_masuk, #form-kas_masuk2, #form-kas_keluar, #form-kas_keluar2, #form-umum, #form-umum2').hide();
                                }
                                $('#form-kas_masuk input, #form-kas_keluar input, #form-umum input').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
                            })
                        })
                    </script>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->