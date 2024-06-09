<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<h3><center>Laporan Data Rekam Medis Puskeswan Laladon Bogor</center></h3>
<br/>
<table class="table-data">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tanggal Periksa</th>
            <th>Nama Pemilik</th>
            <th>Nama Hewan</th>
            <th>Jenis Hewan</th>
            <th>Jenis Kelamin</th>
            <th>Keluhan</th>
            <th>Diagnosa</th>
            <th>Obat</th>
            <th>Dosis</th>
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
                <td><?= $r['diagnosa']; ?></td>
                <td><?= $r['obat']; ?></td>
                <td><?= $r['dosis']; ?></td>
            </tr>
            
        <?php $no++;} ?> 
    </tbody>
</table>