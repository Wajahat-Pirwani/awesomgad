<?php
session_start();
require_once('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $status = "false";
    $plan = "0";

    // Add any necessary validation and sanitization here

    // Insert the user information into the database
    $sql = "INSERT INTO users_table (username, password, status, plan) VALUES ('$username', '$password', '$status', '$plan' )";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: login.php?signup=success");
        exit();
    } else {
        header("Location: signup.php?error=database_error");
        exit();
    }
}
