<?php
// Connection settings
$servername = "cloudserveradmin.database.windows.net";
$username = "cloudserveradmin";
$password = "Scout1st";
$dbname = "cloud_test_db";

// SQL Server connection
$connectionInfo = array(
    "UID" => $username,
    "pwd" => $password,
    "Database" => $dbname,
    "LoginTimeout" => 30,
    "Encrypt" => 1,
    "TrustServerCertificate" => 0
);
$serverName = "tcp:$servername,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Collect POST data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];

    // Prepare the SQL query
    $sql = "INSERT INTO Users (username, email) VALUES (?, ?)";
    $params = array($username, $email);

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
    Username: <input type="text" name="username" required>
    Email: <input type="email" name="email" required>
    <input type="submit" value="Add User">
</form>
