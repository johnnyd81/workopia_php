<?php

//import the myDB.php file that returns the configuration data to connect to the database i.e. the custom workopia database
$config = require basePath("config/myDB.php");
$db = new Database($config); //create a new database instance

//store the retrieved listings in the listings variable but limit them to 6 listings at each time
$listings = $db->query('SELECT * FROM listings LIMIT 6')->fetchAll();

//passes the retrieved job listings into the view (i.e. the displayed webpage) to be displayed by using the custom-built loadView helper method
loadView('listings/index', [
    'listings' => $listings
]);
