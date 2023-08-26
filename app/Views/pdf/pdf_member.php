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
    <h1 align="center">Daftar Rekapan member Gym DE PERKASA</h1>
    <p><?php
if (isset($selectedMonth)) {
    $namaBulan = date('F', strtotime($selectedMonth . '-01'));
    echo "Bulan yang dipilih: " . $namaBulan;
}
?>
</p>
    <table width="100%" align="center">
        <thead>
            <tr class="h2">
                <th>No</th>
                <th>Nama</th>
                <th>No Member</th>
                <th>Tanggal</th>
                <th>Waktu</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            
            foreach ($data as $member) : ?>
                <tr class="data">
                    <td class="number"><?= $i++; ?></td>
                    <td><?= $member['nama']; ?></td>
                    <td><?= $member['no_member']; ?></td>
                    <td><?= $member['tanggal']; ?></td>
                    <td><?= $member['waktu']; ?></td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>