<html>

<head>
    <meta http-equiv=Content-Type content="text/html; charset=utf-8">
    <style>
        body {
    font-family: 'Arial', sans-serif;
    background-color: #fff;
    margin: 0;
    padding: 0;
}


.header img {
    max-width: 100px;
    height: auto;
    display: inline-block;
    vertical-align: middle;
    margin-right: 10px;
}

.title {
    font-size: 24px;
    margin: 0;
    display: inline-block;
    vertical-align: middle;
}

.table-container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    border: 1px solid #ddd;
}

th, td {
    padding: 10px;
    text-align: left;
    border: 1px solid #ddd;
}

thead {
    background-color: #f2f2f2;
    color: #333;
}

th {
    font-weight: bold;
}

tbody tr:nth-child(even) {
    background-color: #f7f7f7;
}

tbody tr:hover {
    background-color: #e0e0e0;
    transition: background-color 0.3s;
}

    </style>
</head>

<body lang=EN-US>
    <img src="<?= base_url(); ?>images/logo3.png" alt="Logo">
    <div class="header">
        <center><h1 class="title">Daftar Rekapan Minuman <br>Gym DE PERKASA</h1></center>
    </div>
    <hr>
    <p><?php
if (isset($selectedMonth)) {
    $namaBulan = date('F', strtotime($selectedMonth . '-01'));
    echo "Bulan yang dipilih: " . $namaBulan;
}
?></p>
    <table width="100%" align="center">
        <thead>
            <tr class="h2">
                <th>No</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($data as $minuman) : ?>
                <tr class="data">
                    <td class="number"><?= $i++; ?></td>
                    <td><?= $minuman['nama']; ?></td>
                    <td><?= $minuman['harga']; ?></td>
                    <td><?= $minuman['jumlah']; ?></td>
                    <td><?= number_format($minuman['harga'] * $minuman['jumlah'], 3, '.', ','); ?></td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>