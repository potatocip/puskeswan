<div class="bg-primary" style="min-height: 773px;">

<!-- form Daftar -->
<div class="container-fluid">
    <div class="d-flex align-items-center justify-content-center pt-5 pb-4" style="min-height: 773px;">
        <form class="card-register card border border-1 rounded-4 p-4 pt-3 col-6" action="<?= base_url('autentifikasi/daftar'); ?>" method="post">
            <h1 class="text-center mb-0 mt-0">DAFTAR</h1>
            <p></p>
            <hr class="border border-black border-1 opacity-100 ms-auto me-auto mt-0 col-1">
            <div class="d-flex ">

                <!-- Baris ke-1 -->
                <div class="d-blok col-5 me-auto">
                    <!-- inputan nama -->
                    <div class="mb-3">
                        <label for="inputNama" class="form-label">Nama</label>
                        <input type="text" class="form-control col-12" value="<?= set_value('nama'); ?>" name="nama" placeholder="Nama" aria-label="Nama" aria-describedby="basic-addon1">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <!-- inputan nama end-->
                    <!-- inputan nik -->
                    <div class="mb-3">
                        <label for="inputNIK" class="form-label">NIK</label>
                        <input type="text" class="form-control col-12" value="<?= set_value('nik'); ?>" name="nik" placeholder="NIK" aria-label="NIK" aria-describedby="basic-addon1">
                        <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <!-- inputan nik end-->
                    <!-- inputan alamat -->
                    <div class="mb-3">
                        <label for="inputAlamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control col-" value="<?= set_value('alamat'); ?>" name="alamat" placeholder="Alamat" aria-label="Alamat" aria-describedby="basic-addon1">
                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <!-- inputan alamat end-->
                    <!-- inputan no_telp -->
                    <div class="mb-3">
                        <label for="inputNoTelp" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" value="<?= set_value('no_telp'); ?>" name="no_telp" placeholder="Nomor Telepon" aria-label="NoTelp" aria-describedby="basic-addon1">
                        <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <!-- inputan no_telp end-->
                </div>
                <!-- Baris ke-1 end-->

                <!-- Baris ke-2 -->
                <div class="d-blok col-5 ms-auto">
                    <!-- inputan email -->
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Email</label>
                        <input type="email" class="form-control col-" value="<?= set_value('email'); ?>" name="email" placeholder="Alamat Email" aria-label="Email" aria-describedby="basic-addon1">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <!-- inputan email end-->
                    <!-- inputan password -->
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" value="<?= set_value('password'); ?>" name="password" id="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <!-- inputan password end-->
                    <!-- inputan confirmPassword -->
                    <div class="mb-3">
                        <label for="inputConfirmPassword" class="form-label">Konfirmasi Password</label>
                        <input type="password" value="<?= set_value('confirmPassword'); ?>" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="Konfirmasi Password" aria-label="confirmPassword" aria-describedby="basic-addon1">
                        <?= form_error('confirmPassword', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <!-- inputan confirmPassword end-->
                </div>
                <!-- Baris ke-2 end-->
            </div>


            <!-- button submit-->
            <button type="submit" class="btn btn-primary ">Daftar</button>
            <!-- button submit end-->

        </form>
    </div>
</div>
<!-- form Daftar end-->
</div>
