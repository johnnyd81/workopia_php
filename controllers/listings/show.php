<?php

$config = require basePath("config/myDB.php");
$db = new Database($config);

//get the id from the url via the $_GET superglobal
$id = $_GET['id'] ?? '';

//makes it safer to prevent sql injections in the database eg. accidentally dropping a table
$params = [
    'id' => $id
];

//get the listing that matches the $id
$listing = $db->query('SELECT * FROM listings WHERE id = :id', $params)->fetch();

loadView('listings/show', [
    'listing' => $listing
]);
