<?php
include 'db.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: home.php");
    exit();
}

if (!isset($_POST['task_id']) || !isset($_POST['project_id']) || !isset($_POST['project_name']) || !isset($_POST['task']) || !isset($_POST['due_date']) || !isset($_POST['status'])) {
    echo "Missing required parameters.";
    exit();
}

$task_id = $_POST['task_id'];
$project_id = $_POST['project_id'];
$project_name = $_POST['project_name'];
$task = $_POST['task'];
$due_date = $_POST['due_date'];
$status = $_POST['status'];

$sql = "INSERT INTO tasks (task_id, project_id, task, due_date, status) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("issss", $task_id, $project_id, $task, $due_date, $status);
if ($stmt->execute() === TRUE) {
    header("Location: view_project.php?project_id=" . $project_id . "&project_name=" . $project_name);
    exit();
} else {
    header("Location: view_project.php?project_id=" . $project_id . "&project_name=" . $project_name);
    exit();
}
?>