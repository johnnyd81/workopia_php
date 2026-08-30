<?php

//require the myDB.php file to get the configuration details to properly connect to the custom-made local workopia database
$config = require basePath("config/myDB.php");
$db = new Database($config); //create a new Database instance using the app's custom created Database class

//get the unique id from the browser's url by using the $_GET superglobal that is available in the whole workopia application
$id = $_GET['id'] ?? '';

//the code below adds database protection to prevent unexpected sql injections into the custom database eg. changing data in the database
$params = [
    'id' => $id
];

//return the correct job-listing that matches the unique and specific id in the custom database
$listing = $db->query('SELECT * FROM listings WHERE id = :id', $params)->fetch();

//load the user's webpage (user's internet browser) using the custom-made loadView method stored in the helpers file in the root of the application
loadView('listings/show', [
    'listing' => $listing
]);
