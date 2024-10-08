<?php

$config = require basePath("config/myDB.php");
$db = new Database($config);

//get id from the url
$id = $_GET['id'] ?? '';

//makes it safer to prevent sql injections in the database eg. drop table 
$params = [
    'id' => $id
];

//get the listing that matches the $id
$listing = $db->query('SELECT * FROM listings WHERE id = :id', $params)->fetch();

loadView('listings/show', [
    'listing' => $listing
]);
