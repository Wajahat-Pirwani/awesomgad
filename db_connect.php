<?php
$host = "localhost"; // Usually "localhost"
$username = "shopdnku_awesomegadgetdiscount";
$password = "shopdnku_awesomegadgetdiscount";
$database = "shopdnku_awesomegadgetdiscount"; // The name of the database

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
