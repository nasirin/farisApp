<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }

        h1 {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Laporan absensi <?= $karyawan_nama ? $karyawan_nama['nama_user'] : '' ?> </h1>
    <h1><?= date('M Y', strtotime($value))  ?></h1>
    <table id="customers">
        <thead>
            <tr class="tbody-tr">
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($absensi_log as $key => $value) : ?>
                <tr class="tbody-tr">
                    <td class="tbody-td"><?= $key + 1 ?></td>
                    <td class="tbody-td"><?= $value['nik'] ?></td>
                    <td class="tbody-td"><?= $value['nama_user'] ?></td>
                    <td class="tbody-td"><?= date('d M Y', strtotime($value['created_at']))  ?></td>
                    <td class="tbody-td"><?= date('H:i:s', strtotime($value['in']))  ?></td>
                    <td class="tbody-td"><?= date('H:i:s', strtotime($value['out']))  ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>