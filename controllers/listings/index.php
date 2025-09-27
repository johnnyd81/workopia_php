<?php

//import the myDB.php file that returns the configuration data to connect to the database i.e. the custom workopia database
$config = require basePath("config/myDB.php");
$db = new Database($config); //creates a new database instance

//the $listings variable stores the retrieved job listings but limits them to 6 listings at each time
$listings = $db->query('SELECT * FROM listings LIMIT 6')->fetchAll();

//the method below passes the retrieved job listings into the view (i.e. the user's webpage)
loadView('listings/index', [
    'listings' => $listings
]);
