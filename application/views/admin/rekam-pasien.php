<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-9">
            <!-- Data Pasien -->
            <?php if (!empty($pasien)) { ?>
                <div class="form-group row">
                    <label for="nama_hewan" class="col-sm-2 col-form-label">ID Pasien</label>
                    <div class="col-sm-8">
                        <p> : <?php echo $pasien['id_hewan']; ?></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_pemilik" class="col-sm-2 col-form-label">Nama Pemilik</label>
                    <div class="col-sm-8">
                        <p> : <?php echo $pasien['nama_pemilik']; ?></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_hewan" class="col-sm-2 col-form-label">Nama Hewan</label>
                    <div class="col-sm-8">
                        <p> : <?php echo $pasien['nama_hewan']; ?></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jns_hewan" class="col-sm-2 col-form-label">Jenis Hewan</label>
                    <div class="col-sm-8">
                        <p> : <?php echo $pasien['jns_hewan']; ?></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jns_klmn" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-8">
                        <p> : <?php echo $pasien['jns_klmn']; ?></p>
                    </div>
                </div>
            <?php } else { ?>
                <p>Data pasien tidak ditemukan.</p>
            <?php } ?>

            <!-- Data Rekam Medis -->
            <div class="table-responsive table-bordered col-12 mt-2" style="height: 300px;">
                <table class="table mt-3">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">ID RM</th>
                            <th scope="col">Tanggal Periksa</th>
                            <th scope="col">Keluhan</th>
                            <th scope="col">Diagnosa</th>
                            <th scope="col">Obat</th>
                            <th scope="col">Dosis</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($rekam)) {
                            foreach ($rekam as $r) { ?>
                                <tr>
                                    <td class="text-center"><?= $r['id_rm']; ?></td>
                                    <td><?= $r['tgl_sekarang']; ?></td>
                                    <td><?= $r['keluhan']; ?></td>
                                    <td><?= $r['diagnosa']; ?></td>
                                    <td><?= $r['obat']; ?></td>
                                    <td><?= $r['dosis']; ?></td>
                                </tr>
                            <?php }
                        } else { ?>
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data rekam medis</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="form-group"></div>
            <div class="form-group">
                <a href="<?= base_url('admin/cetakRekamMedis/') . $pasien['id_hewan']; ?>" class="btn btn-warning"><i class="far fa-file-pdf"></i> Print</a>
                <a href="<?= base_url('admin/dataPasien') ?>">
                    <button type=button class="btn btn-dark"> Kembali</button>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->