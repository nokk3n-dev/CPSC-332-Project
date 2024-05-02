<?php

// Link to website
// localhost/CPSC-332-Project/login.html

// Include the database connection file
require_once('config.php');

// Retrieve username and password from POST request
$username = $_POST['username'];
$password = $_POST['password'];

// Prepare SQL statement to select user with the provided username and password
$sql = "SELECT * FROM user WHERE Email = ? AND Password = ?";
$stmt = $db->prepare($sql);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

// Validate username and password (you should implement proper validation and hashing)
if ($result->num_rows == 1) {
    // Start a session and set a session variable to indicate login status
    session_start();
    $_SESSION['loggedin'] = true;
    echo "success"; // Return success message to JavaScript
} else {
    echo "failure"; // Return failure message to JavaScript
}

// Close statement and database connection
$stmt->close();
$db->close();

?>