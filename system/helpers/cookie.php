<?php

defined('BASEPATH') or exit('Akses langsung tidak diizinkan!');

if (!function_exists('set_cookie')) {
    function set_cookie($name, $value)
    {
        setcookie($name, $value, time() + 60480, "/");
    }
}

if (!function_exists('delete_cookie')) {
    function delete_cookie($name)
    {
        if (isset($_COOKIE[$name])) {
            setcookie($name, "", time() - 3600, "/");
        }
    }
}

if (!function_exists('get_cookie')) {
    function get_cookie($name)
    {
        return $_COOKIE[$name] ?? null;
    }
}
