<?php defined('BASEPATH') or exit('Akses langsung tidak diizinkan!'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $config['APP_NAME'] ?> Sedang Maintenance</title>
    <style>
        * {
            margin: 0;
        }

        body {
            display: flex;
            height: 100vh;
            color: #3d3c3a;
        }

        .wrapper {
            margin: auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div style="display: flex; flex-flow: row nowrap; align-items: baseline; gap: 10px;">
            <h1 style="color: #d77920;"><?= $config['APP_NAME'] ?></h1>
            <h1 style="color: #d77920;">|</h1>
            <h3>Under Construction</h3>
        </div>
        <p>Situs ini tidak dapat diakses untuk sementara waktu. Silahkan kembali lagi ketika situs ini sudah siap.</p>
    </div>
</body>

</html>