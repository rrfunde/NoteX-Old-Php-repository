<?php


// Configuration
$dbhost = 'localhost';
$dbname = 'test';

// Connect to test database
$connection = new MongoClient(); // connects to localhost:27017
//$db = $connection->$dbname;
echo "success";