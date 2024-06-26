<?php
// helpers.php contains functions that perform repetetive tasks i.e. displaying variables etc.
require '../helpers.php';
require basePath('Router.php');
require basePath('Database.php');

// Instantiate the router by using the new keyword with the Router class
$router = new Router();

//get the routes from routes.php
$routes = require basePath('routes.php');

//get current URI and HTTP method
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

//route the request
$router->route($uri, $method);
