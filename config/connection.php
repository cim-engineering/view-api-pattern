<?php

/**
 * Composer
 */
require_once __DIR__ . '/vendor/autoload.php';

use Ahc\Env\Loader;
(new Loader)->load(__DIR__ .'.env'); 
use Ahc\Env\Retriever;

/**
 * Error and Exception handling
 */
if(Retriever::getEnv("APP_DEBUG")):
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
endif;


DEFINE('DB_USER', Retriever::getEnv("MYSQL_USERNAME"));
DEFINE('DB_PASSWORD',  Retriever::getEnv("MYSQL_PASS"));
DEFINE('DB_HOST', Retriever::getEnv("MYSQL_HOST") );
DEFINE('DB_NAME', Retriever::getEnv("MYSQL_DB") );

/**
 * MYSQL Connection
 */
$db = new MysqliDb(array(
	'host' => DB_HOST,
	'username' => DB_USER,
	'password' => DB_PASSWORD,
	'db' => DB_NAME,
	'charset' => 'utf8mb4'
));


?>