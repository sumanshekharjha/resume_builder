<?php 
session_start(); 
include("connect.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Smart Resume</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Intel+One+Mono:ital,wght@0,300..700;1,300..700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">

<style>
<style>
.navbar {
  padding: 0.7rem 1rem;
}

.navbar-brand {
  font-weight: bold;
  font-size: 1.3rem;
}

.navbar-nav .nav-link {
  font-weight: 500;
  font-size: 1rem;
  margin-left: 10px;
}

.navbar-nav .nav-link:hover {
  color: #ffc107 !important;
}

.web-name {
  font-weight: bold;
  font-size: 1.3rem;
  color: #fff;
}

.header-section {
  background-color: #000;
  padding: 0.3rem 1rem; 
}

.header-section .container-fluid {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  align-items: center;
}

.tagline-text {
  color: rgb(240, 236, 145);
  font-weight: 400;
  font-family: cursive;
  font-size: 16px;
  margin: 0;
  white-space: nowrap; 
}

.header-section .btn {
  font-size: 0.9rem;
}

.header-section .navbar-toggler {
  border-color: rgba(255, 255, 255, 0.5);
}

@media (min-width: 768px) {
  #authMenu {
    display: flex !important;
    align-items: center;
    margin-top: 0 !important;
  }
}


@media (max-width: 768px) {
  .tagline-text {
    font-size: 14px;
    flex-grow: 1;
    margin-bottom: 0.5rem;
  }

  #authMenu .btn {
    display: inline-block;
    margin: 0 5px;
  }
}
</style>

</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center" href="home.php">
      <img src="images/logo1.png" alt="Smart Resume Logo" width="40" class="me-2">
      <span class="web-name">Smart Resume</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainNavbar">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
        <li class="nav-item"><a class="nav-link" href="faqs.php">FAQs</a></li>
      </ul>
    </div>
  </div>
</nav>

<header class="header-section text-light px-3 py-1">
  <div class="container-fluid d-flex justify-content-between align-items-center flex-wrap">


    <div class="tagline-text">
      Build a resume that speaks before you do
    </div>

    
    <div class="d-flex align-items-center">
      <?php if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])): ?>
        <a href="logout.php" class="btn btn-outline-light ms-2">Logout</a>
      <?php else: ?>
        <a href="index.php" class="btn btn-warning ms-2">Sign Up</a>
        <a href="login.php" class="btn btn-warning ms-2">Sign In</a>
      <?php endif; ?>
    </div>

  </div>
</header>

</body>
</html>
