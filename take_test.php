<?php
session_start();

$questions = $_SESSION['test_questions'] ?? [];

if (!$questions) {
    die("No test loaded. Please start the test first.");
}
$table = $_SESSION['test_table'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo htmlspecialchars(strtoupper($table)); ?> Test</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container my-5">
  <h2 class="mb-4 text-primary">
    Test - <?php echo htmlspecialchars(strtoupper($table)); ?>
  </h2>

  <form method="post" action="submit_test.php">
    <?php foreach ($questions as $index => $q): ?>
      <div class="card mb-3">
        <div class="card-header">
          <strong>Q<?php echo $index + 1; ?>:</strong>
          <?php echo htmlspecialchars($q['question']); ?>
        </div>
        <div class="card-body">
          <?php for ($i = 1; $i <= 4; $i++): ?>
            <?php $opt = 'option' . $i; ?>
            <div class="form-check">
              <input type="checkbox"
                     class="form-check-input answer-checkbox"
                     name="answers[<?php echo $q['id']; ?>][]"
                     value="<?php echo htmlspecialchars($q[$opt]); ?>"
                     data-question="<?php echo $q['id']; ?>">
              <label class="form-check-label">
                <?php echo htmlspecialchars($q[$opt]); ?>
              </label>
            </div>
          <?php endfor; ?>
        </div>
      </div>
    <?php endforeach; ?>
    <button type="submit" class="btn btn-success">Submit Test</button>
  </form>
</div>

<script>
  document.querySelectorAll('.answer-checkbox').forEach(function(checkbox) {
    checkbox.addEventListener('change', function() {
      let questionId = this.dataset.question;
      if (this.checked) {
        // Uncheck other checkboxes for this question
        document.querySelectorAll(
          '.answer-checkbox[data-question="' + questionId + '"]'
        ).forEach(function(box) {
          if (box !== checkbox) {
            box.checked = false;
          }
        });
      }
    });
  });
</script>

</body>
</html>
