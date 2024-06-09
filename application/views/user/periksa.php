<!-- Begin Page Content -->
<div class="container-fluid">

    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <hr class="sidebar-divider">
        <!-- row table-->
        <div class="page-header">
            <span class="fas fa-file-signature text-primary mt-2 ">Periksa</span>
        </div>
        <div class="col-lg-12">
            <div class="table-responsive table-bordered col-12 mt-2" style="height: 250px;">
                <table class="table mt-3" >
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No.</th>
                            <th scope="col">Nama Hewan</th>
                            <th scope="col">Jenis Hewan</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pasien as $p) { ?>
                            <tr>
                                <td class="text-center"><?= $no; ?></td>
                                <td><?= $p['nama_hewan']; ?></td>
                                <td><?= $p['jns_hewan']; ?></td>
                                <td><?= $p['jns_klmn']; ?></td>
                                <td class = "text-center">
                                    <a href="<?= base_url('user/keluhan/').$p['id_hewan']; ?>" class="btn btn-primary btn-sm">Periksa</a>
                                </td>
                            </tr>
                        <?php $no++;} ?> 
                    </tbody>
                </table>
            </div>
        </div>
        <hr class="sidebar-divider">
        <!-- row table-->
        <div class="page-header">
            <span class="fas fa-signature text-primary mt-2 "> Status Periksa</span>
        </div>
        <div class="col-lg-12">
            <div class="table-responsive table-bordered col-12 mt-2" style="height: 250px;">
                <table class="table mt-3" >
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No.</th>
                            <th scope="col">Nama Hewan</th>
                            <th scope="col">Jenis Hewan</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Keluhan</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($rekam as $r) { ?>
                            <tr>
                                <td class="text-center"><?= $no; ?></td>
                                <td><?= $r['nama_hewan']; ?></td>
                                <td><?= $r['jns_hewan']; ?></td>
                                <td><?= $r['jns_klmn']; ?></td>
                                <td><?= $r['keluhan']; ?></td>
                                <td class="text-danger text-center"><strong><?= $r['status']; ?></strong></td>
                            </tr>
                        <?php $no++;} ?> 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->