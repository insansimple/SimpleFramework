<?php

defined('BASEPATH') or exit('Akses langsung tidak diizinkan!');

$request_uri    = $_SERVER['REQUEST_URI'];
$path_info      = explode("?", $request_uri)[0];

if ($path_info != "/") {
    $path_info = remove_end_bs($path_info);
}

// $path_info = isset($_SERVER['PATH_INFO']) ? remove_end_bs($_SERVER['PATH_INFO']) : '/';

if (!isset($ROUTES[$path_info])) {
    include fix_separator([$config['ERRORS_DIR'], '404.php']);
} else {
    // jika metod request lebih dari satu
    if (is_array($ROUTES[$path_info]['method'])) {
        $arr_method = $ROUTES[$path_info]['method'];
        $method_server = strtolower($_SERVER['REQUEST_METHOD']);
        if (!in_array($method_server, $arr_method)) {
            http_response_code(405);
            exit();
        }
        // hanya untuk single method request
    } else {
        $method = strtoupper($ROUTES[$path_info]['method']);
        if ($_SERVER['REQUEST_METHOD'] != "OPTIONS") {
            if ($_SERVER['REQUEST_METHOD'] != $method) {
                http_response_code(405);
                exit();
            }
        }
    }

    $module_or_callable = $ROUTES[$path_info]['module'];

    $hook_enable = $config['ENABLE_HOOKS'] ?? False;

    if ($hook_enable && $ROUTES[$path_info]['hooks']) {
        include_once fix_separator([$config['HOOKS_DIR'], 'pre_hooks.php']);
    }

    if (is_callable($module_or_callable)) {
        call_user_func($module_or_callable);
    } else {
        $path = fix_separator([$config['MODULES_DIR'], $module_or_callable]);
        if (!file_exists($path)) {
            die("Module : $path not found!");
        }
        ob_start();
        include fix_separator([$config['MODULES_DIR'], $module_or_callable]);
        $content = ob_get_contents();
        ob_end_clean();
        echo $content;
    }

    if ($hook_enable && $ROUTES[$path_info]['hooks']) {
        include_once fix_separator([$config['HOOKS_DIR'], 'post_hooks.php']);
    }
}
