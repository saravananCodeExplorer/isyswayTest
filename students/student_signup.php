<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Signup</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">

      <div class="card shadow">
        <div class="card-header bg-primary text-white">
          <h4 class="mb-0">Student Signup</h4>
        </div>
        <div class="card-body">
          <form method="POST" action="register_student.php">
            <div class="mb-3">
              <label class="form-label">Full Name</label>
              <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">College Name</label>
              <input type="text" name="college" class="form-control">
            </div>
            <div class="mb-3">
              <label class="form-label">Department</label>
              <input type="text" name="department" class="form-control">
            </div>
            <div class="mb-3">
              <label class="form-label">Year</label>
              <select name="year" class="form-select" required>
                <option value="">Select Year</option>
                <option value="First">First</option>
                <option value="Second">Second</option>
                <option value="Third">Third</option>
                <option value="Final">Final</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Confirm Password</label>
              <input type="password" name="confirm_password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success w-100">Register</button>
          </form>
        </div>
      </div>

      <div class="text-center mt-3">
        Already have an account? <a href="student_login.php">Login here</a>.
      </div>

    </div>
  </div>
</div>

</body>
</html>
