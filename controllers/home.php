<?php

//import the myDB.php file that contains the data needed to connect to the custom-built local workopia database for the application
$config = require basePath('config/myDB.php');

//create a new database instance by using the custom Database class and using the $config array as the only argument in the Database class
$db = new Database($config);

//gets all the job listings stored in the custom-built workopia database but limits them to 6 results at each time
$listings = $db->query('SELECT * FROM listings LIMIT 6')->fetchAll();

//the code below displays the homepage using the custom-built loadView helper method. The available listings that are retrieved from the database are passed in as the second argument
loadView('home', [
    'listings' => $listings
]);
