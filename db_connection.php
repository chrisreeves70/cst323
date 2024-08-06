<?php
// Retrieve connection parameters from environment variables
$servername = getenv('cloudserveradmin.database.windows.net');
$username = getenv('cloudserveradmin');
$password = getenv('Scout1st');
$dbname = getenv('cloud_test_db');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
