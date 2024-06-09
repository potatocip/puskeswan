<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        .table-data {
            width: 100%;
            border-collapse: collapse;
        }
        .table-data tr th,
        .table-data tr td {
            border: 1px solid black;
            font-size: 11pt;
            font-family: Verdana;
            padding: 10px;
        }
        h3 {
            font-family: Verdana;
            text-align: center;
        }
    </style>
</head>
<body>
    <h3>Laporan Data Rekam Medis Puskeswan Laladon</h3>
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
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>
