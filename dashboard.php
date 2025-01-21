<?php
include 'db.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: home.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task and Project Manager - Dashboard</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        header {
            background-color: #3498db;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 10;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-left: 40px;
            padding-right: 40px;
            box-sizing: border-box;
            height: 10vh;
        }

        main {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            margin: 80px 0;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            text-align: center;
            width: 100%;
            overflow-y: auto;
            box-sizing: border-box;
            margin-top: 120px;
            height: 85vh;
        }

        h2 {
            align-self: center;
            margin-top: 20px;
        }

        .nav-links {
            display: flex;
            gap: 20px;
        }

        .nav-links a {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            white-space: nowrap;
        }

        .nav-links a:hover {
            background-color: #45a049;
        }

        #logo {
            width: 100px;
            height: auto;
            margin-top: 20px;
            margin-bottom: 20px;
            border-radius: 50%;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        #logo:hover {
            transform: scale(1.1);
        }
        
        table {
            width: 90%;
            border-collapse: collapse;
            text-align: center;
            margin: 0 auto;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        td {
            border-bottom: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        a {
            margin-right: 0px;
        }
    </style>
</head>

<body>
    <header>
        <img id="logo" src="images/project-manager.png" alt="Project Manager">
        <h1>Welcome to the Task and Project Management System</h1>
        <div class="nav-links">
            <button type="button" onclick="window.location.href='logout.php'">Logout</button>
        </div>
    </header>
    <main>
        <h2>Logged in as: <?php echo $_SESSION['username']; ?></h2>
        <p>What would you like to do today?</p>
        <table>
            <thead>
                <tr>
                    <th>Project Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM projects WHERE user_id = " . $_SESSION['user_id'];
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['project'] . "</td>";
                        echo "<td>
                            <button type='button' onclick=\"window.location.href='view_project.php?project_id=" . $row['project_id'] . "&project_name=" . $row['project'] . "'\">View</button>
                            <button type='button' onclick=\"window.location.href='edit_project_form.php?project_id=" . $row['project_id'] . "'\">Edit</button>
                            <button type='button' onclick=\"window.location.href='delete_project.php?project_id=" . $row['project_id'] . "'\">Delete</button>
                        </td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
        <br>
        <button type="button" onclick="window.location.href='create_project_form.php'">Create New Project</button>
    </main>
</body>

</html>
