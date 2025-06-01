<?php

//import the myDB.php file that has data needed to connect to the workopia database
$config = require basePath('config/myDB.php');

//create a new database instance by using the Database class and using the $config array as the argument to the method
$db = new Database($config);

//get the listings in the database but limit them to 6 results at a time
$listings = $db->query('SELECT * FROM listings LIMIT 6')->fetchAll();

//loads the homepage using the loadView helper method. The available listings that were retrieved are passed in as the second argument
loadView('home', [
    'listings' => $listings
]);
