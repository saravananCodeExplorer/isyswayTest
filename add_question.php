<?php
session_start();
if (!isset($_SESSION['admin_email'])) {
    header("Location: admin_login.php");
    exit;
}

include_once 'db.php';

$table = $_GET['table'] ?? '';

if (!$table) {
    die("No table specified.");
}

// Handle Create
if (isset($_POST['add'])) {
    $question = mysqli_real_escape_string($con, $_POST['question']);
    $option1 = mysqli_real_escape_string($con, $_POST['option1']);
    $option2 = mysqli_real_escape_string($con, $_POST['option2']);
    $option3 = mysqli_real_escape_string($con, $_POST['option3']);
    $option4 = mysqli_real_escape_string($con, $_POST['option4']);
    $answer = mysqli_real_escape_string($con, $_POST['answer']);

    $sql = "INSERT INTO $table (question, option1, option2, option3, option4, answer)
            VALUES ('$question', '$option1', '$option2', '$option3', '$option4', '$answer')";
    mysqli_query($con, $sql);

    header("Location: add_question.php?table=$table");
    exit;
}

// Handle Delete
if (isset($_GET['delete_id'])) {
    $id = intval($_GET['delete_id']);
    mysqli_query($con, "DELETE FROM $table WHERE id=$id");
    header("Location: add_question.php?table=$table");
    exit;
}

// Handle Edit Form Submission
if (isset($_POST['update'])) {
    $id = intval($_POST['id']);
    $question = mysqli_real_escape_string($con, $_POST['question']);
    $option1 = mysqli_real_escape_string($con, $_POST['option1']);
    $option2 = mysqli_real_escape_string($con, $_POST['option2']);
    $option3 = mysqli_real_escape_string($con, $_POST['option3']);
    $option4 = mysqli_real_escape_string($con, $_POST['option4']);
    $answer = mysqli_real_escape_string($con, $_POST['answer']);

    $sql = "UPDATE $table SET 
                question='$question',
                option1='$option1',
                option2='$option2',
                option3='$option3',
                option4='$option4',
                answer='$answer'
            WHERE id=$id";
    mysqli_query($con, $sql);

    header("Location: add_question.php?table=$table");
    exit;
}

// If editing, fetch that question
$editData = null;
if (isset($_GET['edit_id'])) {
    $id = intval($_GET['edit_id']);
    $res = mysqli_query($con, "SELECT * FROM $table WHERE id=$id");
    $editData = mysqli_fetch_assoc($res);
}

// Fetch all questions
$questions = mysqli_query($con, "SELECT * FROM $table ORDER BY id DESC");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Manage Questions</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />
</head>
<body class="bg-light">
<div class="container my-5">
  <h2 class="mb-4 text-primary">
    <i class="bi bi-plus-circle"></i> <?php echo htmlspecialchars(strtoupper($table)); ?> - Manage Questions
  </h2>

  <!-- Add / Edit Form -->
  <div class="card mb-4">
    <div class="card-header">
      <?php echo $editData ? 'Edit Question' : 'Add New Question'; ?>
    </div>
    <div class="card-body">
      <form method="POST">
        <?php if ($editData): ?>
          <input type="hidden" name="id" value="<?php echo $editData['id']; ?>">
        <?php endif; ?>
        <div class="mb-3">
          <label class="form-label">Question</label>
          <input type="text" name="question" class="form-control" required
                 value="<?php echo $editData ? htmlspecialchars($editData['question']) : ''; ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Option 1</label>
          <input type="text" name="option1" class="form-control" required
                 value="<?php echo $editData ? htmlspecialchars($editData['option1']) : ''; ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Option 2</label>
          <input type="text" name="option2" class="form-control" required
                 value="<?php echo $editData ? htmlspecialchars($editData['option2']) : ''; ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Option 3</label>
          <input type="text" name="option3" class="form-control" required
                 value="<?php echo $editData ? htmlspecialchars($editData['option3']) : ''; ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Option 4</label>
          <input type="text" name="option4" class="form-control" required
                 value="<?php echo $editData ? htmlspecialchars($editData['option4']) : ''; ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Correct Answer</label>
          <input type="text" name="answer" class="form-control" required
                 value="<?php echo $editData ? htmlspecialchars($editData['answer']) : ''; ?>">
        </div>
        <button type="submit" name="<?php echo $editData ? 'update' : 'add'; ?>" class="btn btn-success">
          <?php echo $editData ? 'Update' : 'Add'; ?> Question
        </button>
        <?php if ($editData): ?>
          <a href="add_question.php?table=<?php echo $table; ?>" class="btn btn-secondary">Cancel</a>
        <?php endif; ?>
      </form>
    </div>
  </div>

  <!-- Questions Table -->
  <div class="card">
    <div class="card-header">
      All Questions
    </div>
    <div class="card-body p-0">
      <table class="table table-striped table-hover mb-0">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Question</th>
            <th>Answer</th>
            <th style="width: 150px;">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_assoc($questions)): ?>
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo htmlspecialchars(substr($row['question'], 0, 50)); ?>...</td>
              <td><?php echo htmlspecialchars($row['answer']); ?></td>
              <td>
                <a href="add_question.php?table=<?php echo $table; ?>&edit_id=<?php echo $row['id']; ?>"
                   class="btn btn-sm btn-primary">
                  <i class="bi bi-pencil-square"></i>
                </a>
                <a href="add_question.php?table=<?php echo $table; ?>&delete_id=<?php echo $row['id']; ?>"
                   class="btn btn-sm btn-danger"
                   onclick="return confirm('Delete this question?');">
                  <i class="bi bi-trash"></i>
                </a>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>

</div>
</body>
</html>
