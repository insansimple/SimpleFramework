<?php

defined('BASEPATH') or exit('Akses langsung tidak diizinkan!');

load_view(
    "view_hello.php",
    [
        'header'    => "Selamat Datang di <br/>" . app_name(),
        'text'      => app_name() . " adalah framework mini yang dibuat untuk memenuhi kebutuhan website skala kecil atau website API yang dilengkapi dengan fitur CORS (Cross-Origin Resource Sharing)"
    ],
    false
);
