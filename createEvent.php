<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Event</title>
</head>
<body>
    <!-- Back button -->
    <div class="back-button-container">
        <button class="back-button" onclick="goBack()">Back</button>
    </div>

    <h1>Create Event</h1>

    <!-- Event creation form -->
    <form action="processEvent.php" method="POST">
        <label for="eventName">Event Name:</label>
        <input type="text" id="eventName" name="eventName" required><br><br>

        <label for="eventDescription">Event Description:</label><br>
        <textarea id="eventDescription" name="eventDescription" rows="4" cols="50" required></textarea><br><br>

        <label for="startDate">Start Date:</label>
        <input type="date" id="startDate" name="startDate" required><br><br>

        <label for="endDate">End Date:</label>
        <input type="date" id="endDate" name="endDate" required><br><br>

        <label for="startTime">Start Time:</label>
        <input type="time" id="startTime" name="startTime" required><br><br>

        <label for="endTime">End Time:</label>
        <input type="time" id="endTime" name="endTime" required><br><br>

        <label for="maxCapacity">Max Capacity:</label>
        <input type="number" id="maxCapacity" name="maxCapacity" min="1" required><br><br>

        <label for="venueID">Venue ID:</label>
        <input type="number" id="venueID" name="venueID" min="1" required><br><br>

        <label for="universityID">University ID:</label>
        <input type="number" id="universityID" name="universityID" min="1" required><br><br>

        <label for="address">Street Address:</label>
        <input type="text" id="address" name="address" required><br><br>

        <label for="city">City:</label>
        <input type="text" id="city" name="city" required><br><br>

        <label for="state">State:</label>
        <input type="text" id="state" name="state" required><br><br>

        <label for="ZipCode">Zip Code:</label>
        <input type="number" id="ZipCode" name="ZipCode" min="1" required><br><br>

        <label for="SubmissionDeadline">Presenter's submission dealine:</label>
        <input type="date" id="SubmissionDeadline" name="SubmissionDeadline" required><br><br>

        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="Published">Published</option>
            <option value="Unpublished">Unpublished</option>
        </select><br><br>

        <button type="submit">Create Event</button>
    </form>

    <script>
        function goBack() {
            window.location.href = 'home.php';
        }
    </script>
</body>
</html>