<?php

//require the myDB.php file to get the configuration details to connect to the database
$config = require basePath("config/myDB.php");
$db = new Database($config);

//get the id from the url by using the $_GET superglobal that is available to the entire app
$id = $_GET['id'] ?? '';

//makes it safer to prevent unexpected sql injections in the database eg. accidentally dropping a table
$params = [
    'id' => $id
];

//get the listing that matches the specific $id 
$listing = $db->query('SELECT * FROM listings WHERE id = :id', $params)->fetch();

loadView('listings/show', [
    'listing' => $listing
]);
