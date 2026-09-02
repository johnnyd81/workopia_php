<?php

//import the myDB.php file that contains the custom configuration data to connect to the custom-built local workopia database
$db = new Database($config); //this creates a new database instance with the custom designed Database class

//the $listings variable contains the fetched available job listings left in the custom-made workopia database but limits them to 6 listings at a time
$listings = $db->query('SELECT * FROM listings LIMIT 6')->fetchAll();

//the loadView method shown below shows the available job listings that are stored in the workopia app's custom-made database on the user's browser webpage
loadView('listings/index', [
    'listings' => $listings
]);
