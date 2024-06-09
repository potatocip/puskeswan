<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-9">
            <?= form_open_multipart('admin/rekamAct'); ?>
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger alert-message" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?php foreach ($rekam as $r) { ?>
                <div class="form-group row">
                    <label for="id_rm" class="col-sm-2 col-form-label">ID RM</label>
                    <div class="col-sm-8">
                        <p> : <?php echo $r['id_rm']; ?></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_user" class="col-sm-2 col-form-label">Nama Pemilik Hewan</label>
                    <div class="col-sm-8">
                        <p> : <?php echo $r['nama']; ?></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_hewan" class="col-sm-2 col-form-label">Nama Hewan</label>
                    <div class="col-sm-8">
                        <p> : <?php echo $r['nama_hewan']; ?></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jns_hewan" class="col-sm-2 col-form-label">Jenis Hewan</label>
                    <div class="col-sm-8">
                        <p> : <?php echo $r['jns_hewan']; ?></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jns_klmn" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-8">
                        <p> : <?php echo $r['jns_klmn']; ?></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="keluhan" class="col-sm-2 col-form-label">Keluhan</label>
                    <div class="col-sm-8">
                        <p> : <?php echo $r['keluhan']; ?></p>
                    </div>
                </div>
                <div class="form-group row">
                <input type="hidden" class="form-control" id="status" name="status" value='Sudah Diperiksa'>
                <input type="hidden" class="form-control" id="id_rm" name="id_rm" value='<?= $r['id_rm'] ?>'>

                </div>
                <div class="form-group row">
                    <label for="diagnosa" class="col-sm-2 col-form-label">Diagnosa</label>
                    <div class="col-sm-8">
                        <textarea class="form-control form-control-user" id="diagnosa" name="diagnosa" placeholder="Masukkan Diagnosa"></textarea>
                        <!-- <?= form_error('diagnosa', '<small class="text-danger pl-3">', '</small>'); ?> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label for="obat" class="col-sm-2 col-form-label">Obat</label>
                    <div class="col-sm-8">
                        <textarea class="form-control form-control-user" id="obat" name="obat" placeholder="Masukkan Nama Obat"></textarea>
                        <!-- <?= form_error('obat', '<small class="text-danger pl-3">', '</small>'); ?> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label for="dosis" class="col-sm-2 col-form-label">Dosis</label>
                    <div class="col-sm-8">
                        <textarea class="form-control form-control-user" id="dosis" name="dosis" placeholder="Masukkan Dosis Obat"></textarea>
                        <!-- <?= form_error('dosis', '<small class="text-danger pl-3">', '</small>'); ?> -->
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