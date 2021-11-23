<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <?= form_error('menu', '<div class="alert alert-danger close" role="alert">', '
          </div>') ?>
            <?= $this->session->flashdata('message5') ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addNewKamar">Tambah Kamar</a>
            <a href="<?= base_url('home/index')?>" class="btn btn-danger mb-3" data-target="#home/index">Kembali</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Kamar</th>
                            <th>Kode Fasilitas</th>
                            <th>Kode Paket</th>
                            <th>No Kamar</th>
                            <th>Nominal</th>
                            <th>Saldo</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($kamar as $d) :
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $d->kd_kamar ?></td>
                                <td><?= $d->kd_fasilitas ?></td>
                                <td><?= $d->kd_paket ?></td>
                                <td><?= $d->no_kamar ?></td>
                                <td><?= $d->lantai ?></td>
                                <td><?= $d->harga ?></td>
                                <td>
                                    <a href="#" class='fas fa-edit' style='font-size:15px;color:#00cc00' data-toggle="modal" data-target="#updatekasmasuk<?= $d->kd_kamar ?>"></a>
                                    <a href="#" class='fas fa-trash' style='font-size:15px;color:red' data-toggle="modal" data-target="#deletekasmasuk<?= $d->kd_kamar ?>"></a>
                                </td>
                            </tr>
                            <!--update donatur-->
                            <div class="modal fade" id="updatekasmasuk<?= $d->kd_kamar ?>" tabindex="-1" role="dialog" aria-labelledby="addNewkasmasukLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addNewkasmasukLabel">Update Kas Masuk </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="p-5">
                                            <form class="user" method="post" action="<?= base_url('kas_masuk/update'); ?>" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="kd_kamar">Kode Kamar</label><br>
                                                    <input type="hidden" name="kd_kamar" value="<?php echo $d->kd_kamar ?>">
                                                    <input type="text" class="form-control form-control-user" id="kd_kamar" name="kd_kamar" value="<?php echo $d->kd_kamar ?>" readonly="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="kd_kamar">Tanggal</label><br>
                                                    <input type="date" class="form-control form-control-user" id="tgl_transaksi" name="tgl_transaksi" value="<?php echo $d->tgl_transaksi ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="kd_kamar">Keterangan</label><br>
                                                    <input type="text" class="form-control form-control-user" id="keterangan" name="keterangan" value="<?php echo $d->keterangan ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="kd_kamar">Nominal</label><br>
                                                    <input type="text" class="form-control form-control-user" id="nominal" name="nominal" value="<?php echo $d->nominal ?>">
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
                            <div class="modal fade" id="deletekasmasuk<?= $d->kd_kamar ?>" tabindex="-1" role="dialog" aria-labelledby="addNewDonaturLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addNewDonaturLabel">Hapus Kas</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Anda yakin ingin menghapus <?= $d->kd_kamar ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <a href="<?= base_url('kas_masuk/deletekasmasuk?kd_kamar=') ?><?= $d->kd_kamar ?>" class="btn btn-primary">Hapus</a>
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

<div class="modal fade" id="addNewKamar" tabindex="-1" role="dialog" aria-labelledby="addNewkamarLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewkamarLabel">Tambah Kamar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="p-5">
                <form class="kamar" method="post" action="<?= base_url('kamar/tambah_aksi'); ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="kd_kamar"></label>
                        <input type="date" class="form-control form-control-user" id="kd_kamar" name="kd_kamar" placeholder="Masukan Nama Tanggal" value="<?= set_value('kd_kamar'); ?>" hidden>
                        <?= form_error('kd_kamar', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="kd_fasilitas">Kode Fasilitas</label>
                        <input type="text" class="form-control form-control-user" id="kd_fasilitas" name="kd_fasilitas" placeholder="Masukan kd_fasilitas" value="<?= set_value('kd_fasilitas'); ?>">
                        <?= form_error('kd_fasilitas', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="kd_paket">kd_paket</label>
                        <input type="text" class="form-control form-control-user" id="kd_paket" name="kd_paket" placeholder="Masukan kd_paket" value="<?= set_value('kd_paket'); ?>">
                        <?= form_error('kd_paket', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="no_kamar">No Kamar</label>
                        <input type="text" class="form-control form-control-user" id="no_kamar" name="no_kamar" placeholder="Masukan no_kamar" value="<?= set_value('no_kamar'); ?>">
                        <?= form_error('no_kamar', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="lantai">lantai</label>
                        <input type="text" class="form-control form-control-user" id="lantai" name="lantai" placeholder="Masukan lantai" value="<?= set_value('lantai'); ?>">
                        <?= form_error('lantai', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="harga">harga</label>
                        <input type="text" class="form-control form-control-user" id="harga" name="harga" placeholder="Masukan harga" value="<?= set_value('harga'); ?>">
                        <?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
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