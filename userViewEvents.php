<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Events</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    .filter-button {
        display: block;
        width: 200px;
        height: 80px;
        margin: 50px auto; /* Center the button horizontally */
        font-size: 20px;
        font-weight: bold;
        text-align: center;
        line-height: 40px;
        background-color: #007bff; /* Blue background color */
        color: #fff; /* White text color */
        border: none;
        border-radius: 10px;
        cursor: pointer;
        text-decoration: none; /* Remove default underline for anchor element */
    }

    .filter-button:hover {
        background-color: #0056b3; /* Darker blue color on hover */
    }

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
        <button class="filter-button show-published">Show Published</button>
        <button class="filter-button show-all">Show All</button>
    </div>

    <div class="login-container">
        <h1>All Events</h1>
        <?php
        // Include the database connection file
        require_once('config.php');

        // Default SQL statement to select all events
        $sql = "SELECT * FROM event";

        // If the user has clicked "Show Published", update the SQL statement
        if (isset($_GET['show']) && $_GET['show'] === 'published') {
            $sql = "SELECT * FROM event WHERE Status = 'Published'";
        }

        $stmt = $db->prepare($sql);

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
        ?>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get the buttons
        const showPublishedBtn = document.querySelector('.show-published');
        const showAllBtn = document.querySelector('.show-all');

        // Add event listeners to the buttons
        showPublishedBtn.addEventListener('click', function() {
            window.location.href = 'userViewEvents.php?show=published';
        });

        showAllBtn.addEventListener('click', function() {
            window.location.href = 'userViewEvents.php';
        });
    });
</script>

</body>
</html>
