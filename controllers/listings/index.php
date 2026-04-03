<?php

//import the myDB.php file that returns the configuration data to connect to the custom-built local workopia database;
$db = new Database($config); //this creates a new database instance using the custom-built Database class

//the $listings variable contains the retrieved job listings found in the custom-made workopia database but limits them to 6 listings at a time
$listings = $db->query('SELECT * FROM listings LIMIT 6')->fetchAll();

//the loadView method below shows the retrieved job listings that are available in the custom-made database into the view (i.e. the user's browser)
loadView('listings/index', [
    'listings' => $listings
]);
