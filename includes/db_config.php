<?php

// Database Configuration
$db_host = "your_host";
$db_user = "your_username";
$db_password = "your_password";
$db_name = "your_database_name";

$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
