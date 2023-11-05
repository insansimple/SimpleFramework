<?php

defined('BASEPATH') or exit('Akses langsung tidak diizinkan!');

// This function purpose to replace separator into DIRECTORY_SEPARATOR
// And replace 2 separator into single separator
if (!function_exists("fix_separator")) {
    function fix_separator($paths)
    {
        $path = join(DIRECTORY_SEPARATOR, $paths);
        $path = str_replace("/", DIRECTORY_SEPARATOR, $path);
        while (strpos($path, str_repeat(DIRECTORY_SEPARATOR, 2))) {
            $path = str_replace(str_repeat(DIRECTORY_SEPARATOR, 2), DIRECTORY_SEPARATOR, $path);
        }
        return $path;
    }
}

//remove end backslash mark
if (!function_exists("remove_end_bs")) {
    function remove_end_bs($path)
    {
        $new_path = $path;

        if (substr($path, -1) === "/") {
            $new_path = substr($path, 0, -1);
        }

        return $new_path;
    }
}

//get config values
if (!function_exists('get_config')) {
    function get_config($item)
    {
        global $config;
        if (isset($config[$item])) {
            return $config[$item];
        } else {
            die("config[$item] not found!");
        }
    }
}

//Load php as view and render it
if (!function_exists("load_view")) {
    function load_view($module, $params = null, $return = false)
    {
        $path = fix_separator([get_config('MODULES_DIR'), $module]);
        if (!file_exists($path)) {
            die("View : $path not exist!");
        }

        ob_start();
        if ($params) {
            foreach ($params as $key => $value) {
                ${$key} = $value;
            }
        }
        include $path;
        $res = ob_get_contents();
        ob_end_clean();

        if ($return) {
            return $res;
        }

        echo $res;
    }
}

//Load php as models
if (!function_exists("load_model")) {
    function load_model($model_name, $as)
    {
        $path = fix_separator([get_config('MODULES_DIR'), $model_name]);
        if (!file_exists($path)) {
            die("Model : $path not found!");
        }

        require_once $path;
    }
}

//Load helper from helpers dir
if (!function_exists("load_helper")) {
    function load_helper($helper)
    {
        $path = fix_separator([get_config('HELPER_DIR'), $helper]);
        if (!file_exists($path)) {
            die("Helper : $path not found!");
        }
        require_once $path;
    }
}

//Load library from libraries dir
if (!function_exists("load_library")) {
    function load_library($library)
    {
        $path = fix_separator([get_config('LIBRARIES_DIR'), $library]);
        if (!file_exists($path)) {
            die("Library : $path not found!");
        }
        require_once $path;
    }
}

//get APP_NAME info
if (!function_exists("app_name")) {
    function app_name()
    {
        global $config;
        if (!isset($config["APP_NAME"])) {
            die('$config["APP_NAME"] not exist');
        }

        return $config["APP_NAME"];
    }
}

//get Asset from Assets DIR
if (!function_exists("asset")) {
    function asset($path = "")
    {
        global $config;
        $asset_dir = str_replace('./', DIRECTORY_SEPARATOR, $config['ASSETS_DIR']);
        $asset_path = fix_separator([$asset_dir, $path]);
        if (substr($asset_path, 0, 1) == '/') {
            $asset_path = substr($asset_path, 1);
        }
        $asset_path = $config['URL'] . $asset_path;
        return $asset_path;
    }
}

// Generate URL
if (!function_exists("url")) {
    function url($path = null)
    {
        global $config;
        if (substr($config['URL'], -1, 1) !== "/") {
            $part1 = $config['URL'] . "/";
        } else {
            $part1 = $config['URL'];
        }

        if (isset($path)) {
            if (substr($path, 0, 1) === "/") {
                $part2 = substr($path, 1);
            } else {
                $part2 = $path;
            }
        } else {
            $part2 = "";
        }

        return $part1 . $part2;
    }
}

//Vardump with style
if (!function_exists("vardump")) {
    function vardump($identifier)
    {
        echo "<pre>";
        print_r($identifier);
        exit();
    }
}

//Add route 
function add_route($path, $module, $hooks = TRUE, $method = "GET")
{
    global $ROUTES;
    if (substr($path, 0, 1) != "/") {
        $ROUTES[strtolower('/' . $path)] = ["path" => $path, "module" => $module, "hooks" => $hooks, "method" => $method];
    } else {
        $ROUTES[strtolower($path)] = ["path" => $path, "module" => $module, "hooks" => $hooks, "method" => $method];
    }
}

//Redirect
function redirect($path)
{
    header('Location: ' . url($path));
    exit();
}

//Get result if a $href is in current url
function is_request_uri($href)
{
    $request_uri = $_SERVER['PATH_INFO'] ? $_SERVER['PATH_INFO'] : "/";
    $request_uri = substr($request_uri, 0, strlen($href));
    if ($href == $request_uri) {
        return true;
    }
    return false;
}
