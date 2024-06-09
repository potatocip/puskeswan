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
    <h3>Laporan Data Pemilik Hewan Puskeswan Laladon</h3>
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
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>
