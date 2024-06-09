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
            <h3><center>Laporan Data Pemilik Hewan Puskeswan Laladon Bogor</center></h3>
            <br/>
            <table class="table-data">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
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
    </body>
</html>