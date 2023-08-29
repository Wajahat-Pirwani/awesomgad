<?php
session_start();
require_once('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Add any necessary validation and sanitization here

    // Check the database for the user credentials
    $sql = "SELECT * FROM users_table WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $user_data = mysqli_fetch_assoc($result); // Fetch user data from the query result

        // Assign relevant user data to session variables
        $_SESSION['id'] = $user_data['id'];
        $_SESSION['username'] = $user_data['username'];
        $_SESSION['status'] = $user_data['status'];
        $_SESSION['plan'] = $user_data['plan'];

        header("Location: club.php");
        exit();
    } else {
        header("Location: login.php?error=invalid_credentials");
        exit();
    }
}
