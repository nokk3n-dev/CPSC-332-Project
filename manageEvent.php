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
    <a href="eventSignup.php" class="signup-button">Add a Sponsor</a>
    <a href="createEvent.php" class="signup-button">Add a Speaker</a>
    <a href="createEvent.php" class="signup-button">Add a Presenter</a>
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
<form action="processEvent.php" method="POST">
    <h1>Event Details</h1>
    <label for="eventName">Event Admin ID:</label>
    <input type="number" id="AdminID" name="AdminID" value="<?php echo htmlspecialchars($event['AdminID']); ?>" required><br><br>

    <label for="eventName">Event Name:</label>
    <input type="text" id="eventName" name="eventName" value="<?php echo htmlspecialchars($event['Name']); ?>" required><br><br>

    <label for="eventDescription">Event Description:</label><br>
    <textarea id="eventDescription" name="eventDescription" rows="4" cols="40" required><?php echo htmlspecialchars($event['Description']); ?></textarea><br><br>

    <label for="startDate">Start Date:</label>
    <input type="date" id="startDate" name="startDate" value="<?php echo htmlspecialchars($event['StartDate']); ?>" required><br><br>

    <label for="endDate">End Date:</label>
    <input type="date" id="endDate" name="endDate" value="<?php echo htmlspecialchars($event['EndDate']); ?>" required><br><br>

    <label for="startTime">Start Time:</label>
    <input type="time" id="startTime" name="startTime" value="<?php echo htmlspecialchars($event['StartTime']); ?>" required><br><br>

    <label for="endTime">End Time:</label>
    <input type="time" id="endTime" name="endTime" value="<?php echo htmlspecialchars($event['EndTime']); ?>" required><br><br>

    <label for="maxCapacity">Max Capacity:</label>
    <input type="number" id="maxCapacity" name="maxCapacity" value="<?php echo htmlspecialchars($event['MaxCapacity']); ?>" min="1" required><br><br>

    <label for="venueID">Venue ID:</label>
    <input type="number" id="venueID" name="venueID" value="<?php echo htmlspecialchars($event['VenueID']); ?>" min="1" required><br><br>

    <label for="universityID">University ID:</label>
    <input type="number" id="universityID" name="universityID" value="<?php echo htmlspecialchars($event['UniversityID']); ?>" min="1" required><br><br>

    <label for="address">Street Address:</label>
    <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($event['Address']); ?>" required><br><br>

    <label for="city">City:</label>
    <input type="text" id="city" name="city" value="<?php echo htmlspecialchars($event['City']); ?>" required><br><br>

    <label for="state">State:</label>
    <input type="text" id="state" name="state" value="<?php echo htmlspecialchars($event['State']); ?>" required><br><br>

    <label for="ZipCode">Zip Code:</label>
    <input type="number" id="ZipCode" name="ZipCode" value="<?php echo htmlspecialchars($event['ZipCode']); ?>" min="1" required><br><br>

    <label for="SubmissionDeadline">Presenters submission dealine:</label>
    <input type="date" id="SubmissionDeadline" name="SubmissionDeadline" value="<?php echo htmlspecialchars($event['SubmissionDeadline']); ?>" required><br><br>

    <label for="status">Status:</label>
    <select id="status" name="status" required>
        <option value="Published">Published</option>
        <option value="Unpublished">Unpublished</option>
    </select><br><br>

    <button type="submit">Update Event</button>
</form>
</div>
</body>
</html>