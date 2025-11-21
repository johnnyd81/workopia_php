<?php

//import the myDB.php file that contains data needed to connect to the custom local workopia database for this application
$config = require basePath('config/myDB.php');

//create a new database instance by using the custom Database class and using the $config array as the only argument
$db = new Database($config);

//gets all the available job listings stored in the custom-built workopia database but limits them to 6 results at each time
$listings = $db->query('SELECT * FROM listings LIMIT 6')->fetchAll();

//the code below loads the homepage using the custom-built loadView helper method. The available listings that are fetched are passed in as the second argument
loadView('home', [
    'listings' => $listings
]);
