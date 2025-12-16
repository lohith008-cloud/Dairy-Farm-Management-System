<?php
// Database Configuration for Dairy Farm Management System
// InfinityFree hosting credentials

// Database connection parameters
$db_host = 'localhost';  // Usually localhost for InfinityFree
$db_user = 'root';       // Replace with your InfinityFree database user
$db_password = '';       // Replace with your InfinityFree database password
$db_name = 'dairy_farm_db';  // Your database name

// Create connection
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set charset to utf8
$conn->set_charset("utf8");

// Return connection for use in other files
?>
