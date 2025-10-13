<?php
// config.php - Database Configuration

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'eantrean_db');

// Create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Set charset to utf8mb4
mysqli_set_charset($conn, "utf8mb4");

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Function to check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['user_id']) && isset($_SESSION['org_id']);
}

// Function to redirect if not logged in
function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: login.php');
        exit();
    }
}

// Function to get user data
function getUserData($conn) {
    if (!isLoggedIn()) {
        return null;
    }
    
    $user_id = $_SESSION['user_id'];
    $query = "SELECT u.*, om.role as org_role, o.name as org_name, o.logo, o.theme 
              FROM users u 
              JOIN organization_members om ON u.id = om.user_id 
              JOIN organizations o ON om.org_id = o.id 
              WHERE u.id = ? AND om.org_id = ?";
    
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ii", $user_id, $_SESSION['org_id']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    return mysqli_fetch_assoc($result);
}

// Function to log actions
function logAction($conn, $action, $details = '') {
    if (!isLoggedIn()) {
        return;
    }
    
    $user_id = $_SESSION['user_id'];
    $org_id = $_SESSION['org_id'];
    
    $query = "INSERT INTO logs (user_id, org_id, action, details) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "iiss", $user_id, $org_id, $action, $details);
    mysqli_stmt_execute($stmt);
}
?>