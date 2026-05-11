<?php

require '../helpers.php';
require basePath('Database.php');

require basePath('Router.php');

$router = new Router();

$routes = require basePath('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// If URI is empty or just a slash, ensure it matches the home route

$method = $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);
