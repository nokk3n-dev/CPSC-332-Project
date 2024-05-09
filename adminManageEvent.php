<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Events</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .search-button-container {
            margin-top: 10px;
        }

        .back-button-container {
            margin-top: 20px;
        }

        h1 {text-align: center;}
    </style>
</head>

<body>

<!-- Back button -->
<div class="back-button-container">
            <button class="back-button" onclick="goBack()">Back</button>
</div>

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
        echo "<li><a href='manageEvent.php?eventID=" . $row['EventID'] . "?AdminID=" . $row['AdminID'] . "'>" . $row['Name'] . "</a></li>";
    }
    echo "</ul>";
} else {
    echo "You haven't created any events yet.";
}

// Close the statement and database connection
$stmt->close();
$db->close();
?>

</div>

</body>
</html>