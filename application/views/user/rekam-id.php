<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-9">
            <?php if (!empty($hewan)) { ?>
                <div class="form-group row">
                    <label for="nama_hewan" class="col-sm-2 col-form-label">Nama Hewan</label>
                    <div class="col-sm-8">
                        <p>: <?= $hewan['nama_hewan']; ?></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jns_hewan" class="col-sm-2 col-form-label">Jenis Hewan</label>
                    <div class="col-sm-8">
                        <p>: <?= $hewan['jns_hewan']; ?></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jns_klmn" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-8">
                        <p>: <?= $hewan['jns_klmn']; ?></p>
                    </div>
                </div>
                <div class="table-responsive table-bordered col-12 mt-2" style="height:300px;">
                    <table class="table mt-3">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">No.</th>
                                <th scope="col">Tanggal Periksa</th>
                                <th scope="col">Keluhan</th>
                                <th scope="col">Diagnosa</th>
                                <th scope="col">Obat</th>
                                <th scope="col">Dosis</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($rekam)) { ?>
                                <?php $no=1;
                                    foreach ($rekam as $r) { ?>
                                    <tr>
                                        <td class="text-center"><?= $no ?></td>
                                        <td><?= $r['tgl_sekarang']; ?></td>
                                        <td><?= $r['keluhan']; ?></td>
                                        <td><?= $r['diagnosa']; ?></td>
                                        <td><?= $r['obat']; ?></td>
                                        <td><?= $r['dosis']; ?></td>
                                    </tr>
                                <?php $no++; } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data rekam medis</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="form-group"></div>
                <div class="form-group">
                <a href="<?= base_url('user/cetakRMHewan/') . $hewan['id_hewan']; ?>" class="btn btn-warning"><i class="far fa-file-pdf"></i> Print</a>
                <a href="<?= base_url('user/index') ?>">
                    <button type=button class="btn btn-dark"> Kembali</button>
                </a>
                </div>
            <?php } ?>

        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->