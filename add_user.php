<?php
// Connection settings
$servername = "cloudserveradmin.database.windows.net";
$username = "cloudserveradmin";
$password = "Scout1st";
$dbname = "cloud_test_db";

// SQL Server connection information
$connectionInfo = array(
    "UID" => $username,
    "pwd" => $password,
    "Database" => $dbname,
    "LoginTimeout" => 30,
    "Encrypt" => 1,
    "TrustServerCertificate" => 0
);
$serverName = "tcp:$servername,1433";

// Create connection
$conn = sqlsrv_connect($serverName, $connectionInfo);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Collect POST data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Prepare the SQL query
    $sql = "INSERT INTO Users (name, email) VALUES (?, ?)";
    $params = array($name, $email);

    // Execute the query
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        echo "User added successfully";
    }
}

sqlsrv_close($conn);
?>

<!-- HTML form -->
<form method="post" action="">
    Name: <input type="text" name="name" required>
    Email: <input type="email" name="email" required>
    <input type="submit" value="Add User">
</form>

