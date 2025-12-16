<?php
/**
 * Dairy Farm Management System
 * Main Dashboard - Entry Point
 */

session_start();

// Database connection
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'dairy_farm_db';

$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

// Check user login
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check user login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dairy Farm - Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <!-- Navigation -->
        <nav class="navbar">
            <div class="navbar-brand">🐄 Dairy Farm Management</div>
            <ul class="nav-menu">
                <li><a href="index.php">Dashboard</a></li>
                <li><a href="inventory.php">Inventory</a></li>
                <li><a href="orders.php">Orders</a></li>
                <li><a href="reports.php">Reports</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>

        <!-- Dashboard Content -->
        <div class="dashboard">
            <h1>Welcome to Dairy Farm Management System</h1>
            
            <!-- Stats Cards -->
            <div class="stats-grid">
                <div class="stat-card">
                    <h3>Total Inventory</h3>
                    <?php
                    $result = $conn->query("SELECT COUNT(*) as count FROM inventory");
                    $row = $result->fetch_assoc();
                    echo "<p class='stat-value'>" . $row['count'] . " Items</p>";
                    ?>
                </div>
                
                <div class="stat-card">
                    <h3>Pending Orders</h3>
                    <?php
                    $result = $conn->query("SELECT COUNT(*) as count FROM orders WHERE status='pending'");
                    $row = $result->fetch_assoc();
                    echo "<p class='stat-value'>" . $row['count'] . " Orders</p>";
                    ?>
                </div>
                
                <div class="stat-card">
                    <h3>Total Revenue</h3>
                    <?php
                    $result = $conn->query("SELECT SUM(total_amount) as revenue FROM orders WHERE status='completed'");
                    $row = $result->fetch_assoc();
                    echo "<p class='stat-value'>₹" . ($row['revenue'] ?? '0') . "</p>";
                    ?>
                </div>
                
                <div class="stat-card">
                    <h3>Low Stock Items</h3>
                    <?php
                    $result = $conn->query("SELECT COUNT(*) as count FROM inventory WHERE quantity < 10");
                    $row = $result->fetch_assoc();
                    echo "<p class='stat-value'>" . $row['count'] . " Items</p>";
                    ?>
                </div>
            </div>
            
            <!-- Quick Actions -->
            <div class="quick-actions">
                <h2>Quick Actions</h2>
                <button class="btn btn-primary" onclick="window.location.href='inventory.php'">Add Product</button>
                <button class="btn btn-primary" onclick="window.location.href='orders.php'">Create Order</button>
                <button class="btn btn-primary" onclick="window.location.href='reports.php'">View Reports</button>
            </div>
        </div>
    </div>
    
    <script src="js/script.js"></script>
</body>
</html>
