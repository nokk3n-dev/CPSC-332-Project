<?php

// Include the database connection file
require_once('config.php');

// Function to validate password complexity
function validatePassword($password) {
    // Define regular expressions for password complexity
    $uppercase_regex = '/[A-Z]/';
    $lowercase_regex = '/[a-z]/';
    $number_regex = '/[0-9]/';
    $special_char_regex = '/[^A-Za-z0-9]/'; // Matches any character that is not a letter or digit
    $length_regex = '/^.{8,}$/'; // Matches strings of at least 8 characters

    // Check if password meets all complexity requirements
    if (preg_match($uppercase_regex, $password) &&
        preg_match($lowercase_regex, $password) &&
        preg_match($number_regex, $password) &&
        preg_match($special_char_regex, $password) &&
        preg_match($length_regex, $password)) {
        return true; // Password meets complexity requirements
    } else {
        return false; // Password does not meet complexity requirements
    }
}

// Check if form fields are set and not empty
if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmPassword'])) {
    // Retrieve form data from POST request
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $phone = isset($_POST['phone']) ? $_POST['phone'] : null; // Handle optional phone field

    if (!validatePassword($password)) {
        header("Location: registration.html?error=password_too_easy");
        exit;
    }

    // Validate confirm password
    if ($password !== $confirmPassword) {
        header("Location: registration.html?error=passwords_do_not_match");
        exit; // Exit script if passwords don't match
    }

    // Prepare SQL statement to insert user data into the database
    $sql = "INSERT INTO user (Fname, Lname, Email, Password, PhoneNumber) VALUES (?, ?, ?, ?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("sssss", $fname, $lname, $email, $password, $phone);

    // Execute the SQL statement
    if ($stmt->execute()) {
        // Registration successful
        echo "Registration successful!";
        header("Location: home.php");
    } else {
        // Registration failed
        echo "Error: " . $sql . "<br>" . $db->error;
    }

    // Close statement
    $stmt->close();
} else {
    // Handle missing form fields
    echo "Error: Form fields are missing.";
}

// Close database connection
$db->close();

?>