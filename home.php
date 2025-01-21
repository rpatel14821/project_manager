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
    <title>Task and Project Manager</title>
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
        main > h2 {
            align-self: center;
            margin-top: 20px;
        }
        main > * {
            margin: 0;
        }
        footer {
            background-color: #3498db;
            padding: 10px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            box-sizing: border-box;
            height: 5vh;
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
            width: 150px;
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
        h3 {
            display: flex;
            justify-content: center;
            align-items: center;
        }

    </style>
</head>
<body>
    <header>
        <img id="logo" src="images/project-manager.png" alt="Project Manager">
        <h1>Welcome to the Task and Project Management System</h1>
        <div class="nav-links">
            <a href="login.php">Login</a>
            <a href="signup.php">Signup</a>
        </div>
    </header>
    <main>
        <h2>Task and Project Manager</h2>
        <p>Login or signup to start tracking your progress today!</p>
        <p>This is your all-in-one solution for managing tasks and projects.</p>
        <br>
        <section>
            <h3>Features</h3>
            <div>
                <p>Our platform offers a variety of features to enhance your project management experience:</p>
                <ul>
                    <li>Customizable dashboard</li>
                    <li>Task management</li>
                    <li>Project management</li>
                    <li>Date Integration</li>
                </ul>
            </div>
        </section>
        <section>
            <h3>Testimonials</h3>
            <div>
                <p>See what our users have to say:</p>
                <blockquote>"This tool has transformed how our team collaborates and manages projects. Highly recommended!" - Alex P.</blockquote>
                <blockquote>"Intuitive interface and powerful features. A must-have for any project manager." - Jamie L.</blockquote>
            </div>
        </section>
        <section>
            <h3>Contact Us</h3>
            <p>If you have any questions or need support, please reach out to our team:</p>
            <ul>
                <li>Email: support@taskmanager.com</li>
                <li>Phone: +1 234 567 890</li>
                <li>Live Chat: Available 24/7</li>
            </ul>
        </section>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Task and Project Manager</p>
    </footer>
</body>
</html>


