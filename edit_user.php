<?php
// Include database connection file
include 'db_connection.php';

// Create connection
$conn = sqlsrv_connect($serverName, $connectionInfo);

if ($conn === false) {
    die("Connection failed: " . print_r(sqlsrv_errors(), true));
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    
    $sql = "UPDATE Users SET name = ?, email = ? WHERE id = ?";
    $params = array($name, $email, $id);
    $stmt = sqlsrv_query($conn, $sql, $params);
    
    if ($stmt === false) {
        die("Error updating record: " . print_r(sqlsrv_errors(), true));
    } else {
        echo "<p>User updated successfully.</p>";
    }
}

// Fetch user details
$id = $_GET['id'];
$sql = "SELECT * FROM Users WHERE id = ?";
$stmt = sqlsrv_query($conn, $sql, array($id));
$user = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

if ($user === false) {
    die("User not found: " . print_r(sqlsrv_errors(), true));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Edit User</h1>
        <form method="post" action="edit_user.php">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($user['id']); ?>">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($user['name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update User</button>
        </form>
        <a href="view_users.php" class="btn btn-secondary mt-3">Back to User List</a>
    </div>
</body>
</html>

<?php
// Close the connection
sqlsrv_close($conn);
?>
