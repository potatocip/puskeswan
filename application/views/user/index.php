<!-- Begin Page Content -->
<div class="container-fluid">

    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-12">
        <?php if (validation_errors()) { ?>
                <div class="alert alert-danger alert-message" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <a href="<?= base_url('user/index'); ?>" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahHewanModal"><i class="fas fa-plus"></i> Tambah Hewan</a>
            <div class="table-responsive table-bordered col-12 mt-2" style="height:550px;">
            <div class="page-header">
                <span class="fas fa-paw text-primary mt-2"> Data Hewan</span>
            </div>
                <table class="table mt-3">
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
                                    <a href="<?= base_url('user/ubahHewan/').$p['id_hewan']; ?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Ubah</a>
                                    <a href="<?= base_url('user/hapusHewan/').$p['id_hewan'];?>" onclick="return confirm('Kamu yakin akan menghapus Hewan <?= $p['nama_hewan'];?> ?');" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
                                    <a href="<?= base_url('user/rekamId/').$p['id_hewan']; ?>" class="btn btn-success btn-sm"><i class="fas fa-file"></i> Rekam Medis</a>
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

<!-- Modal Tambah Hewan-->
<div class="modal fade" id="tambahHewanModal" tabindex="-1" role="dialog" aria-labelledby="tambahHewanModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahHewanModalLabel">Tambah Hewan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('user'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="nama_hewan" class="col-sm-2 col-form-label">Nama Hewan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-user" id="nama_hewan" name="nama_hewan" placeholder="Masukkan Nama Hewan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jns_hewan" class="col-sm-2 col-form-label">Jenis Hewan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-user" id="jenis_hewan" name="jns_hewan" placeholder="Masukkan Jenis Hewan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jns_klmn" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-user" id="jenis_kelamin" name="jns_klmn" placeholder="Masukkan Jenis Kelamin">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Modal Tambah Hewan -->

