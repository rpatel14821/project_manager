<?php
include 'db.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: home.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$project_name = $_POST['project'];
$max_project_id_sql = "SELECT MAX(project_id) FROM projects";
$max_project_id_result = $conn->query($max_project_id_sql);
$max_project_id = $max_project_id_result->fetch_assoc()["MAX(project_id)"] + 1;

$sql = "INSERT INTO projects (project_id, user_id, project) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iis", $max_project_id, $user_id, $project_name);
if ($stmt->execute() === TRUE) {
    header("Location: dashboard.php");
    exit();
} else {
    header("Location: dashboard.php");
    exit();
}
?>