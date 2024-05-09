<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Details</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php
// Include the database connection file
require_once('config.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve event details from the form
    $eventName = $_POST['eventName'];
    $eventDescription = $_POST['eventDescription'];
    $startDate = $_POST['startDate'];
    $startTime = $_POST['startTime'];
    $endDate = $_POST['endDate'];
    $endTime = $_POST['endTime'];
    $maxCapacity = $_POST['maxCapacity'];
    $venueID = $_POST['venueID'];
    $universityID = $_POST['universityID'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zipCode = $_POST['ZipCode'];
    $submissionDeadline = $_POST['SubmissionDeadline'];
    $status = $_POST['status'];
    // Need to add AdminID

    // Prepare SQL statement to insert event details into the database
    $sql = "INSERT INTO event (Name, Description, StartDate, StartTime, EndDate, EndTime, MaxCapacity, VenueID, UniversityID, Address, City, State, ZipCode, SubmissionDeadline, Status) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("ssssssisssssiss", $eventName, $eventDescription, $startDate, $startTime, $endDate, $endTime, $maxCapacity, $venueID, $universityID, $address, $city, $state, $zipCode, $submissionDeadline, $status);

    // Execute the SQL statement
    if ($stmt->execute()) {
        echo "Event created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }

    // Close statement and database connection
    $stmt->close();
    $db->close();
}
?>

<!-- Back button -->
<div class="back-button-container">
        <button class="back-button" onclick="goBack()">Back</button>
    </div>

    <script>
        function goBack() {
            window.location.href = 'adminHome.php';
        }
    </script>

</body>
</html>