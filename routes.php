<?php
//each route is an instance of the Router class and accesses a specific method i.e. get, post, put and delete
$router->get('/', 'controllers/home.php');
$router->get('/listings', 'controllers/listings/index.php');
$router->get('/listings/create', 'controllers/listings/create.php');
$router->get('/listing', 'controllers/listings/show.php');
