<?php

// Define database connection parameters
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'aem');

// Establish database connection
$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die("Connection to database failed: " . $db->connect_error);

?>