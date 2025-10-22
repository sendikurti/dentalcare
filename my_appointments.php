<?php
session_start();
require_once 'inc/db.php';

// Kontrollo nëse përdoruesi është i kyçur
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Merr terminet nga databaza
$stmt = $pdo->prepare("SELECT appointment_date, appointment_time, created_at FROM appointments WHERE user_id = ? ORDER BY appointment_date ASC, appointment_time ASC");
$stmt->execute([$user_id]);
$appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Appointments</title>
</head>
<body>
    <h2>My Dental Appointments</h2>

    <?php if (count($appointments) > 0): ?>
        <table border="1" cellpadding="8">
            <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Booked On</th>
            </tr>
            <?php foreach ($appointments as $app): ?>
                <tr>
                    <td><?= htmlspecialchars($app['appointment_date']) ?></td>
                    <td><?= htmlspecialchars($app['appointment_time']) ?></td>
                    <td><?= htmlspecialchars($app['created_at']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>You have not booked any appointments yet.</p>
    <?php endif; ?>

    <p><a href="profile.php">Back to Profile</a></p>
</body>
</html>