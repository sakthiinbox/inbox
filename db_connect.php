<?php
$servername = "localhost"; // XAMPP default
$username   = "root";      // default XAMPP user
$password   = "";          // leave empty in XAMPP
$dbname     = "testdb";    // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
