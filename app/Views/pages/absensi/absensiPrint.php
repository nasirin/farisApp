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
        h1{
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Laporan absensi <?= $date ?></h1>
    <table id="customers">
        <thead>
            <tr class="tbody-tr">
                <th>No</th>
                <th>NIK</th>
                <th>Tanggal</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
            </tr>
        </thead>
        <tbody>
            <tr class="tbody-tr">
                <td class="tbody-td">1</td>
                <td class="tbody-td">132231</td>
                <td class="tbody-td">23 juli 2022</td>
                <td class="tbody-td">07:00</td>
                <td class="tbody-td">16:00</td>
            </tr>
        </tbody>
    </table>
</body>

</html>