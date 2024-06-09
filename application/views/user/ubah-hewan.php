<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-8">
            <form action="<?= base_url('user/ubahHewan/' . $pasien['id_hewan']); ?>" method="post">
                <div class="form-group row">
                    <input type="hidden" name="id_hewan" id="id_hewan" value="<?= $pasien['id_hewan']; ?>">
                    <label for="nama_hewan" class="col-sm-2 col-form-label">Nama Hewan</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control form-control-user" id="nama_hewan" name="nama_hewan" placeholder="Masukkan Nama Hewan" value="<?= set_value('nama_hewan', $pasien['nama_hewan']); ?>">
                        <?= form_error('nama_hewan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jns_hewan" class="col-sm-2 col-form-label">Jenis Hewan</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control form-control-user" id="jns_hewan" name="jns_hewan" placeholder="Masukkan Jenis Hewan" value="<?= set_value('jns_hewan', $pasien['jns_hewan']); ?>">
                        <?= form_error('jns_hewan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jns_klmn" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control form-control-user" id="jns_klmn" name="jns_klmn" placeholder="Masukkan Jenis Kelamin" value="<?= set_value('jns_klmn', $pasien['jns_klmn']); ?>">
                        <?= form_error('jns_klmn', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                    <a href="<?= base_url('user/index') ?>">
                        <button type="button" class="btn btn-dark">Kembali</button>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
</div>