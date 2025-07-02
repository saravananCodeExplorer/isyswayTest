<?php
session_start();
include 'db.php';

// Retrieve form inputs
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$college = trim($_POST['college'] ?? '');
$department = trim($_POST['department'] ?? '');
$year = trim($_POST['year'] ?? '');
$password = $_POST['password'] ?? '';
$confirm = $_POST['confirm_password'] ?? '';

if ($password !== $confirm) {
    die("Passwords do not match. <a href='student_signup.php'>Go back</a>");
}

// Hash password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Check if email already exists
$stmt = $con->prepare("SELECT id FROM students WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    die("Email already registered. <a href='student_signup.php'>Go back</a>");
}
$stmt->close();

// Insert new student
$sql = "INSERT INTO students (name, email, college_name, department, year, password)
        VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $con->prepare($sql);
$stmt->bind_param("ssssss", $name, $email, $college, $department, $year, $hashed_password);
$stmt->execute();

header("Location: student_login.php");
exit;
