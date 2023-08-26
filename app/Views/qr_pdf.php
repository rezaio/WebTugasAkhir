<!DOCTYPE html>
<html>
<head>
    <title>QR Code member</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            align-items: flex-start;
        }

        .qr-code-container {
            position: relative;
            margin: 20px;
        }

        .qr-code {
            width: 125px; /* Sesuaikan ukuran QR code */
            height: 125px; /* Sesuaikan ukuran QR code */
            position: absolute;
            top: 0;
            left: 0;
        }

        .data-container {
            margin-left: 20px;
        }

        h1 {
            text-align: center;
        }

        hr {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <center><h3>QR Code data member</h3><p>GYM DEPERKASA</p></center>
    <hr>
    <div class="qr-code-container">
        <img class="qr-code" src="<?php echo $data; ?>" alt="QR Code">
    </div>
    <div class="data-container">
        <!-- Tambahkan elemen atau tampilan untuk menampilkan data berikutnya -->
    </div>
</body>
</html>
