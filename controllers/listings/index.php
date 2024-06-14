<?php

//import the db.php file that returns the configuration data to connect to the database i.e. workopia database
$config = require basePath("config/myDB.php");
$db = new Database($config);

$listings = $db->query('SELECT * FROM listings LIMIT 6')->fetchAll();


loadView('listings/index', [
    'listings' => $listings
]);
