<?php
//import db.php file that has data needed to connect to the workopia database
$config = require basePath('config/myDB.php');

//create a new database instance by using the Database class
$db = new Database($config);

$listings = $db->query('SELECT * FROM listings LIMIT 6')->fetchAll();

//loads the homepage using the loadView helper method
loadView('home', [
    'listings' => $listings
]);
