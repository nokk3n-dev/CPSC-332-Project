<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Event</title>
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

<div class="button-row">
    <a href="userHome.php" class="signup-button">Back</a>
</div>

<?php
// Include the database connection file
require_once('config.php');

// Check if the eventID is set in the URL
if (isset($_GET['eventID'])) {
    // Retrieve the eventID from the URL
    $eventID = $_GET['eventID'];

    // Prepare SQL statement to fetch event details
    $sql = "SELECT * FROM event WHERE EventID = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $eventID);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the event exists
    if ($result->num_rows > 0) {
        // Display event details
        $event = $result->fetch_assoc();
        // echo "<h3>" . $event['Name'] . "</h3>";
        // echo "<p>Start Date: " . $event['StartDate'] . "</p>";
        // echo "<p>End Date: " . $event['EndDate'] . "</p>";
        // echo "<p>Description: " . $event['Description'] . "</p>";
    } else {
        echo "<p>Event not found.</p>";
    }

    // Close the statement
    $stmt->close();
} else {
    echo "<p>EventID not specified.</p>";
}

// Close the database connection
$db->close();
?>

<div class="login-container">
<!-- Event creation form -->
<form action="processUnregister.php" method="POST">
    <h1>Event Details</h1>
    <label for="eventName">Event Name:</label>
    
    <label for="eventDescription">Event Description:</label><br>
    
    <label for="startDate">Start Date:</label>
    
    <label for="endDate">End Date:</label>
    
    <label for="startTime">Start Time:</label>
    
    <label for="endTime">End Time:</label>
    
    <label for="address">Street Address:</label>
    
    <label for="city">City:</label>
    
    <label for="state">State:</label>
    
    <label for="ZipCode">Zip Code:</label>
    
    <label for="status">Status:</label>

    <button type="submit">Unregister</button>
</form>
</div>
</body>
</html>