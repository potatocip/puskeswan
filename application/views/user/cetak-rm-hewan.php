<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Rekam Medis</title>
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
    <h3><center>Rekam Medis</center></h3>
    <br><br>
    <div class="container-fluid">
        <?php if (!empty($hewan)) { ?>
            <div class="form-group row">
                <label for="nama_hewan" class="col-sm-2 col-form-label">ID Pasien : <?= $hewan['id_hewan']; ?></label>
            </div>
            <div class="form-group row">
                <label for="jns_hewan" class="col-sm-2 col-form-label">Jenis Hewan : <?= $hewan['jns_hewan']; ?></label>
            </div>
            <div class="form-group row">
                <label for="jns_klmn" class="col-sm-2 col-form-label">Jenis Kelamin : <?= $hewan['jns_klmn']; ?></label>
            </div>
        <?php } else { ?>
            <p>Data hewan tidak ditemukan.</p>
        <?php } ?>
        <br><br>

            <table class="table-data">
                <thead>
                    <tr>
                        <th>ID RM</th>
                        <th>Tanggal Periksa</th>
                        <th>Keluhan</th>
                        <th>Diagnosa</th>
                        <th>Obat</th>
                        <th>Dosis</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($rekam)) {
                        foreach ($rekam as $r) { ?>
                            <tr>
                                <td><?= $r['id_rm']; ?></td>
                                <td><?= $r['tgl_sekarang']; ?></td>
                                <td><?= $r['keluhan']; ?></td>
                                <td><?= $r['diagnosa']; ?></td>
                                <td><?= $r['obat']; ?></td>
                                <td><?= $r['dosis']; ?></td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data rekam medis</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>