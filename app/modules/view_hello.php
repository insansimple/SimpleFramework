<?php defined('BASEPATH') or exit('Akses langsung tidak diizinkan!'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di miniFramework</title>
    <style>
        body {
            margin: 0;
            display: flex;
            height: 100vh;
            align-items: center;
            justify-content: center;
            font-family: sans-serif;
            color: #3d3c3a;
        }

        div.wrapper {
            padding: 25px;
            width: 500px;
            height: fit-content;
            text-align: center;
            border: 5px solid #d77920;
            border-radius: 15px;
        }

        div div {
            margin-bottom: 15px;
        }

        img {
            height: 170px;
            float: left;
            margin-right: 15px;
        }

        h1 {
            color: #d77920;
            ;
        }

        h1,
        p {
            margin: 0;
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div>
            <img src="<?= asset('img/logo.png') ?>" alt="logo">
            <h1><?= $header ?></h1>
        </div>
        <p><?= $text ?></p>
    </div>
</body>

</html>