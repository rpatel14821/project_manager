<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: home.php");
    exit();
}
unset($_SESSION['user_id']);
session_destroy();
header("Location: home.php");
exit();
?>
