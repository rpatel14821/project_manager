<?php

include 'db.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: home.php");
    exit();
}

if (isset($_GET['project_id'])) {
    $project_id = $_GET['project_id'];

    $sql = "DELETE FROM projects WHERE project_id = '$project_id'";
    $result = $conn->query($sql);

    if ($result) {
        header("Location: dashboard.php");
        exit();
    }
}
