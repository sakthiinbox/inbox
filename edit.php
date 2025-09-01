<?php
include "db_connect.php";

// Get user id
$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id=$id";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name  = $_POST['name'];
    $email = $_POST['email'];

    $sql = "UPDATE users SET name='$name', email='$email' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); // redirect
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Edit User</title></head>
<body>
    <h2>Edit User</h2>
    <form method="POST">
        Name: <input type="text" name="name" value="<?php echo $user['name']; ?>" required><br><br>
        Email: <input type="email" name="email" value="<?php echo $user['email']; ?>" required><br><br>
        <button type="submit">Update</button>
    </form>
    <br>
    <a href="index.php">Back to List</a>
</body>
</html>
