<?php

//import the db.php file that returns the configuration data to connect to the database i.e. workopia database
$config = require basePath("config/myDB.php");
$db = new Database($config);

//store the available listings in the listings variable but limit them to six listings
$listings = $db->query('SELECT * FROM listings LIMIT 6')->fetchAll();

//pass the retrieved listings into the view
loadView('listings/index', [
    'listings' => $listings
]);
