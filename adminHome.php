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
        .logout-button {
            display: block;
            width: 200px;
            height: 80px;
            margin: 50px auto; /* Center the button horizontally */
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            line-height: 80px;
            background-color: #090088; /* Blue background color */
            color: #fff; /* White text color */
            border: none;
            border-radius: 10px;
            cursor: pointer;
            text-decoration: none; /* Remove default underline for anchor element */
        }
        .logout-button:hover {
            background-color: #010048; /* Darker blue color on hover */
        }
        .title-header {
            text-align: center;
            font-size: 40px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="title-header">Academic Event Management Company - Admin Account</div>

    <a href="adminManageEvent.php" class="signup-button">Manage Events</a>

    <a href="createEvent.php" class="signup-button">Create Event</a>

    <a href="login.html" class="logout-button">Log Out</a>

</body>
</html>