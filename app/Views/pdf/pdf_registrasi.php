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
            font-size: 12pt;
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
            font-size: 10px;
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
    <h1 align="center">Daftar Rekapan Registrasi Kelas Gym DE PERKASA</h1>
    <table width="100%" align="center">
        <thead>
            <tr class="h2">
        
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Usia</th>
                <th>Nomor KTP</th>
                <th>NomorTelpon</th>
                <th>Tipe Member</th>
                <th>Nomor Member</th>
                <th>Tanggal Aktivasi</th>
                <th>Tanggal Berakhir</th>
                <th>Pelatih</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($data as $registrasi) : ?>
                <tr class="data">
                    <td class="number"><?= $i++; ?></td>
                    <td><span class="name"> <?= $registrasi['nama']; ?></span> </td>
                    <td> <span class="name"><?= $registrasi['alamat']; ?></span> </td>
                    <td><span class="name"><?= $registrasi['tempat_lahir']; ?></span></td>
                    <td><span class="name"><?= $registrasi['tanggal_lahir']; ?></span></td>
                    <td><span class="name"><?= $registrasi['usia']; ?></span></td>
                    <td><span class="name"> <?= $registrasi['no_ktp']; ?></span></td>
                    <td><span class="name"><?= $registrasi['no_telp']; ?></span></td>
                    <td><span class="name"><?= $registrasi['tipe_member']; ?></span></td>
                    <td><span class="name"><?= $registrasi['no_member']; ?></span></td>
                    <td><span class="name"><?= $registrasi['tgl_aktivasi']; ?></span></td>
                    <td><span class="name"><?= $registrasi['tgl_berakhir']; ?></span></td>
                    <td><span class="name"><?= $registrasi['pelatih']; ?></span></td>
                    <td><span class="name"><?= $registrasi['harga']; ?></span></td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>