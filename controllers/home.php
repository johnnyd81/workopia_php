<?php

//import the myDB.php file that has the required data to connect to the custom-made local workopia database for the app
$config = require basePath('config/myDB.php');//the custom-made basePath method from the helpers.php file

//create a new database instance by using the custom Database class and using the imported $config array as the only argument to the custom-made Database class
$db = new Database($config);

//returns all the available job listings stored in the custom-made local workopia database but limits them to 6 results per request
$listings = $db->query('SELECT * FROM listings LIMIT 6')->fetchAll();

//the code below shows the main homepage using the custom-made loadView helper method. The available database job-listings are then added to the method
loadView('home', [
    'listings' => $listings
]);
