<?php
include 'db.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Login successful
        $row = $result->fetch_assoc();
        $user_id = $row['user_id'];
        $username = $row['username'];
        session_start();
        $_SESSION['user_id'] = $user_id;
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        // Login failed
        ?>
        <script>
            alert("Invalid username or password");
            window.location.href = "login.php";
        </script>
        <?php
    }
}

$conn->close();
?> 