<?php
session_start();

$questions = $_SESSION['test_questions'] ?? [];
$user_answers = $_POST['answers'] ?? [];

$score = 0;
$total = count($questions);
$results = [];

foreach ($questions as $q) {
    $id = $q['id'];
    $correct = $q['answer'];
    $user = $user_answers[$id] ?? null;

    $isCorrect = ($user === $correct);
    if ($isCorrect) {
        $score++;
    }

    $results[] = [
        'question' => $q['question'],
        'correct' => $correct,
        'user' => $user,
        'isCorrect' => $isCorrect,
    ];
}
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
            <?php echo htmlspecialchars($r['user'] ?? 'No Answer'); ?>
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
</div>
</body>
</html>
