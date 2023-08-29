<?php
session_start();
require_once('db_connect.php');

$username = $_SESSION['username'];
$status = $_SESSION['statusUpdate'];
$plan = $_SESSION['planUpdate'];

// $sql = "SELECT * FROM users_table WHERE username = '$username'";
$sql = "UPDATE users_table SET status = '$status', plan = '$plan' WHERE username = '$username'";

$result = mysqli_query($conn, $sql);

if ($result) {
    $_SESSION["status"] = "false";
    $_SESSION["plan"] = "0";
    $_SESSION["username"] = $username;
    header("Location: club.php?success=true");
    exit();
} else {
    $_SESSION['error'] = $result;
    header("Location: club.php?error=database_error");
    exit();
}
