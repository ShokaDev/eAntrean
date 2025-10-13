<!-- php/join_org.php -->
<?php
session_start();
include '../includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $invite_code = $_POST['invite_code'];
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("SELECT id FROM organizations WHERE invite_code = ?");
    $stmt->bind_param("s", $invite_code);
    $stmt->execute();
    $stmt->bind_result($org_id);
    if ($stmt->fetch()) {
        $stmt->close();

        $stmt = $conn->prepare("INSERT INTO organization_members (org_id, user_id, role) VALUES (?, ?, 'member')");
        $stmt->bind_param("ii", $org_id, $user_id);
        $stmt->execute();
        $stmt->close();

        header("Location: ../dashboard.php");
        exit();
    } else {
        // Invalid code
        header("Location: ../dashboard.php?error=invalid_code");
        exit();
    }
}
?>