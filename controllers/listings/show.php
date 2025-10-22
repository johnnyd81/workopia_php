<?php

//require the myDB.php file to get the configuration details to connect to the custom local database
$config = require basePath("config/myDB.php");
$db = new Database($config);

//get the unique id from the browser url by using the $_GET superglobal that is available to the entire app
$id = $_GET['id'] ?? '';

//the code below makes it safer to prevent unexpected sql injections into the database eg. accidentally dropping a table or incorrect information being added
$params = [
    'id' => $id
];

//return the correct job listing that matches the id 
$listing = $db->query('SELECT * FROM listings WHERE id = :id', $params)->fetch();

//load the user's view (browser webpage) using the custom-built loadView method stored in the helpers.php file
loadView('listings/show', [
    'listing' => $listing
]);
