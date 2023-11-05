<?php

defined('BASEPATH') or exit('Akses langsung tidak diizinkan!');

if (!function_exists('db_mysqli')) {
    function db_mysqli()
    {
        global $config;

        $conn = mysqli_connect($config['DB_SERVER'], $config['DB_USER'], $config['DB_PASSWORD'], $config['DB_NAME']);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        return $conn;
    }
}

if (!function_exists('new_mysqli')) {
    function new_mysqli()
    {
        global $config;

        $conn = new mysqli($config['DB_SERVER'], $config['DB_USER'], $config['DB_PASSWORD'], $config['DB_NAME']);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }
}

if (!function_exists('new_pdo')) {
    global $config;

    try {
        $pdo = new PDO("mysql:host=$config[DB_SERVER];dbname=$config[DB_NAME]", $config['DB_USER'], $config['DB_PASSWORD']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}

if (!function_exists('real_escape')) {
    function real_escape($str, $conn)
    {
        return mysqli_real_escape_string($conn, $str);
    }
}
