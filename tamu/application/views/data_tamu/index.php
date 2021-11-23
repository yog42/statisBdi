<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <?= form_error('menu', '<div class="alert alert-danger close" role="alert">', '
          </div>') ?>
            <?= $this->session->flashdata('message5') ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addNewtamu">Tambah Tamu</a>
            <a href="<?= base_url('home'); ?>" class="btn btn-danger mb-3"  data-target="#home">Kembali</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id Tamu</th>
                            <th>Nama</th>
                            <th>No Hp</th>
                            <th>Alamat</th>
                            <th>No Ktp</th>
                            <th>Kode Kamar</th>
                            <th>Kode Paket</th>
                            <th>Kode Fasilitas</th>
                            <th>Tgl Chekin</th>
                            <th>Tgl Chekout</th>
                            <th>Total Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $saldo = 0;
                        foreach ($tamu as $d) : ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $d->id_tamu ?></td>
                                <td><?= $d->nama ?></td>
                                <td><?= $d->no_hp ?></td>
                                <td><?= $d->alamat ?></td>
                                <td><?= $d->no_ktp ?></td>
                                <td><?= $d->kd_kamar ?></td>
                                <td><?= $d->kd_paket ?></td>
                                <td><?= $d->kd_fasilitas ?></td>
                                <td><?= $d->tgl_chekin ?></td>
                                <td><?= $d->tgl_chekout ?></td>
                                <td><b>Rp. <?= number_format($d->total_harga) ?></b></td>
                                <td>
                                    <a href="#" class='fas fa-edit' style='font-size:15px;color:#00cc00' data-toggle="modal" data-target="#updatekasmasuk<?= $d->id_tamu ?>"></a>
                                    <a href="#" class='fas fa-trash' style='font-size:15px;color:red' data-toggle="modal" data-target="#deletekasmasuk<?= $d->id_tamu ?>"></a>
                                </td>
                            </tr>
                            <!--update donatur-->
                            <div class="modal fade" id="updatekasmasuk<?= $d->id_tamu ?>" tabindex="-1" role="dialog" aria-labelledby="addNewkasmasukLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addNewkasmasukLabel">Update Kas Masuk </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="p-5">
                                            <form class="user" method="post" action="<?= base_url('tamu/update'); ?>" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="id_tamu">Id Tamu</label><br>
                                                    <input type="hidden" name="id_tamu" value="<?php echo $d->id_tamu ?>">
                                                    <input type="text" class="form-control form-control-user" id="id_tamu" name="id_tamu" value="<?php echo $d->id_tamu ?>" readonly="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama">Nama</label><br>
                                                    <input type="text" class="form-control form-control-user" id="nama" name="nama" value="<?php echo $d->nama ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="no_hp">No Hp</label><br>
                                                    <input type="text" class="form-control form-control-user" id="no_hp" name="no_hp" value="<?php echo $d->no_hp ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="alamat">Alamat</label><br>
                                                    <input type="text" class="form-control form-control-user" id="alamat" name="alamat" value="<?php echo $d->alamat ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="no_ktp">No Ktp</label><br>
                                                    <input type="text" class="form-control form-control-user" id="no_ktp" name="no_ktp" value="<?php echo $d->no_ktp ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="kd_kamar">Kode Kamar</label><br>
                                                    <input type="text" class="form-control form-control-user" id="kd_kamar" name="kd_kamar" value="<?php echo $d->kd_kamar ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="kd_paket">Kode Paket</label><br>
                                                    <input type="text" class="form-control form-control-user" id="kd_paket" name="kd_paket" value="<?php echo $d->kd_paket ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="kd_fasilitas">Kode Fasilitas</label><br>
                                                    <input type="text" class="form-control form-control-user" id="kd_fasilitas" name="kd_fasilitas" value="<?php echo $d->kd_fasilitas ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="tgl_chekin">Tgl Chekin</label><br>
                                                    <input type="date" class="form-control form-control-user" id="tgl_chekin" name="tgl_chekin" value="<?php echo $d->tgl_chekin ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="tgl_chekout">Tgl Chekout</label><br>
                                                    <input type="date" class="form-control form-control-user" id="tgl_chekout" name="tgl_chekout" value="<?php echo $d->tgl_chekout ?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" name="tambah" class="btn btn-primary">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--delete donatur-->
                            <div class="modal fade" id="deletekasmasuk<?= $d->id_tamu ?>" tabindex="-1" role="dialog" aria-labelledby="addNewDonaturLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addNewDonaturLabel">Hapus Kas</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Anda yakin ingin menghapus <?= $d->nama ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <a href="<?= base_url('kas_masuk/deletekasmasuk?id_tamu=') ?><?= $d->id_tamu ?>" class="btn btn-primary">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php $no++;
                        endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addNewtamu" tabindex="-1" role="dialog" aria-labelledby="addNewtamuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewtamuLabel">Tambah Tamu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="p-5">
                <form class="kas_masuk" method="post" action="<?= base_url('tamu/tambah_aksi'); ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Masukan Nama" value="<?= set_value('nama'); ?>">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No Hp</label>
                        <input type="text" class="form-control form-control-user" id="no_hp" name="no_hp" placeholder="Masukan No hp" value="<?= set_value('no_hp'); ?>">
                        <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Masukan alamat" value="<?= set_value('alamat'); ?>">
                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="no_ktp">No Ktp</label>
                        <input type="text" class="form-control form-control-user" id="no_ktp" name="no_ktp" placeholder="Masukan no_ktp" value="<?= set_value('no_ktp'); ?>">
                        <?= form_error('no_ktp', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="kd_kamar">Kd Kamar</label>
                        <input type="text" class="form-control form-control-user" id="kd_kamar" name="kd_kamar" placeholder="Masukan kd_kamar" value="<?= set_value('kd_kamar'); ?>">
                        <?= form_error('kd_kamar', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="kd_paket">Kd Paket</label>
                        <input type="text" class="form-control form-control-user" id="kd_paket" name="kd_paket" placeholder="Masukan kd_paket" value="<?= set_value('kd_paket'); ?>">
                        <?= form_error('kd_paket', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="kd_fasilitas">Kd Fasilitas</label>
                        <input type="text" class="form-control form-control-user" id="kd_fasilitas" name="kd_fasilitas" placeholder="Masukan kd_fasilitas" value="<?= set_value('kd_fasilitas'); ?>">
                        <?= form_error('kd_fasilitas', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="tgl_chekin">Tgl Chekin</label>
                        <input type="date" class="form-control form-control-user" id="tgl_chekin" name="tgl_chekin" placeholder="Masukan tgl_chekin" value="<?= set_value('tgl_chekin'); ?>">
                        <?= form_error('tgl_chekin', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="tgl_chekout">Tgl Chekout</label>
                        <input type="date" class="form-control form-control-user" id="tgl_chekout" name="tgl_chekout" placeholder="Masukan tgl_chekout" value="<?= set_value('tgl_chekout'); ?>">
                        <?= form_error('tgl_chekout', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="tambah" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>