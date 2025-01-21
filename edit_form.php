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
$sql = "SELECT * FROM tasks WHERE task_id = $task_id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Task not found.";
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }
        form {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            width: 50%;
            margin: 10% auto;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input[type="text"],
        input[type="date"],
        select {
            width: calc(100% - 20px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <h1>Edit Task</h1>
    <form action="edit_task.php" method="post">
        <input type="hidden" name="task_id" value="<?php echo $_GET['task_id']; ?>">
        <input type="hidden" name="project_id" value="<?php echo $_GET['project_id']; ?>">
        <input type="hidden" name="project_name" value="<?php echo $_GET['project_name']; ?>">
        <label for="task">Task:</label>
        <input type="text" name="task" id="task" value="<?php echo $row['task']; ?>"><br>
        <label for="due_date">Due Date:</label>
        <input type="date" name="due_date" id="due_date" value="<?php echo $row['due_date']; ?>"><br>
        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="In Progress" <?php if ($row['status'] == 'In Progress') echo 'selected'; ?>>In Progress</option>
            <option value="Completed" <?php if ($row['status'] == 'Completed') echo 'selected'; ?>>Completed</option>
        </select><br>
        <input type="submit" value="Edit Task">
    </form>
</body>

</html>
