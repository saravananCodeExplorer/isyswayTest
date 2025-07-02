<?php
session_start();
include_once 'db.php';

$error = "";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']); 

    $query = mysqli_query($con, "SELECT * FROM admin_users WHERE email='$email' AND password='$password'");

    if (mysqli_num_rows($query) > 0) {
        $_SESSION['admin_email'] = $email;
        header("Location: admin_dashboard.php");
        exit;
    } else {
        $error = "Invalid email or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />
  <style>
    body {
      background: #f3f4f6;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      height: 100vh;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .login-container {
      background: #ffffff;
      padding: 40px;
      border-radius: 8px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.15);
      width: 100%;
      max-width: 420px;
    }
    .login-container h3 {
      text-align: center;
      margin-bottom: 30px;
      color: #333;
      font-weight: 600;
    }
    .form-icon {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: #6c757d;
      font-size: 1.1rem;
    }
    .form-group {
      position: relative;
    }
    .form-control {
      padding-left: 2.5rem;
      height: 45px;
      border-radius: 6px;
    }
    .btn-primary {
      background-color: #0d6efd;
      border: none;
      height: 45px;
      border-radius: 6px;
      font-weight: 500;
      letter-spacing: 0.5px;
    }
    .btn-primary:hover {
      background-color: #0b5ed7;
    }
    .alert {
      font-size: 0.95rem;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h3><i class="bi bi-lock-fill"></i> Admin Login</h3>

    <?php if ($error): ?>
      <div class="alert alert-danger">
        <?php echo $error; ?>
      </div>
    <?php endif; ?>

    <form action="admin_login.php" method="POST">
      <div class="form-group mb-3">
        <i class="bi bi-envelope form-icon"></i>
        <input type="email" name="email" class="form-control" placeholder="Email Address" required />
      </div>
      <div class="form-group mb-3">
        <i class="bi bi-lock form-icon"></i>
        <input type="password" name="password" class="form-control" placeholder="Password" required />
      </div>
      <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
    </form>
  </div>
</body>
</html>
