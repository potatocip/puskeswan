<!-- Begin Page Content -->
<div class="container-fluid">

    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-12">
            <?= $this->session->flashdata('pesan'); ?>
            <a href="<?= base_url('laporan/cetak_laporan_pasien'); ?>" class="btn btn-primary mb-3"><i class="fas fa-print"></i> Print</a>
            <a href="<?= base_url('laporan/pdf_laporan_pasien'); ?>" class="btn btn-warning mb-3"><i class="far fa-file-pdf"></i> PDF</a>
            <a href="<?= base_url('laporan/excel_laporan_pasien'); ?>" class="btn btn-success mb-3"><i class="far fa-file-excel"></i> Excel</a>
            <div class="table-responsive table-bordered col-12 mt-2" style="height:510px;">
                <table class="table mt-3">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">ID</th>
                            <th scope="col">Nama Pemilik</th>
                            <th scope="col">Nama Hewan</th>
                            <th scope="col">Jenis Hewan</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($pasien as $p) { ?>
                            <tr class="text-center">
                                <td scope="row"><?= $p['id_hewan']; ?></td>
                                <td><?= $p['nama']; ?></td>
                                <td><?= $p['nama_hewan']; ?></td>
                                <td><?= $p['jns_hewan']; ?></td>
                                <td><?= $p['jns_klmn']; ?></td>
                                <td>
                                <a href="<?= base_url('admin/tombolRM/').$p['id_hewan']; ?>" class="btn btn-success btn-sm"><i class="fas fa-file"></i> Rekam Medis</a>
                                </td>
                            </tr>
                        <?php $no++;} ?>
                    </tbody>
                </table>
            </div>
            <div class="form-group"></div>
            <div class="form-group">
                <a href="<?= base_url('user/index') ?>">
                    <button type=button class="btn btn-dark"> Kembali</button>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->