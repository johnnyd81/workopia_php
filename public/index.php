<?php
//index.php is the entry file for the app i.e. Router and Database

// helpers.php contains functions that perform repetetive tasks i.e. displaying variables, getting basepaths etc.
require '../helpers.php';

//by requiring helpers.php into the file the basePath method can be used
require basePath('Router.php');
require basePath('Database.php');

// Instantiate the router by using the new keyword with the Router class that was required above
$router = new Router();

//require the available routes from the routes.php file
$routes = require basePath('routes.php');

//get current URI and HTTP method to use in the router method of the new Router instance
//by using parse_url method only the path is returned when the argument PHP_URL_PATH is specified
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

//route the request using the Router instance that was created earlier
$router->route($uri, $method);
