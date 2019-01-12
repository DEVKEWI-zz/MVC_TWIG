<?php 

/* Basic configurations */
define('BASE_URL', 'http://localhost/mvc/');
define('DEFAULT_TITLE', 'Algo chamativo');
define('SITE_NAME', 'MVC');

/* Mysql configurations */
define('DATABASE_HOST', 'localhost');
define('DATABASE_NAME', 'naosei');
define('DATABASE_USER', 'root');
define('DATABASE_PASS', '');

/* Controllers configuration*/
define('DEFAULT_CONTROLLER', 'Pages');
define('DEFAULT_ACTION', 'home');

/* PHP Configurations */
date_default_timezone_set('America/Sao_Paulo');
error_reporting(E_ALL);
ini_set('display_errors', 1);

