<!-- Link to Website -->
<!-- http://localhost/CPSC-332-Project/login.html -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AEM</title>
    <style>
        /* CSS for the button */
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
    </style>
</head>
<body>
    <div class="logout-container">
        <button onclick="logout()">Logout</button>
    </div>
    <h1>Academic Event Management Company</h1>

    <a href="eventSignup.php" class="signup-button">Find an Event</a>

    <a href="createEvent.php" class="signup-button">Create an Event</a>
    
    <!-- This is how to access the database -->
    <?php

        // Include the configuration file
        // require_once('config.php');

        // Establish a database connection using the defined constants
        // $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die("Connection Failed: " . $db->connect_error);

    ?>

    <script>
        function logout() {
            // Redirect user to the login page
            window.location.href = "login.html";
        }
    </script>
</body>
</html>