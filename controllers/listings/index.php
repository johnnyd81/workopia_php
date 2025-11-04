<?php

//import the myDB.php file that returns the configuration data to connect to the custom database i.e. the custom workopia database
$config = require basePath("config/myDB.php");
$db = new Database($config); //creates a new database instance

//the $listings variable contains the retrieved job listings from the database but limits them to 6 listings
$listings = $db->query('SELECT * FROM listings LIMIT 6')->fetchAll();

//the method below displays the retrieved available job listings into the view (i.e. the user's webpage view)
loadView('listings/index', [
    'listings' => $listings
]);
