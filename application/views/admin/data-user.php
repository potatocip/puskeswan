<!-- Begin Page Content -->
<div class="container-fluid">

    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-12">
            <?= $this->session->flashdata('pesan'); ?>
            <a href="<?= base_url('laporan/cetak_laporan_user'); ?>" class="btn btn-primary mb-3"><i class="fas fa-print"></i> Print</a>
            <a href="<?= base_url('laporan/pdf_laporan_user'); ?>" class="btn btn-warning mb-3"><i class="far fa-file-pdf"></i> PDF</a>
            <a href="<?= base_url('laporan/excel_laporan_user'); ?>" class="btn btn-success mb-3"><i class="far fa-file-excel"></i> Excel</a>
            <div class="table-responsive table-bordered col-12 mt-2" style="height:510px;">
                <table class="table mt-3">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">ID</th>
                            <th scope="col">Nama</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No. Telepon</th>
                            <th scope="col">Email</th>
                            <th scope="col">Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($user as $u) { ?>
                            <tr class="text-center">
                                <td scope="row"><?= $u['id_user']; ?></td>
                                <td><?= $u['nama']; ?></td>
                                <td><?= $u['nik']; ?></td>
                                <td><?= $u['alamat']; ?></td>
                                <td><?= $u['no_telp']; ?></td>
                                <td><?= $u['email']; ?></td>
                                <td>
                                    <picture>
                                        <source srcset="" type="image/svg+xml">
                                        <img src="<?= base_url('asset/img/profile/') . $u['image']; ?>" class="img-fluid img-thumbnail" alt="..." style="width:70px;height:80px;">
                                    </picture>
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