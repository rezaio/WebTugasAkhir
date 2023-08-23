<html>

<head>
    <meta http-equiv=Content-Type content="text/html; charset=utf-8">
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            font-size: 16pt;
        }

        table,
        tr,
        th,
        td {
            border: 1px solid #000;
            border-collapse: collapse;
        }

        .h1>th {
            padding: 15px !important;
        }

        .h2>th {
            padding: 10px !important;
        }

        .h3>th {
            padding: 5px !important;
        }

        th {
            font-size: 14px;
            background-color: #D9D9D9;
        }

        td {
            font-size: 12px;
            padding: 5px;
        }

        .number {
            text-align: center;
            width: 20px;
        }

        .data>td:nth-child(2) {
            width: 200px;
        }
    </style>
</head>

<body lang=EN-US>
    <h1 align="center">Daftar Rekapan Harian Kelas Gym DE PERKASA</h1>
    <p>Bulan: </p>
    <table width="100%" align="center">
        <thead>
            <tr class="h2">
                <th>No</th>
                <th>Nama</th>
                <th>No Telp</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            
            foreach ($data as $harian) : ?>
                <tr class="data">
                    <td class="number"><?= $i++; ?></td>
                    <td><?= $harian['nama']; ?></td>
                    <td><?= $harian['no_telp']; ?></td>
                    <td><?= $harian['tanggal']; ?></td>
                    <td><?= $harian['waktu']; ?></td>
                    <td><?= $harian['harga']; ?></td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>