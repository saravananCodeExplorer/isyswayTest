<?php
session_start();
include 'db.php';

// Check if student is logged in
if (!isset($_SESSION['student_id'])) {
    header("Location: student_login.php");
    exit;
}

$student_id = $_SESSION['student_id'];
$student_name = $_SESSION['student_name'];
$student_email = $_SESSION['student_email'];

// Retrieve test info
$questions = $_SESSION['test_questions'] ?? [];
$table = $_SESSION['test_table'] ?? '';

$user_answers = $_POST['answers'] ?? [];

$score = 0;
$total = count($questions);
$results = [];

foreach ($questions as $q) {
    $id = $q['id'];
    $correct = $q['answer'];

    // Checkboxes may send array or single value
    $user = $user_answers[$id] ?? null;

    // Handle arrays from checkboxes
    if (is_array($user)) {
        $userAnswerStr = implode(', ', $user);
        $isCorrect = in_array($correct, $user);
    } else {
        $userAnswerStr = $user;
        $isCorrect = ($user === $correct);
    }

    if ($isCorrect) {
        $score++;
    }

    $results[] = [
        'question' => $q['question'],
        'correct' => $correct,
        'user' => $userAnswerStr ?: 'No Answer',
        'isCorrect' => $isCorrect,
    ];
}

// Save score to database
$stmt = $con->prepare("
    INSERT INTO student_scores (student_id, student_name, student_email, test_table, score, total, date_taken)
    VALUES (?, ?, ?, ?, ?, ?, NOW())
");
$stmt->bind_param(
    "isssii",
    $student_id,
    $student_name,
    $student_email,
    $table,
    $score,
    $total
);
$stmt->execute();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Test Results</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
  <h2 class="text-success mb-4">
    Your Score: <?php echo $score; ?> / <?php echo $total; ?>
  </h2>

  <?php foreach ($results as $index => $r): ?>
    <div class="card mb-3">
      <div class="card-header">
        <strong>Q<?php echo $index + 1; ?>:</strong>
        <?php echo htmlspecialchars($r['question']); ?>
      </div>
      <div class="card-body">
        <p>Your Answer:
          <strong class="<?php echo $r['isCorrect'] ? 'text-success' : 'text-danger'; ?>">
            <?php echo htmlspecialchars($r['user']); ?>
          </strong>
        </p>
        <?php if (!$r['isCorrect']): ?>
          <p>Correct Answer:
            <strong class="text-success">
              <?php echo htmlspecialchars($r['correct']); ?>
            </strong>
          </p>
        <?php endif; ?>
      </div>
    </div>
  <?php endforeach; ?>

  <a href="select_test.php" class="btn btn-primary mt-4">Take Another Test</a>
</div>

</body>
</html>
