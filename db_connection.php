<?php
// Database configuration
$servername = "your_server_name"; // Update with your server name
$username = "your_username"; // Update with your username
$password = "your_password"; // Update with your password
$dbname = "your_database_name"; // Update with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
