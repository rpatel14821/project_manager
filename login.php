<?php
session_start();
unset($_SESSION['user_id']);
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            background-color: #3498db;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        h1 {
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 10px;
        }
        input {
            padding: 20px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
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
        p {
            text-align: center;
        }
        a {
            color: #4CAF50;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Task Manager Login</h1>
        <form action="authenticate.php" method="post">
            <label for="username">Username:</label>
            <input id="username" type="text" name="username">
            <label for="password">Password:</label>
            <input id="password" type="password" name="password">
            <button id="login" type="submit" onclick="validateForm()">Login</button>
        </form>
        <p>Don't have an account? <a href="signup.php">Sign up</a></p>
    </div>
        
    <script>
        function validateForm() {
            let user = document.getElementById("username").value;
            let pass = document.getElementById("password").value;
            if (user == "" || pass == "") {
                alert("Username and password must be filled out");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>