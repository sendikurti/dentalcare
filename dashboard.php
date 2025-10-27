<?php

session_start();              
require_once 'inc/db.php';     
require_once 'inc/auth.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
$user_id = $_SESSION['user_id'];

$stmt = $pdo->prepare("SELECT id, name, email, phone, service, appointment_date, appointment_time, message FROM appointments ORDER BY appointment_date DESC");
$stmt->execute();
$appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);


$stmt_user = $pdo->prepare("SELECT name FROM users WHERE id = ?");
$stmt_user->execute([$user_id]);
$user = $stmt_user->fetch(PDO::FETCH_ASSOC);
$user_name = $user['name'] ?? 'Admin';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard | DentalCare</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">

 
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <img src="assets/images/logo.png" alt="Logo" style="height: 40px;">
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link active" href="dashboard.php">Dashboard</a></li>
          <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
          <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>

 
  <section class="py-5 flex-grow-1">
    <div class="container">
      <h2 class="mb-4 text-center">Admin Dashboard - All Appointments</h2>
      
      
      <?php if (isset($_GET['success'])): ?>
          <div class="alert alert-success text-center"><?= htmlspecialchars($_GET['success']) ?></div>
      <?php endif; ?>
      <?php if (isset($_GET['error'])): ?>
          <div class="alert alert-danger text-center"><?= htmlspecialchars($_GET['error']) ?></div>
      <?php endif; ?>

      <?php if (count($appointments) > 0): ?>
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Service</th>
                <th>Date</th>
                <th>Time</th>
                <th>Note</th>
                <th>Action</th> <!-- New Column for Delete Button -->
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; foreach ($appointments as $row): ?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= htmlspecialchars($row['name']) ?></td>
                  <td><?= htmlspecialchars($row['email']) ?></td>
                  <td><?= htmlspecialchars($row['phone']) ?></td>
                  <td><?= htmlspecialchars($row['service']) ?></td>
                  <td><?= htmlspecialchars($row['appointment_date']) ?></td>
                  <td><?= htmlspecialchars($row['appointment_time']) ?></td>
                  <td><?= htmlspecialchars($row['message']) ?></td>
                  
                  <td>
                    <form action="delete_appoinments.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this appointment?');">
                        
                        <input type="hidden" name="appointment_id" value="<?= $row['id'] ?>">
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Appointment">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </form>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php else: ?>
        <div class="alert alert-info text-center">
          No appointments found.
        </div>
      <?php endif; ?>
    </div>
  </section>

  
  <footer class="bg-dark text-white text-center py-3 mt-auto">
    <p class="mb-0">&copy; 2025 DentalCare. All rights reserved.</p>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
