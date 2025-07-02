<?php
session_start();
include_once 'db.php';

// Which table to pick from:
$table = $_GET['table'] ?? '';

if (!$table) {
    die("No table specified.");
}

// Randomly get 25 unique questions:
$sql = "SELECT * FROM $table ORDER BY RAND() LIMIT 25";
$res = mysqli_query($con, $sql);

$questions = [];
while ($row = mysqli_fetch_assoc($res)) {
    $questions[] = $row;
}

// Save questions to session
$_SESSION['test_questions'] = $questions;
$_SESSION['test_table'] = $table;

header("Location: take_test.php");
exit;
