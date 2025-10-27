<?php
session_start();
require_once 'inc/db.php'; 


if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
$msg = '';

if (isset($_POST['book'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $service = $_POST['service'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $message = $_POST['message'];

    try {
        $pdo->beginTransaction();
        $sql = "INSERT INTO appointments (name, email, phone, service, appointment_date, appointment_time, message)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $email, $phone, $service, $date, $time, $message]);

        
        $pdo->commit();
        $msg = "Appointment booked successfully!";
    } catch (Exception $e) {
        $pdo->rollBack();
        $msg = "Error booking appointment: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Book Appointment | DentalCare</title>
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
          <li class="nav-item"><a class="nav-link" href="dashboard.php">Appointments</a></li>
          <li class="nav-item"><a class="nav-link active" href="book.php">Book</a></li>
          <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
          <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
        </ul>
      </div>
    </div>
  </nav>

  
  <section class="py-5" style="background-color: #f0f2f5;">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-7">
          <div class="card shadow-sm p-4">
            <h3 class="text-center mb-4">Book Your Appointment</h3>
            <?php if (!empty($msg)): ?>
              <div class="alert alert-info text-center"><?php echo $msg; ?></div>
            <?php endif; ?>
            <form method="POST" action="book.php">
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="name" class="form-label">Full Name</label>
                  <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email" required>
                </div>
              </div>
              <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
              </div>
              <div class="mb-3">
                <label for="service" class="form-label">Select Service</label>
                <select class="form-select" id="service" name="service" required>
                  <option value="" disabled selected>Choose one...</option>
                  <option value="Cleaning">Cleaning</option>
                  <option value="Whitening">Whitening</option>
                  <option value="Extraction">Extraction</option>
                  <option value="Consultation">Consultation</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="date" class="form-label">Preferred Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
              </div>
              <div class="mb-3">
                <label for="time" class="form-label">Preferred Time</label>
                <input type="time" class="form-control" id="time" name="time" required>
              </div>
              <div class="mb-3">
                <label for="message" class="form-label">Additional Notes</label>
                <textarea class="form-control" id="message" name="message" rows="3"></textarea>
              </div>
              <button type="submit" name="book" class="btn btn-primary w-100">Confirm Appointment</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  
  <footer class="bg-dark text-white text-center py-3 mt-auto">
    <p class="mb-0">&copy; 2025 DentalCare. All rights reserved.</p>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
