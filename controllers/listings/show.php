<?php

$config = require basePath("config/db.php");
$db = new Database($config);

//get id
$id = $_GET['id'] ?? '';

//makes it safer to prevent sql injections
$params = [
    'id' => $id
];

$listing = $db->query('SELECT * FROM listings WHERE id = :id', $params)->fetch();

loadView('listings/show', [
    'listing' => $listing
]);
