<?php
session_start();
require_once 'inc/db.php'; 


if (!isset($_SESSION['user_id'])) {
    
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Profile</title>
</head>
<body>
    <h2>Welcome, <?= htmlspecialchars($user_name) ?>!</h2>

    <p>This is your personal profile page.</p>

    <ul>
        <li><a href="book.php">Book an appointment</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</body>
</html>
