<?php 

require_once 'config.php';
require_once 'vendor/autoload.php';

use App\Controllers as Controllers;

$Router = new App\Router();

$Router->get('/', new Controllers\Pages, 'home');
$Router->get('/viado', new Controllers\Pages, 'exemplo');

// Setting the 404 controller
$Router->set404(new Controllers\Error, 'error');

$Router->initializate();