<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 : Not Found</title>
    <style>
        * {
            margin: 0;
        }

        body {
            margin: 0;
            height: 100vh;
            display: flex;
            font-family: sans-serif;
            color: #3d3c3a;
        }

        div.wrapper {
            width: 500px;
            height: fit-content;
            margin: auto;
            overflow: hidden;
            padding: 15px;
            color: #5d5858;
        }

        a {
            display: inline-block;
            text-decoration: none;
            padding: 0 10px;
            height: 30px;
            display: flex;
            flex-flow: row nowrap;
            align-items: center;
            border: 1px solid #d77920;
            background-color: #d77920;
            border-radius: 5px;
            color: #fff;
            transition: .1s linear;
        }

        a:hover {
            color: #d77920;
            border: 1px solid #d77920;
            background-color: #fff;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div style="overflow: hidden; display: flex; flex-flow: row nowrap; align-items: center; gap: 10px;">
            <h1 style="color: #d77920;">404</h1>
            <h1 style="color: #d77920;">|</h1>
            <h3>Halaman yang Anda Cari Tidak ditemukan!</h3>
        </div>
        <div style="display: flex; flex-flow: row nowrap; align-items: center; gap: 10px;">
            <a href="javascript:history.back()">Kembali</a>
            <a href="<?= url('/') ?>">Halaman Utama</a>
        </div>
    </div>
</body>

</html>