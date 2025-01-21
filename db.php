<?php
$servername = "localhost";
// Change username, password, and database name to your own
$username = "username";
$password = "password";
$dbname = "dbname";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
