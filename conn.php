<?php
// Database connection parameters
$servername = "localhost";
$username = "usman";
$password = "1234";
$database = "reports";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } else {
//     echo "Connected successfully";
// }
?>
