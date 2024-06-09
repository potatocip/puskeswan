<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<h3><center>Laporan Data Pemilik Hewan Puskeswan Laladon Bogor</center></h3>
<br/>
<table class="table-data">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NIK</th>
            <th>Alamat</th>
            <th>No. Telepon</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach($user as $u){ ?>
            <tr>
                <td><?= $u['id_user']; ?></td>
                <td><?= $u['nama']; ?></td>
                <td><?= $u['nik']; ?></td>
                <td><?= $u['alamat']; ?></td>
                <td><?= $u['no_telp']; ?></td>
                <td><?= $u['email']; ?></td>
            </tr>
        <?php $no++;} ?>
    </tbody>
</table>