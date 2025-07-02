<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | Student Test System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        .dashboard-page {
            /* background: linear-gradient(135deg, #6a11cb, #2575fc); */
            min-height: calc(100vh - 56px - 56px);
            /* 56px assumed header/footer height */
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }
        .dashboard-box {
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
            width: 100%;
            max-width: 600px;
            text-align: center;
        }
        .btn-test {
            width: 100%;
            margin-bottom: 15px;
            /* background-color: #2575fc; */
            border: none;
            color: #fff;
            font-size: 18px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            padding: 12px;
        }
        .btn-test:hover {
            background-color: #6a11cb;
        }
    </style>
</head>
<body>

<?php include "header.php"; ?>

<div class="dashboard-page">
    <div class="dashboard-box">
        <h2 class="mb-4">Welcome to Dashboard</h2>
        <h4>Hello, <?php echo htmlspecialchars($_SESSION['user']); ?>!</h4>
        <p class="mt-3">Select a test to begin:</p>

        <div class="row">
  <div class="row g-3">
    <div class="col-md-6">
        <a href="awsexam.php" class="btn btn-test">
    <i class="fab fa-aws"></i> AWS Exam
</a>

    </div>
    <div class="col-md-6">
        <a href="exam.php?test=azure" class="btn btn-test">
            <i class="fas fa-cloud"></i> Azure Exam
        </a>
    </div>
    <div class="col-md-6">
        <a href="exam.php?test=java" class="btn btn-test">
            <i class="fab fa-java"></i> Java Exam
        </a>
    </div>
    <div class="col-md-6">
        <a href="exam.php?test=gcloud" class="btn btn-test">
            <i class="fab fa-google"></i> Google Cloud Exam
        </a>
    </div>
</div>


        </div>

        <a href="logout.php" class="btn btn-primary mt-4">Logout</a>
    </div>
</div>

<?php include "footer.php"; ?>
