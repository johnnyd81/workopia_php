<?php

//import the myDB.php file that returns the configuration data to connect to the custom-built local workopia database
$db = new Database($config); //this creates a new database instance using the custom-made Database class

//the $listings variable contains the retrieved available job listings found in the custom-made workopia database but limits the listings to 6 at a time
$listings = $db->query('SELECT * FROM listings LIMIT 6')->fetchAll();

//the loadView method shown below shows the retrieved job listings that are stored in the custom-made database onto the user's webpage
loadView('listings/index', [
    'listings' => $listings
]);
