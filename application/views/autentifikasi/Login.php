    <div class="bg-primary d-flex" style="min-height: 773px;">
        <!-- untuk Image -->
        <div class="ms-auto me-5 mt-auto mb-auto text-white">
                <h1>Selamat Datang di <b class="text-black">PUSKESWAN LALADON</b></h1>
                <h6>Jika Anda belum memiliki akun, silakan Registrasi terlebih dahulu!</h6>
        </div>
        <!-- form login -->
        <div class="ms-auto me-5 mt-auto mb-auto ">
            <form class="user bg-card card rounded-4 p-4 pt-3" action="<?= base_url('Autentifikasi'); ?>" method="post">
                <h1 class="text-center mb-0 mt-0 ">LOGIN</h1>
                <p></p>
                <hr class="border border-black border-1 opacity-100 mt-0 ms-auto me-auto col-3">
                <?= $this->session->flashdata('pesan'); ?>
                <!-- inputan username -->
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><img src="<?php echo base_url(); ?>asset/img/orang.jpg" alt=" " style="width: 20px;"></span>
                        <input type="text" class="form-control" value="<?= set_value('email') ?>" name="email" id="email" placeholder="E-mail" aria-label="Email" aria-describedby="basic-addon1">
                    </div>
                    <?= form_error('email','<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <!-- inputan password -->
                <div class="mb-4">
                    <label for="inputPassword" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><img src="<?php echo base_url(); ?>asset/img/logo_gembok.jpg" alt=" " style="width: 20px;"></span>
                        <input type="Password" class="form-control" name="password" id="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                    </div>
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <!-- button submit-->
                <button type="submit" class="btn btn-primary col-4 ">Login</button>

            </form>
        </div>
        <!-- form login end-->

    </div>