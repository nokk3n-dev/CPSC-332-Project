<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Signup</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .search-button-container {
            margin-top: 10px;
        }

        .back-button-container {
            margin-top: 20px; /* Adjust the margin-top value as needed */
        }
        h1 {text-align: center;}
    </style>
</head>
<body>
    <h1>Event Signup</h1>


    <div class="login-container">
        <!-- Form to search for event by ID -->
        <form action="eventDetails.php" method="GET">
            <label for="eventId">Enter Event Name:</label>
            <input type="text" id="eventName" name="eventName" placeholder="Event Name" required>
            <div class="search-button-container">
                <button type="submit">Search</button>
            </div>
        </form>

        <!-- Back button -->
        <div class="back-button-container">
            <button class="back-button" onclick="goBack()">Back</button>
        </div>

    </div>

    <script>
        function goBack() {
            window.location.href = 'home.php';
        }
    </script>
</body>
</html>