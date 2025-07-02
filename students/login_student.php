<?php
session_start();
include 'db.php';

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if (empty($email) || empty($password)) {
    die("All fields are required. <a href='student_login.php'>Go back</a>");
}

$stmt = $con->prepare("SELECT id, name, password FROM students WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Invalid email or password. <a href='student_login.php'>Try again</a>");
}

$row = $result->fetch_assoc();

if (password_verify($password, $row['password'])) {
    // Login successful
    $_SESSION['student_id'] = $row['id'];
    $_SESSION['student_name'] = $row['name'];
    $_SESSION['student_email'] = $email;
    header("Location: select_test.php");
    exit;
} else {
    die("Invalid email or password. <a href='student_login.php'>Try again</a>");
}
