<?php
session_start();
require_once('db_connect.php');

$username = $_SESSION['username'];

if ($_SESSION["basicFlag"] == "true" && $_SESSION["premiumFlag"] == "true") {
    $sql = "UPDATE users_table SET status = 'true', plan = '3' WHERE username = '$username'";
} else if ($_SESSION["premiumFlag"] == "true") {
    $sql = "UPDATE users_table SET status = 'true', plan = '2' WHERE username = '$username'";
} else {
    $sql = "UPDATE users_table SET status = 'true', plan = '1' WHERE username = '$username'";
}

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "Database updated successfully!";
    exit();
} else {
    echo "Database updated error!";
    exit();
}
