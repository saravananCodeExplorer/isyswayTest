<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $code = $_POST['code'];
    $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("SELECT * FROM students WHERE email = ? AND verification_code = ?");
    $stmt->bind_param("ss", $email, $code);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows > 0) {
        $update = $conn->prepare("UPDATE students SET password = ?, verification_code = NULL WHERE email = ?");
        $update->bind_param("ss", $new_password, $email);
        $update->execute();
        echo "Password changed successfully. <a href='index.php'>Login</a>";
    } else {
        echo "Invalid code or email.";
    }
}
?>

<h2>Reset Password</h2>
<form method="post">
    Email: <input type="email" name="email" required><br>
    Verification Code: <input type="text" name="code" required><br>
    New Password: <input type="password" name="new_password" required><br>
    <button type="submit">Change Password</button>
</form>
