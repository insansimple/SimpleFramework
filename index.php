<?php
define('BASEPATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);

require './system/config.php';
if (isset($config['RUN_MODE'])) {
    $run_mode = $config['RUN_MODE'];
    if (in_array($run_mode, ['development', 'production', 'maintenance'])) {
        switch ($run_mode) {
            case 'development':
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
                mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                break;
            case 'maintenance':
                include_once($config['MAINTENANCE_DIR'] . '/page.php');
                exit;
            case 'production':
                error_reporting(E_ALL);
                ini_set('display_errors', 0);
                break;
        }
    }
}

require $config['CORES_DIR'] . DIRECTORY_SEPARATOR . 'cors.php';

// require $config['VENDORS_DIR'] . DIRECTORY_SEPARATOR . 'autoload.php';

require $config['CORES_DIR'] . DIRECTORY_SEPARATOR . 'system_functions.php';

//Autoload helpers
if (count($config['HELPERS'])) {
    foreach ($config['HELPERS'] as $helper) {
        $path = fix_separator([$config['HELPERS_DIR'], $helper]);
        if (!file_exists($path)) {
            die("Helper : $path not found!");
        }
        require_once $path;
    }
}

//Autoload libraries
if (count($config['LIBRARIES'])) {
    foreach ($config['LIBRARIES'] as $library) {
        $path = fix_separator([$config['LIBRARIES_DIR'], $library]);
        if (!file_exists($path)) {
            die("Library : $path not found!");
        }
        require_once $path;
    }
}

require $config['ROUTES_DIR'] . DIRECTORY_SEPARATOR . 'web.php';
require $config['CORES_DIR'] . DIRECTORY_SEPARATOR . 'activate_routes.php';
