<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- row ux-->
  
  <div class="row">

    <!-- Dashboard Jumlah Data Keluhan -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2 bg-success">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-md font-weight-bold text-white text-uppercase mb-1">Jumlah Keluhan</div>
                        <div class="h1 mb-0 font-weight-bold text-white"><?= $jumlahKeluhan; ?></div>
                    </div>
                    <div class="col-auto">
                        <a href="#dataKeluhan"><i class="fas fa-exclamation-circle fa-3x text-danger"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Dashboard Jumlah Data Pasien -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2 bg-warning">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-md font-weight-bold text-white text-uppercase mb-1">Jumlah Pasien</div>
                        <div class="h1 mb-0 font-weight-bold text-white"><?= $cekPasien; ?></div>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('admin/dataPasien'); ?>"><i class="fas fa-paw fa-3x text-primary"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Dashboard Jumlah Pemilik Hewan -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2 bg-primary">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-md font-weight-bold text-white text-uppercase mb-1">Jumlah User</div>
                        <div class="h1 mb-0 font-weight-bold text-white"><?= $cekUser; ?></div>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('admin/dataUser'); ?>"><i class="fas fa-users fa-3x text-warning"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

  </div>
  <!-- end row ux-->

  <!-- Divider -->
  <hr class="sidebar-divider">
  
  <!-- row table-->
  <div class="row">
  <div class="col-lg-12">
    <?php if(validation_errors()){?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors();?>
        </div>
    <?php }?>
    <?= $this->session->flashdata('pesan'); ?>
    <div class="table-responsive table-bordered col-12 mt-2" style="height:400px;" id="#dataKeluhan">
      <div class="page-header">
        <span class="fas fa-file-signature text-primary mt-2 "> Data Keluhan</span>
      </div>
        <table class="table mt-3">
            <thead>
                <tr class="text-center">
                    <th scope="col">ID RM</th>
                    <th scope="col">Nama Pemilik</th>
                    <th scope="col">Nama Hewan</th>
                    <th scope="col">Jenis Hewan</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Keluhan</th>
                    <th scope="col">Aksi</th>
                    <th scope="col">Status</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($rekam as $r) { ?>
                    <tr class="text-center">
                        <td class="text-center"><?= $r['id_rm']; ?></td>
                        <td><?= $r['nama']; ?></td>
                        <td><?= $r['nama_hewan']; ?></td>
                        <td><?= $r['jns_hewan']; ?></td>
                        <td><?= $r['jns_klmn']; ?></td>
                        <td><?= $r['keluhan']; ?></td>
                        <td class = "text-center">
                            <a href="<?= base_url('admin/inputRekam/').$r['id_rm']; ?>" class="btn btn-success btn-sm">Input Rekam Medis</a>
                        </td>
                        <td class="text-danger"><strong><?= $r['status']; ?></strong></td>
                    </tr>
                <?php $no++;} ?> 
            </tbody>
        </table>
    </div>
</div>

  </div>
  <!-- end of row table-->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->