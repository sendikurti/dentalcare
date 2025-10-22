<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>DentalCare Clinic</title>
  <link rel="stylesheet" href="assets/css/style.css?v=2" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
  <div class="container">
     <img src="assets/images/logo.png" alt="DentalCare Logo" style="height: 50px;" />
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
        <li class="nav-item"><a class="nav-link" href="dashboard.php">Appointments</a></li>
        <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
        <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
        <li class="nav-item"><a class="nav-link" href="book.php">Book Appointment</a></li>
      </ul>
    </div>
  </div>
</nav>

<header class="text-white text-center py-5 mb-4">
  <div class="container">
    <h1 class="fade-in">Welcome to DentalCare Clinic</h1>
    <p class="fade-in">Your smile is our priority</p>
    <a href="book.php" class="btn btn-lg btn-light mt-3 fade-in">Book Now</a>
  </div>
</header>

<!-- SERVICES SECTION -->
<section class="py-5 fade-in-on-scroll">
  <div class="container">
    <h2 class="text-center mb-4">Our Services</h2>
    <div class="row g-4">
      <div class="col-md-3 text-center">
        <i class="bi bi-shield-plus fs-1 text-primary mb-2"></i>
        <h5>Checkups</h5>
        <p class="text-muted">Routine dental checkups to maintain oral health.</p>
      </div>
      <div class="col-md-3 text-center">
        <i class="bi bi-brightness-high fs-1 text-primary mb-2"></i>
        <h5>Whitening</h5>
        <p class="text-muted">Professional teeth whitening for a brighter smile.</p>
      </div>
      <div class="col-md-3 text-center">
        <i class="bi bi-scissors fs-1 text-primary mb-2"></i>
        <h5>Extractions</h5>
        <p class="text-muted">Painless extractions by experienced dentists.</p>
      </div>
      <div class="col-md-3 text-center">
        <i class="bi bi-chat-dots fs-1 text-primary mb-2"></i>
        <h5>Consultations</h5>
        <p class="text-muted">Get expert advice tailored to your dental needs.</p>
      </div>
    </div>
  </div>
</section>

<!-- DOCTORS SECTION -->
<section class="py-5 bg-light">
  <div class="container">
    <h2 class="text-center mb-4">Meet Our Doctors</h2>
    <div class="row justify-content-center">
      <div class="col-md-4 text-center">
        <img src="assets/images/docpic2.jpg" class="rounded-circle mb-3" alt="Doctor" width="150" height="150">
        <h5>Dr. Mario Rossi</h5>
        <p class="text-muted">Specialist in Orthodontics</p>
      </div>
      <div class="col-md-4 text-center">
        <img src="assets/images/docpic1.jpg" class="rounded-circle mb-3" alt="Doctor" width="150" height="150">
        <h5>Dr. Maria Rossi</h5>
        <p class="text-muted">Cosmetic Dentist</p>
      </div>
      <div class="col-md-4 text-center">
        <img src="assets/images/docpic3.jpeg" class="rounded-circle mb-3" alt="Doctor" width="150" height="150">
        <h5>Dr. laura bianchi</h5>
        <p class="text-muted">Cosmetic Dentist</p>
      </div>
    </div>
  </div>
</section>
<!-- WHY CHOOSE US SECTION -->
<section class="container mb-5 fade-in">
  <div class="row text-center">
    <div class="col-md-4 mb-4">
      <div class="card shadow-sm">
        <div class="card-body">
          <h5 class="card-title">Professional Dentists</h5>
          <p class="card-text">Our experienced dentists provide top-quality care for your oral health.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="card shadow-sm">
        <div class="card-body">
          <h5 class="card-title">Modern Equipment</h5>
          <p class="card-text">We use the latest technology to ensure painless and effective treatments.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="card shadow-sm">
        <div class="card-body">
          <h5 class="card-title">Friendly Staff</h5>
          <p class="card-text">Our staff is always ready to assist you with a warm smile.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<footer class="bg-light text-center py-4">
  <div class="container">
    <small>&copy; <?= date("Y") ?> DentalCare Clinic. All rights reserved.</small>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>