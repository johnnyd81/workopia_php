<?php

//require the myDB.php file to get the configuration details to connect directly to the custom-made local workopia database
$config = require basePath("config/myDB.php");
$db = new Database($config); //create a new Database instance using the custom-made Database class

//get the unique id from the browser's url by using the $_GET superglobal that is available to the entire workopia application
$id = $_GET['id'] ?? '';

//the code below adds protection to prevent unexpected sql injections into the custom database eg. accidentally dropping a table or incorrect information being added
$params = [
    'id' => $id
];

//return the correct job listing that matches the unique id in the database
$listing = $db->query('SELECT * FROM listings WHERE id = :id', $params)->fetch();

//load the user's view (user's web browser page) using the custom-made loadView method stored in the helpers.php file in the root of the application
loadView('listings/show', [
    'listing' => $listing
]);
