<?php
include("connect.php");

$showSuccess = false;
$errorMsg = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $cpassword= $_POST['cpassword'];

    if ($password !== $cpassword) {
        $errorMsg = "❌ Passwords do not match.";
    } else {
        // Check if email exists
        $check = mysqli_query($conn, "SELECT id FROM users WHERE email='$email'");
        if (mysqli_num_rows($check) > 0) {
            $errorMsg = "❌ Email already registered.";
        } else {
            $hashed = md5($password);
            $sql = "INSERT INTO users (fullname, email, password) VALUES ('$fullname', '$email', '$hashed')";
            if (mysqli_query($conn, $sql)) {
                $showSuccess = true;
            } else {
                $errorMsg = "❌ Could not create account.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign Up</title>
  <link rel="stylesheet" href="style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Intel+One+Mono:wght@300..700&display=swap" rel="stylesheet" />
  <link rel="shortcut icon" href="logo1.png" type="image/x-icon">
</head>
<body>

<?php
if ($showSuccess) {
    echo '<div class="alert alert-success text-center">You\'re all set! Your account has been created.</div>';
} elseif (!empty($errorMsg)) {
    echo '<div class="alert alert-danger text-center">' . htmlspecialchars($errorMsg) . '</div>';
}
?>

<div class="bgs-img">
  <div class="login-page-containers">
    <div class="login-section">
      <div class="logo-area">
        <img src="images/logo1.png" alt="SR Logo" class="logo">
        <span>Smart Resume <a href="home.php"><strong>Explore</strong></a></span>
      </div>

      <div class="form-content">
        <p class="account-label">Sign Up</p>
        <h1>Create your account</h1>
        <form class="login-form" method="POST" action="index.php">
          <div class="input-group">
            <label for="fullname">Full Name</label>
            <input type="text" id="fullname" name="fullname" placeholder="your name" required>
          </div>
          <div class="input-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" placeholder="validemail@mail.com" required>
          </div>
          <div class="input-group">
            <label for="password">Create Password</label>
            <input type="password" id="password" name="password" placeholder="••••••••" required>
          </div>
          <div class="input-group">
            <label for="cpassword">Confirm Password</label>
            <input type="password" id="cpassword" name="cpassword" placeholder="Re-enter password" required>
          </div>
          <button type="submit" class="submit-button">Sign Up</button>
        </form>
        <h5 class="mt-3">Already have an account? <a href="login.php">Log in here</a></h5>
      </div>
    </div>
  </div>
</div>
</body>
</html>