<!-- php/create_org.php -->
<?php
session_start();
include '../includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $user_id = $_SESSION['user_id'];

    // Generate invite code
    $invite_code = substr(md5(uniqid()), 0, 8);

    $stmt = $conn->prepare("INSERT INTO organizations (name, type, invite_code) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $type, $invite_code);
    $stmt->execute();
    $org_id = $stmt->insert_id;
    $stmt->close();

    // Add creator as admin
    $stmt = $conn->prepare("INSERT INTO organization_members (org_id, user_id, role) VALUES (?, ?, 'admin')");
    $stmt->bind_param("ii", $org_id, $user_id);
    $stmt->execute();
    $stmt->close();

    header("Location: ../dashboard.php");
    exit();
}
?>