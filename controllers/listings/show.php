<?php

//require the myDB.php file to get the configuration details to connect to the database
$config = require basePath("config/myDB.php");
$db = new Database($config);

//get the unique id from the url by using the $_GET superglobal that is available to the entire application
$id = $_GET['id'] ?? '';

//the code below makes it safer to prevent unexpected sql injections in the database eg. accidentally dropping a table or incorrect information being added
$params = [
    'id' => $id
];

//return the correct job listing that matches the unique id 
$listing = $db->query('SELECT * FROM listings WHERE id = :id', $params)->fetch();

//load the view using the custom-built loadView method
loadView('listings/show', [
    'listing' => $listing
]);
