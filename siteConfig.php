<?php
/**  
 * @author German Dosko
 * @version		June 10 2011
 */

// Report all errors
error_reporting(E_ALL);
ini_set('error_reporting',E_ALL);
ini_set('display_errors', 'On');
ini_set('display_startup_errors', 'On');

ini_set("memory_limit","128M");
define('DIR_SEPARATOR', '/');
$rootFolder = str_replace('\\', DIR_SEPARATOR, dirname(__FILE__) . DIR_SEPARATOR);
define('ROOT_FOLDER', $rootFolder);

// Set include paths
set_include_path(dirname(__FILE__) . DIR_SEPARATOR);

// Just in case it hasn't been specified in the PHP ini: 86400 = 24 hours in seconds
ini_set('max_execution_time', 60);

// Database configuration
define('MYSQL_HOST', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASS', '');
define('MYSQL_DB', 'agro_dev');

date_default_timezone_set('America/Argentina/Buenos_Aires');