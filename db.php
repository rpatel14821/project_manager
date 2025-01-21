<?php
$servername = "localhost";
$username = "rpatel309";
$password = "rpatel309";
$dbname = "rpatel309";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>