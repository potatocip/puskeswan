<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-9">
            <?= form_open_multipart('user/keluhanAct'); ?>
            
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger alert-message" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?php foreach ($pasien as $p) { ?>
                <div class="form-group row">
                    <label for="nama_hewan" class="col-sm-2 col-form-label">Nama Hewan</label>
                    <div class="col-sm-8">
                        <p> : <?php echo $p['nama_hewan']; ?></p>
                        <!-- <input type="hidden" name="id_hewan" id="id_hewan" value="<?php echo $p['id_hewan']; ?>"> -->
                        <!-- <input type="text" class="form-control form-control-user" id="nama_hewan" name="nama_hewan" placeholder="Masukkan Nama Hewan" value="<?= $p['nama_hewan']; ?>"> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jns_hewan" class="col-sm-2 col-form-label">Jenis Hewan</label>
                    <div class="col-sm-8">
                        <p> : <?php echo $p['jns_hewan']; ?></p>

                        <!-- <input type="text" class="form-control form-control-user" id="jns_hewan" name="jns_hewan" placeholder="Masukkan Jenis Hewan" value="<?= $p['jns_hewan']; ?>"> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jns_klmn" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-8">
                        <p> : <?php echo $p['jns_klmn']; ?></p>
                    </div>
                </div>
                <div class="form-group row">
                <input type="hidden" class="form-control" id="hewan" name="hewan" value="<?= $p['id_hewan']; ?>">
                </div>
                <div class="form-group row">
                    <label for="keluhan" class="col-sm-2 col-form-label">Keluhan</label>
                    <div class="col-sm-8">
                        <textarea class="form-control form-control-user" id="keluhan" name="keluhan" placeholder="Masukkan Keluhan"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" class="form-control form-control-user btn btn-primary col-lg-1 mt-2" value="Simpan">
                    <input type="button" class="form-control form-control-user btn btn-dark col-lg-1 mt-2" value="Kembali" onclick="window.history.go(-1)">
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->