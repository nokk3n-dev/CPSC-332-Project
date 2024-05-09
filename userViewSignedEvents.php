<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Events</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    .signup-button {
        display: block;
        width: 200px;
        height: 80px;
        margin: 50px auto; /* Center the button horizontally */
        font-size: 20px;
        font-weight: bold;
        text-align: center;
        line-height: 80px;
        background-color: #007bff; /* Blue background color */
        color: #fff; /* White text color */
        border: none;
        border-radius: 10px;
        cursor: pointer;
        text-decoration: none; /* Remove default underline for anchor element */
    }

    .signup-button:hover {
        background-color: #0056b3; /* Darker blue color on hover */
    }

    .button-row {
        display: flex;
        justify-content: space-between; /* Adjust as needed */
    }
    h1 {text-align: center;}
</style>

<body>

<!-- Back button -->
<a href="userHome.php" class="signup-button">Back</a>

<div class="login-container">

<?php
// Include the database connection file
require_once('config.php');

// Check if the user is signed in (You need to implement your authentication logic here)

// Retrieve the currently signed-in user's ID (You need to implement your authentication logic here)
$userID = 1; // For testing purposes, replace this with the actual user ID of the signed-in user

// Prepare SQL statement to fetch events created by the currently signed-in user
$sql = "SELECT * FROM event WHERE AdminID = ?";
$stmt = $db->prepare($sql);
$stmt->bind_param("i", $userID);
$stmt->execute();
$result = $stmt->get_result();



// Check if there are any events created by the user
if ($result->num_rows > 0) {
    // Display the list of events
    echo "<h1>Your Events:</h1>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li><a href='userUnregister.php?eventID=" . $row['EventID'] . "'>" . $row['Name'] . "</a></li>";
    }
    echo "</ul>";
} else {
    echo "You haven't registered for any events yet.";
}

// Close the statement and database connection
$stmt->close();
$db->close();
?>

</div>

</body>
</html>