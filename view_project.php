<?php
include 'db.php'; // Include database connection
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: home.php");
    exit();
}

if (!isset($_GET['project_id'])) {
    echo "Project ID is missing.";
    exit();
}
$project_id = $_GET['project_id'];
$project_name = $_GET['project_name'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Tasks</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            white-space: nowrap;
        }
        button:hover {
            background-color: #45a049;
        }
        #create-task-panel {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        #create-task-panel div {
            background-color: white;
            padding: 20px;
            margin: 10% auto;
            width: 50%;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            position: relative;
        }

        #create-task-panel h2 {
            margin-top: 0;
            color: #4CAF50;
        }

        #create-task-panel label {
            display: block;
            margin: 10px 0 5px;
        }

        #create-task-panel input[type="text"],
        #create-task-panel input[type="date"] {
            width: calc(100% - 20px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        #create-task-panel input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #create-task-panel input[type="submit"]:hover {
            background-color: #45a049;
        }

        #create-task-panel button {
            margin-top: 10px;
            background-color: #f44336;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #create-task-panel button:hover {
            background-color: #d32f2f;
        }

        #edit-task-panel {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        #edit-task-panel div {
            background-color: white;
            padding: 20px;
            margin: 10% auto;
            width: 50%;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            position: relative;
        }
    </style>
</head>
<body>
    <h1>Tasks for Project: <?php echo $project_name; ?></h1>
    <table>
        <thead>
            <tr>
                <th>Task Name</th>
                <th>Status</th>
                <th>Due Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM tasks WHERE project_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $project_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['task'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td>" . $row['due_date'] . "</td>";
                    echo "<td>
                        <button type='button' onclick=\"window.location.href='edit_form.php?task_id=" . $row['task_id'] . "&project_id=" . $project_id . "&project_name=" . $project_name . "'\">Edit</button>
                        <button type='button' onclick=\"window.location.href='delete_task.php?task_id=" . $row['task_id'] . "&project_id=" . $project_id . "&project_name=" . $project_name . "'\">Delete</button>
                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No tasks found for this project.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <br>
    <button type="button" onclick="window.location.href='create_form.php?task_id=<?php echo $task_id; ?>&project_id=<?php echo $project_id; ?>&project_name=<?php echo $project_name; ?>'">Create New Task</button>
    <br>
    <br>
    <button type="button" onclick="window.location.href='dashboard.php'">Back to Dashboard</button>
</body>
</html>