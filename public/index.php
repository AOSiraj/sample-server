<?php

//TODO: move this into logic and drive from database allowed URLs
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With, Accept");


// check if environment is authorized to view errors
//if (in_array(getenv('APPLICATION_ENV'), array('local', 'aws-qa'))) {
    ini_set ( "error_reporting", E_ALL & ~ E_DEPRECATED & ~E_USER_DEPRECATED  & ~ E_STRICT );
//}

// set time and memory limits
set_time_limit(0);
//ini_set('memory_limit', '4096M');
//ini_set('memory_limit', -1);

date_default_timezone_set("America/Los_Angeles");

/**
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */
chdir(dirname(__DIR__));

define('ZF_CLASS_CACHE', 'data/cache/classes.php.cache'); if (file_exists(ZF_CLASS_CACHE)) require_once ZF_CLASS_CACHE;
define('SITE_ROOT_DIR' , str_replace("\\", "/", realpath(dirname(__FILE__) . '/..')));

// Decline static file requests back to the PHP built-in webserver
if (php_sapi_name() === 'cli-server' && is_file(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))) {
    return false;
}

// Setup autoloading
require 'init_autoloader.php';

// Run the application!
Zend\Mvc\Application::init(require 'config/application.config.php')->run();
