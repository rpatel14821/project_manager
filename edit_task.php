<?php
include 'db.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: home.php");
    exit();
}

$task_id = $_POST['task_id'];
$project_id = $_POST['project_id'];
$project_name = $_POST['project_name'];
$task = $_POST['task'];
$due_date = date('Y-m-d', strtotime($_POST['due_date']));
$status = $_POST['status'];
$sql = "UPDATE tasks SET task = '$task', due_date = '$due_date', status = '$status' WHERE task_id = $task_id";
if ($conn->query($sql) === TRUE) {
    header("Location: view_project.php?project_id=$project_id&project_name=$project_name");
    exit();
} else {
    echo "Error updating task: " . $conn->error;
    exit();
}
?>