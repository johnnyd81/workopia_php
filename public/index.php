<?php
require '../helpers.php';
require basePath('Router.php');
require basePath('Database.php');

// Instantiate the router
$router = new Router();

//get the routes
$routes = require basePath('routes.php');

//get current URI and HTTP method
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

//route the request
$router->route($uri, $method);
