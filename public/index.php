<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require __DIR__ . '/../vendor/autoload.php';

use Framework\Router;
use Framework\Session;

Session::start();

require '../helpers.php';

//Instatiate the router
$router = new Router();

//Get routes
$routes = require basePath('routes.php');

//Get current URI and HTTP method
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


//Route the request
$router->route($uri);
