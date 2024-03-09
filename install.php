<?php
// Include database configuration
include_once("includes/db_config.php");

// Create users table
$query = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($query) === TRUE) {
    echo "Database and table created successfully!";
} else {
    echo "Error creating table: " . $conn->error;
}

// Close database connection
$conn->close();
?>
