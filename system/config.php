<?php

defined('BASEPATH') or exit('Akses langsung tidak diizinkan!');
$config                     = [];
//'development','production','maintenance'
$config['RUN_MODE']         = 'production';

//Enable Hooks
$config['ENABLE_HOOKS']     = False;

//Url name
$config['URL']              = 'http://localhost:8080/';

//Appname & Version
$config['APP_NAME']         = 'Simple Framework';
$config['VERSI']            = '1.0';

//Database Configuration
$config['DB_SERVER']        = 'localhost';
$config['DB_USER']          = '';
$config['DB_PASSWORD']      = '';
$config['DB_NAME']          = '';

//Base Directories Configuration
$config['ASSETS_DIR']       = './assets';
$config['APP_DIR']          = './app';
$config['STORAGES_DIR']     = './uploads';
$config['HOOKS_DIR']        = './system/hooks';
$config['HELPERS_DIR']      = './system/helpers';
$config['ROUTES_DIR']       = './system/routes';
$config['CORES_DIR']        = './system/cores';
$config['LIBRARIES_DIR']    = './system/libraries';
$config['ERRORS_DIR']       = './system/errors';
$config['MAINTENANCE_DIR']  = './system/maintenance';
$config['VENDORS_DIR']      = './system/vendors';

//Session name
$config['SESSION_NAME']     = 'simple_session';
$config['REDIRECT_PATH']    = '';

// Enable CORS Features
$config['CORS']             = false;

// Whitelist of CORS
$config['ALLOWED_ORIGINS']  = [];

// Helper autoload
$config['HELPERS']          = [];

// Libraries autoload
$config['LIBRARIES']          = [];
