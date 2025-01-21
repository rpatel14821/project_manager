<?php
include 'db.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: home.php");
    exit();
}

$max_task_id_sql = "SELECT MAX(task_id) FROM tasks";
$max_task_id_result = $conn->query($max_task_id_sql);
$max_task_id = $max_task_id_result->fetch_assoc()["MAX(task_id)"] + 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
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
    <h1>Create Task</h1>
    <form action="create_task.php" method="post">
        <input type="hidden" name="task_id" value="<?php echo $max_task_id; ?>">
        <input type="hidden" name="project_id" value="<?php echo $_GET['project_id']; ?>">
        <input type="hidden" name="project_name" value="<?php echo $_GET['project_name']; ?>">
        <label for="task">Task:</label>
        <input type="text" name="task" id="task" required><br>
        <label for="due_date">Due Date:</label>
        <input type="date" name="due_date" id="due_date" required><br>
        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="In Progress">In Progress</option>
            <option value="Completed">Completed</option>
        </select><br>
        <input type="submit" value="Create Task">
    </form>
</body>

</html>
