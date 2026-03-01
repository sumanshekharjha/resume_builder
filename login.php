<?php
session_start();
include("connect.php");

$loginError = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $hashed   = md5($password);

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        if ($user['password'] === $hashed) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['fullname'] = $user['fullname'];
            $_SESSION['email'] = $user['email'];
            header("Location: home.php");
            exit();
        } else {
            $loginError = "Invalid password.";
        }
    } else {
        $loginError = "No account found with this email.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign In | Smart Resume</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Intel+One+Mono:ital,wght@0,300..700;1,300..700&display=swap" rel="stylesheet" />
   <link rel="short-cut icon" href="logo1.png" type="image/x-icon">
</head>
<body>
  <div class="bg-img">
    <div class="login-page-container">
      <div class="login-section">
        <div class="logo-area">
          <img src="images/logo1.png" alt="SR Logo" class="logo" />
          <span>Smart Resume <a href="home.php"><strong>Explore</strong></a></span>
        </div>
        <div class="form-content">
          <p class="account-label">Sign In</p>
          <h1>Access your account</h1>
          <?php if (!empty($loginError)): ?>
            <div class="alert alert-danger text-center"><?php echo $loginError; ?></div>
          <?php endif; ?>
          <form class="login-form" method="POST" action="">
            <div class="input-group">
              <label for="email">Email Address</label>
              <input type="email" id="email" name="email" required placeholder="youremail@mail.com" />
            </div>
            <div class="input-group">
              <label for="password">Password</label>
              <input type="password" id="password" name="password" required placeholder="••••••••" />
            </div>
            <button type="submit" name="login" class="submit-button">Log In</button>
          </form>

          <h5 class="mt-3">Don't have an account? <a href="index.php">Create one here</a></h5>
        </div>
      </div>

      <div class="imageside">
        <img src="images/login22.png" class="side_img" alt="Login Illustration" />
      </div>
    </div>
  </div>
</body>
</html>