<?php
$servername = "cloudserveradmin.database.windows.net";
$username = "cloudserveradmin";
$password = "Scout1st";
$dbname = "cloud_test_db";


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

// Check connection
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}
echo "Connected successfully";
?>
