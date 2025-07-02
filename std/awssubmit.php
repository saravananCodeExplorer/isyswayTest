<?php
session_start();
require_once "./db.php";

$answers = $_SESSION['aws_answers'] ?? [];
$score = 0;

foreach ($answers as $question_id => $option_id) {
    $stmt = $pdo->prepare("SELECT is_correct FROM options WHERE id = ?");
    $stmt->execute([$option_id]);
    $is_correct = $stmt->fetchColumn();
    if ($is_correct) {
        $score += 5;
    }
}

// Clean up AWS session data
unset($_SESSION['aws_q_index']);
unset($_SESSION['aws_answers']);
unset($_SESSION['aws_questions']);
unset($_SESSION['aws_test_id']);
unset($_SESSION['aws_test_slug']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AWS Exam Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
    <h2>AWS Exam Completed</h2>
    <p>Your Score: <strong><?php echo $score; ?> / 250</strong></p>
    <a href="dashboard.php" class="btn btn-primary">Back to Dashboard</a>
</div>
</body>
</html>
