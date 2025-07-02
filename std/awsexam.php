<?php
session_start();
require_once "./db.php";

// Get test slug
if (!isset($_GET['test']) && !isset($_SESSION['test_slug'])) {
    die("Test not specified.");
}

// Set test slug only once
if (isset($_GET['test'])) {
    $_SESSION['test_slug'] = $_GET['test'];
    $_SESSION['q_index'] = 0;
    $_SESSION['answers'] = [];
}

// Fetch test details
$slug = $_SESSION['test_slug'];
$stmt = $pdo->prepare("SELECT * FROM tests WHERE slug = ?");
$stmt->execute([$slug]);
$test = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$test) die("Invalid test");

// Load questions only once
if (!isset($_SESSION['questions'])) {
    $stmt = $pdo->prepare("SELECT * FROM questions WHERE test_id = ? ORDER BY RAND() LIMIT 50");
    $stmt->execute([$test['id']]);
    $_SESSION['questions'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Get current question
$questions = $_SESSION['questions'];
$q_index = $_SESSION['q_index'];
if ($q_index >= count($questions)) {
    // All done
    header("Location: submit_exam.php");
    exit;
}

$current_question = $questions[$q_index];

// Get options
$stmt = $pdo->prepare("SELECT * FROM options WHERE question_id = ?");
$stmt->execute([$current_question['id']]);
$options = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['answers'][$current_question['id']] = $_POST['answer'] ?? null;
    $_SESSION['q_index']++;
    header("Location: awsexam.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($test['name']); ?> | Question <?php echo $q_index + 1; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
    <h2><?php echo htmlspecialchars($test['name']); ?> Exam</h2>
    <p>Question <?php echo $q_index + 1; ?> of <?php echo count($questions); ?></p>

    <form method="post">
        <div class="mb-4 p-3 border rounded">
            <h5><?php echo htmlspecialchars($current_question['question_text']); ?></h5>
            <?php foreach ($options as $option): ?>
                <div class="form-check">
                    <input class="form-check-input"
                           type="radio"
                           name="answer"
                           value="<?php echo $option['id']; ?>"
                           required>
                    <label class="form-check-label">
                        <?php echo htmlspecialchars($option['option_text']); ?>
                    </label>
                </div>
            <?php endforeach; ?>
        </div>
        <button type="submit" class="btn btn-primary">
            <?php echo ($q_index + 1 == count($questions)) ? 'Finish Exam' : 'Next'; ?>
        </button>
    </form>
</div>
</body>
</html>
