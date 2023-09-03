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
            width: 120px; /* Sesuaikan ukuran QR code */
            height: 120px; /* Sesuaikan ukuran QR code */
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
    <div class="qr-code-container">
        <img class="qr-code" src="<?php echo $data; ?>" alt="QR Code">
    </div>

</body>
</html>
