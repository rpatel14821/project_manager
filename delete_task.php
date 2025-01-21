<?php
include 'db.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: home.php");
    exit();
}

if (!isset($_GET['task_id'])) {
    echo "Task ID is missing.";
    exit();
}

$task_id = $_GET['task_id'];
$sql = "DELETE FROM tasks WHERE task_id = $task_id";
if ($conn->query($sql) === TRUE) {
    header("Location: view_project.php?project_id=" . $_GET['project_id'] . "&project_name=" . $_GET['project_name']);
    exit();
} else {
    header("Location: view_project.php?project_id=" . $_GET['project_id'] . "&project_name=" . $_GET['project_name']);
    exit();
}
?>