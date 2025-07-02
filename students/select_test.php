<?php
session_start();
include 'db.php';

// Redirect if not logged in
if (!isset($_SESSION['student_id'])) {
    header("Location: student_login.php");
    exit;
}

// Handle test selection
if (isset($_GET['table'])) {
    $table = $_GET['table'];

    // Fetch all questions from the selected table
    $result = mysqli_query($con, "SELECT * FROM `$table`");
    $questions = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $questions[] = $row;
    }

    // Save questions & table name into session
    $_SESSION['test_questions'] = $questions;
    $_SESSION['test_table'] = $table;

    // Redirect to test page
    header("Location:../test.php");
    exit;
}

// Fetch all tables (assuming tests are separate tables)
$tables = [];
$res = mysqli_query($con, "SHOW TABLES");
while ($row = mysqli_fetch_row($res)) {
    $tableName = $row[0];
    // Optionally skip system tables
    if (!in_array($tableName, ['students', 'student_scores'])) {
        $tables[] = $tableName;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Select Test</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
  <h3 class="text-primary mb-4">
    Welcome, <?php echo htmlspecialchars($_SESSION['student_name']); ?>!
  </h3>

  <h4>Select a Test:</h4>

  <?php if (empty($tables)) : ?>
    <div class="alert alert-warning">
      No tests found in the database.
    </div>
  <?php else: ?>
    <div class="list-group">
      <?php foreach ($tables as $table): ?>
        <a href="select_test.php?table=<?php echo urlencode($table); ?>"
           class="list-group-item list-group-item-action">
          <?php echo htmlspecialchars(strtoupper($table)); ?>
        </a>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

  <a href="logout_student.php" class="btn btn-danger mt-4">Logout</a>
</div>

</body>
</html>
