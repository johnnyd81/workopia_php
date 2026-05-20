<?php
//all the required GET routes to be used in the workopia job listing application i.e. root route, create route, job listings route etc.
$router->get('/', 'controllers/home.php');
$router->get('/listings', 'controllers/listings/index.php');
$router->get('/listings/create', 'controllers/listings/create.php');
$router->get('/listing', 'controllers/listings/show.php');
