<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <style type="text/css">
            .table-data{
                width: 100%;
                border-collapse: collapse;
            }

            .table-data tr th,
            .table-data tr td{
                border:1px solid black;
                font-size:11pt;
                padding: 10px 10px 10px 10px;
            }
            </style>
            <h3><center>Laporan Data Pasien Puskeswan Laladon Bogor</center></h3>
            <br/>
            <table class="table-data">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Pemilik</th>
                        <th>Nama Hewan</th>
                        <th>Jenis Hewan</th>
                        <th>Jenis Kelamin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach($pasien as $p){ ?>
                        <tr>
                            <td><?= $p['id_hewan']; ?></td>
                            <td><?= $p['nama']; ?></td>
                            <td><?= $p['nama_hewan']; ?></td>
                            <td><?= $p['jns_hewan']; ?></td>
                            <td><?= $p['jns_klmn']; ?></td>
                        </tr>
                    <?php $no++;} ?>
                </tbody>
            </table>
    </body>
</html>