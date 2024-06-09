<!-- Begin Page Content -->
<div class="container-fluid">

    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-12">
            <?= $this->session->flashdata('pesan'); ?>
            <a href="<?= base_url('laporan/cetak_laporan_rm'); ?>" class="btn btn-primary mb-3"><i class="fas fa-print"></i> Print</a>
            <a href="<?= base_url('laporan/pdf_laporan_rm'); ?>" class="btn btn-warning mb-3"><i class="far fa-file-pdf"></i> PDF</a>
            <a href="<?= base_url('laporan/excel_laporan_rm'); ?>" class="btn btn-success mb-3"><i class="far fa-file-excel"></i> Excel</a>
            <div class="table-responsive table-bordered col-12 mt-2" style="height: 510px;">
                <table class="table mt-3">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">ID RM</th>
                            <th scope="col">Tgl Periksa</th>
                            <th scope="col">Nama Pemilik</th>
                            <th scope="col">Nama Hewan</th>
                            <th scope="col">Jenis Hewan</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Keluhan</th>
                            <th scope="col">Diagnosa</th>
                            <th scope="col">Obat</th>
                            <th scope="col">Dosis</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($rekam as $r) { ?>
                            <tr>
                                <td class="text-center"><?= $r['id_rm']; ?></td>
                                <td><?= $r['tgl_sekarang']; ?></td>
                                <td><?= $r['nama']; ?></td>
                                <td><?= $r['nama_hewan']; ?></td>
                                <td><?= $r['jns_hewan']; ?></td>
                                <td><?= $r['jns_klmn']; ?></td>
                                <td><?= $r['keluhan']; ?></td>
                                <td><?= $r['diagnosa']; ?></td>
                                <td><?= $r['obat']; ?></td>
                                <td><?= $r['dosis']; ?></td>
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