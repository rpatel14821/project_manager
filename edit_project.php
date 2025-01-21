<?php

include 'db.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: home.php");
    exit();
}

$project_id = $_POST['project_id'];
$project_name = $_POST['project_name'];

$sql = "UPDATE projects SET project = '$project_name' WHERE project_id = '$project_id'";

if ($conn->query($sql) === TRUE) {
    header("Location: dashboard.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
