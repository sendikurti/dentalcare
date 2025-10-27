<?php
session_start();
require_once 'inc/db.php';


if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['appointment_id'])) {
    $appointment_id = $_POST['appointment_id'];

    
    if (!ctype_digit((string)$appointment_id)) {
        header("Location: dashboard.php?error=Invalid appointment ID.");
        exit;
    }

    try {
        
        $pdo->beginTransaction();

        
        $stmt = $pdo->prepare("DELETE FROM appointments WHERE id = ?");
        $stmt->execute([$appointment_id]);

        if ($stmt->rowCount() > 0) {
            
            $pdo->commit();
            header("Location: dashboard.php?success=Appointment deleted successfully!");
            exit;
        } else {
            
            $pdo->rollBack();
            header("Location: dashboard.php?error=Appointment ID not found.");
            exit;
        }
    } catch (PDOException $e) {
        
        $pdo->rollBack();
        header("Location: dashboard.php?error=Database error on deletion.");
        exit;
    }
}


header("Location: dashboard.php");
exit;
?>
