<?php include 'config.php'; session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Student Login</h2>
    <form method="post" action="">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
    </form>
    
    <?php
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $result = $conn->query("SELECT * FROM users WHERE email='$email' AND is_verified=1");

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION['user_id'] = $row['id'];
                header("Location: dashboard.php");
                exit;
            } else {
                echo "Incorrect password.";
            }
        } else {
            echo "Account not found or not verified.";
        }
    }
    ?>
</body>
</html>