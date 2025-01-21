<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager Signup</title>
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
        #result {
            color: red;
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
        <h1>Task Manager Signup</h1>
        <form action="register.php" method="post">
            <label for="username">Username:</label>
            <input id="username" type="text" name="username">
            <label for="password">Password:</label>
            <input id="password" type="password" name="password">
            <label for="confirm_password">Confirm Password:</label>
            <input id="confirm_password" type="password" name="confirm_password" onchange="checkPassword()">
            <p id="result"></p>
            <button id="login" type="submit" onclick="validateForm()">Signup</button>
        </form>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
    <script>
        function validateForm() {
            let user = document.getElementById("username").value;
            let pass = document.getElementById("password").value;
            let confirmPass = document.getElementById("confirm_password").value;
            if (user == "" || pass == "" || confirmPass == "") {
                alert("Username and password must be filled out");
                return false;
            }
            if (pass !== confirmPass) {
                alert("Passwords do not match");
                return false;
            }
            return true;
        }
        
        function checkPassword() {
            let pass = document.getElementById("password").value;
            let confirm_pass = document.getElementById("confirm_password").value;
            if (pass !== confirm_pass) {
                document.getElementById("result").innerHTML = "Passwords do not match";
                document.getElementById("login").disabled = true;
                document.getElementById("confirm_password").style.borderColor = "red";
                return false;
            }
            document.getElementById("result").innerHTML = "";
            document.getElementById("login").disabled = false;
            document.getElementById("confirm_password").style.borderColor = "black";
            return true;
        }
    </script>
</body>
</html>