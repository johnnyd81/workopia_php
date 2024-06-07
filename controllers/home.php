<?php
//import db.php file that has data to connect to the workopia database
$config = require basePath('config/db.php');

$db = new Database($config);

$listings = $db->query('SELECT * FROM listings LIMIT 6')->fetchAll();

//loads the homepage using the loadView helper method
loadView('home', [
    'listings' => $listings
]);
