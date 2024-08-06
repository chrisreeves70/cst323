<?php
// Database configuration
$servername = "cloudserveradmin.database.windows.net";
$username = "cloudserveradmin";
$password = "Scout1st";
$dbname = "cloud_test_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
