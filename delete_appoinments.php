<?php
session_start();
require_once 'inc/db.php';

// Ensure logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// TEMP: allow any logged-in user to delete (admin check removed for now)

// Handle POST deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['appointment_id'])) {
    $appointment_id = $_POST['appointment_id'];

    // Validate numeric id
    if (!ctype_digit((string)$appointment_id)) {
        header("Location: dashboard.php?error=Invalid appointment ID.");
        exit;
    }

    $stmt = $pdo->prepare("DELETE FROM appointments WHERE id = ?");
    try {
        $stmt->execute([$appointment_id]);
        if ($stmt->rowCount() > 0) {
            header("Location: dashboard.php?success=Appointment deleted successfully!");
            exit;
        } else {
            header("Location: dashboard.php?error=Appointment ID not found.");
            exit;
        }
    } catch (PDOException $e) {
        header("Location: dashboard.php?error=Database error on deletion.");
        exit;
    }
}

// Fallback
header("Location: dashboard.php");
exit;
?>