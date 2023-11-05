<?php

defined('BASEPATH') or exit('Akses langsung tidak diizinkan!');

if (!function_exists("time_ind")) {
    function time_ind($dt, $short = true)
    {
        if (!(strtotime($dt) > 0)) {
            return "";
        }

        $datetime = explode(" ", $dt);
        $str_date = $datetime[0];
        if (isset($datetime[1])) {
            $str_time = $datetime[1];
        } else {
            $str_time = "";
        }

        $date = explode("-", $str_date);
        $d = $date[2];
        $m = $date[1];
        $y = $date[0];

        if (!$short) {
            $bulan = array(
                1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
        } else {
            $bulan = array(
                1 =>   'Jan',
                'Feb',
                'Mar',
                'Apr',
                'Mei',
                'Jun',
                'Jul',
                'Ags',
                'Sep',
                'Okt',
                'Nov',
                'Des'
            );
        }

        $str_m = $bulan[(int)$m];

        if (!$short) {
            return $d . " " . $str_m . " " . $y . " " . $str_time;
        } else {
            return $d . " " . $str_m . " " . $y;
        }
    }
}

if (!function_exists('get_time')) {
    function get_time($str_date = "", $time_zone = 'Asia/Jakarta')
    {
        date_default_timezone_set($time_zone);
        if ($str_date != "") {
            $time = strtotime($str_date);
        } else {
            $time = time();
        }
        return $time;
    }
}

if (!function_exists('format_time')) {
    function format_time($time, $format = 'Y-m-d h:i:s', $time_zone = 'Asia/Jakarta')
    {
        date_default_timezone_set($time_zone);
        $str_date = date($format, $time);
        return $str_date;
    }
}
