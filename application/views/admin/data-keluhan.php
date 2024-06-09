<!-- Begin Page Content -->
<div class="container-fluid">

    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-12">
            <?php if(validation_errors()){?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors();?>
                </div>
            <?php }?>
            <?= $this->session->flashdata('pesan'); ?>
            <div class="table-responsive table-bordered col-12 mt-2" style="height:600px;">
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
                            <th scope="col">Aksi</th>
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
                                <td class = "text-center">
                                    <a href="<?= base_url('admin/inputRekam/').$r['id_rm']; ?>" class="btn btn-success btn-sm">Rekam Medis</a>
                                </td>
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