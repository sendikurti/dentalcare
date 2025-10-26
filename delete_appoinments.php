<?php
session_start();
require_once 'inc/db.php';

// Kontrollo nese perdoruesi eshte i kycur
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['appointment_id'])) {
    $appointment_id = $_POST['appointment_id'];

    // Verifiko ID
    if (!ctype_digit((string)$appointment_id)) {
        header("Location: dashboard.php?error=Invalid appointment ID.");
        exit;
    }

    try {
        // Fillo transaksionin
        $pdo->beginTransaction();

        // Fshi takimin
        $stmt = $pdo->prepare("DELETE FROM appointments WHERE id = ?");
        $stmt->execute([$appointment_id]);

        if ($stmt->rowCount() > 0) {
            // (Opsionale) rifresko disponueshmerine e dentistit nese ke tabele dentist_schedule
            // $update = $pdo->prepare("UPDATE dentist_schedule SET available = 1 WHERE date=? AND time=?");
            // $update->execute([$date, $time]);

            // Konfirmo ndryshimet
            $pdo->commit();
            header("Location: dashboard.php?success=Appointment deleted successfully!");
            exit;
        } else {
            // Asnje rresht nuk u fshi → kthehu mbrapa
            $pdo->rollBack();
            header("Location: dashboard.php?error=Appointment ID not found.");
            exit;
        }
    } catch (PDOException $e) {
        // Nese ndodh nje gabim → rollback
        $pdo->rollBack();
        header("Location: dashboard.php?error=Database error on deletion.");
        exit;
    }
}

// Nese s'ka POST ose ID → kthehu ne dashboard
header("Location: dashboard.php");
exit;
?>
