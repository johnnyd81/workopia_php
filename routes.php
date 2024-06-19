<?php
//the uri ('/') and the method ('get') decides which controller to be used i.e. which file to render in the browser
$router->get('/', 'controllers/home.php');
$router->get('/listings', 'controllers/listings/index.php');
$router->get('/listings/create', 'controllers/listings/create.php');
$router->get('/listing', 'controllers/listings/show.php');
