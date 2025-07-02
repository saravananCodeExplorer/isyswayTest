<?php
session_start();
if (!isset($_SESSION['admin_email'])) {
    header("Location: admin_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .dashboard {
      max-width: 600px;
      margin: auto;
      margin-top: 80px;
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      padding: 30px;
    }
    .dashboard h2 {
      text-align: center;
      margin-bottom: 30px;
      color: #333;
    }
    .list-group-item {
      display: flex;
      align-items: center;
      font-size: 1.1rem;
      transition: background-color 0.2s ease;
      justify-content: space-between;
    }
    .list-group-item i {
      font-size: 1.5rem;
      margin-right: 12px;
    }
    .list-group-item:hover {
      background-color: #e9ecef;
    }
    .logout {
      color: #dc3545 !important;
      font-weight: 600;
    }
    .logout i {
      color: #dc3545;
    }
    .aws { color: #FF9900; }        /* AWS orange */
    .azure { color: #007FFF; }      /* Azure blue */
    .java { color: #E76F00; }       /* Java orange */
    .gcloud { color: #4285F4; }     /* Google Cloud blue */
  </style>
</head>
<body>
  <div class="dashboard">
    <h2><i class="bi bi-speedometer2"></i> Admin Dashboard</h2>
    <ul class="list-group">
      <li class="list-group-item">
        <span><i class="bi bi-cloud aws"></i> Add AWS Question</span>
        <a href="add_question.php?table=aws_questions" class="btn btn-sm btn-outline-primary">Go</a>
      </li>
      <li class="list-group-item">
        <span><i class="bi bi-cloud-fill azure"></i> Add Azure Question</span>
        <a href="add_question.php?table=azure_questions" class="btn btn-sm btn-outline-primary">Go</a>
      </li>
      <li class="list-group-item">
        <span><i class="bi bi-braces java"></i> Add Java Question</span>
        <a href="add_question.php?table=java_questions" class="btn btn-sm btn-outline-primary">Go</a>
      </li>
      <li class="list-group-item">
        <span><i class="bi bi-clouds gcloud"></i> Add Google Cloud Question</span>
        <a href="add_question.php?table=gcloud_questions" class="btn btn-sm btn-outline-primary">Go</a>
      </li>
      <li class="list-group-item logout">
        <a href=""></a>
        <a href="admin_logout.php" class="btn btn-sm btn-outline-danger">Logout</a>
      </li>
    </ul>
  </div>
</body>
</html>
