<?php
include "db_connect.php"; // include connection

$sql = "SELECT id, name, email FROM users";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP + MySQL Example</title>
</head>
<body>
    <h2>User List</h2>
    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // output data
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>
                            <a href='edit.php?id={$row['id']}'>Edit</a> |
                            <a href='delete.php?id={$row['id']}' onclick=\"return confirm('Are you sure?');\">Delete</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No data found</td></tr>";
        }
        ?>
    </table>
</body>
</html>

