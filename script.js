document.addEventListener("DOMContentLoaded", function() {

    document.getElementById("loginForm").addEventListener("submit", function(event) {
        event.preventDefault();
        var username = document.getElementById("email").value;
        var password = document.getElementById("password").value;

        // AJAX request to login.php
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "login.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = xhr.responseText;
                if (response.trim() == "success") {
                    window.location.href = "home.php"; // Redirect to home page
                } else {
                    document.getElementById("message").innerHTML = "Incorrect Email or Password";
                }
            }
        };
        xhr.send("username=" + username + "&password=" + password);
    });

    document.getElementById("registrationForm").addEventListener("submit", function(event) {
        var password = document.getElementById("password").value;

        // Reset error message display
        document.getElementById("passwordError").style.display = "none";

        // Validate password complexity
        if (!validatePassword(password)) {
            // Password too simple, display error message
            document.getElementById("passwordError").style.display = "block";
            event.preventDefault(); // Prevent form submission
        }
    });
});

// Function to validate password complexity
function validatePassword(password) {
    // Define regular expressions for password complexity
    var uppercase_regex = /[A-Z]/;
    var lowercase_regex = /[a-z]/;
    var number_regex = /[0-9]/;
    var special_char_regex = /[^A-Za-z0-9]/; // Matches any character that is not a letter or digit
    var length_regex = /^.{8,}$/; // Matches strings of at least 8 characters

    // Check if password meets all complexity requirements
    return (uppercase_regex.test(password) &&
        lowercase_regex.test(password) &&
        number_regex.test(password) &&
        special_char_regex.test(password) &&
        length_regex.test(password));
}