<?php
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection file
    require_once "conn.php";

    // Get username and password from form
    $email = $_POST["username"];
    $password = $_POST["password"];

    // Sanitize user input to prevent SQL injection (not as secure as prepared statements)
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    // Construct SQL query (not recommended due to vulnerability to SQL injection)
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    // Check if query was successful
    if ($result) {
        // Check if user exists and credentials are correct
        if (mysqli_num_rows($result) == 1) {
            // User exists and credentials are correct, set session variables
            $_SESSION["username"] = $email;
            echo "Welcome";

            // Redirect to dashboard or any other page after successful login
            header("Location: index.php");
            exit();
        } else {
            // Invalid credentials, redirect back to login page
            header("Location: login.php?error=invalid_credentials");
            exit();
        }
    } else {
        // Error executing query, handle it appropriately
        // For demonstration purposes, redirecting back to login page
        header("Location: login.php?error=database_error");
        exit();
    }
} else {
    // If the form was not submitted, redirect back to login page
    header("Location: login.php");
    exit();
}
?>
