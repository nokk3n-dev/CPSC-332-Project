<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Details</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Back button -->
    <div class="back-button-container">
        <a href="eventSignup.php" class="back-button">Back</a>
    </div>

<?php
// Include the database connection file
require_once('config.php');

// Check if eventName is set in the GET request
if (isset($_GET['eventName'])) {
    // Retrieve eventName from the GET request
    $eventName = $_GET['eventName'];

    // Prepare SQL statement to select event details by eventName
    $sql = "SELECT * FROM event WHERE Name LIKE ?";
    $stmt = $db->prepare($sql);
    $eventNameParam = "%" . $eventName . "%"; // Add wildcards to search for partial matches
    $stmt->bind_param("s", $eventNameParam); // "s" indicates string data type

    // Execute the SQL statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Events found, display event details
        echo "<h2>Event Details</h2>";
        while ($event = $result->fetch_assoc()) {
            echo "<p>Event Name: " . $event['Name'] . "</p>";
            echo "<p>Event ID:   " . $event['EventID'] . "</p>";
            echo "<p>Start Date: " . $event['StartDate'] . "</p>";
            echo "<p>End Date:   " . $event['EndDate'] . "</p>";
            
            echo "<br>"; // Line break
        }
    } else {
        // No events found
        echo "<p>No events found with the name: " . $eventName . "</p>";
    }

    // Close statement and database connection
    $stmt->close();
    $db->close();
} else {
    // Display error message if eventName is not set
    echo "<p>Error: Event Name not provided.</p>";
}
?>

</body>
</html>
