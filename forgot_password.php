<?php
require 'db.php';

// Include Composer autoload
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $code = rand(100000, 999999);

    // Update verification code in DB
    $stmt = $conn->prepare("UPDATE students SET verification_code = ? WHERE email = ?");
    $stmt->bind_param("ss", $code, $email);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {

        $mail = new PHPMailer(true);

        try {
            // SMTP configuration
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';            // e.g. Gmail SMTP server
            $mail->SMTPAuth   = true;
            $mail->Username   = 'youremail@gmail.com';       // your Gmail address
            $mail->Password   = 'your_app_password';         // your app password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            $mail->setFrom('youremail@gmail.com', 'Student Test System');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Code';
            $mail->Body    = "
                <html>
                <head><title>Password Reset Code</title></head>
                <body>
                  <p>Your verification code is:</p>
                  <h2>$code</h2>
                  <p>Please use this code to reset your password.</p>
                </body>
                </html>
            ";

            $mail->send();

            $message = "<div class='alert alert-success'>
                Verification code sent to your email.<br>
                <a href='reset_password.php'>Go to Reset Password</a>
            </div>";

        } catch (Exception $e) {
            $message = "<div class='alert alert-danger'>
                Failed to send email. Mailer Error: {$mail->ErrorInfo}
            </div>";
        }

    } else {
        $message = "<div class='alert alert-danger'>Email not found.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password | Student Test System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', sans-serif;
        }
        .forgot-box {
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
            width: 100%;
            max-width: 400px;
        }
        .btn-primary {
            background-color: #2575fc;
            border: none;
        }
        .btn-primary:hover {
            background-color: #6a11cb;
        }
        a {
            color: #2575fc;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="forgot-box" data-aos="fade-down">
    <h2 class="text-center mb-4">Forgot Password</h2>
    <?php echo $message; ?>
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Enter your email</label>
            <input type="email" name="email" class="form-control" required placeholder="Enter your email">
        </div>
        <button type="submit" class="btn btn-primary w-100">Send Code</button>
    </form>
    <div class="mt-3 text-center">
        <a href="index.php">Back to Login</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 1000,
        once: true
    });
</script>
</body>
</html>
