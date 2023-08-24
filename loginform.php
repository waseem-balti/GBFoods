<?php 
include 'header.php';
include 'headernew.php';

// Initialize the error variable
$error = '';

// Check if the login form is submitted
if (isset($_POST['login'])) {
  // Get the username and password from the login form
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Connect to the reservation database using PDO
  $dsn = 'mysql:host=localhost;dbname=reservation';
  $db_username = 'root';
  $db_password = '';
  $pdo = new PDO($dsn, $db_username, $db_password);

  // Query the user's table to check if the user exists
  $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?');
  $stmt->execute([$username]);
  $user = $stmt->fetch();

  // Check if the user is found
  if ($user) {
    // Check if the password matches
    if (password_verify($password, $user['password'])) {
      // Start the session and set the user ID as a session variable
      session_start();
      $_SESSION['user_id'] = $user['id'];

      // Redirect to the home page
      header('Location: index.php');
      exit;
    } else {
      $error = 'Wrong password.';
    }
  } else {
    $error = 'User not found.';
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="./loginformstyle.css">
</head>
<body>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header text-center">
            <h2>Login</h2>
          </div>
          <div class="card-body">
            <form action="login.php" method="post" name="login">
              <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" class="form-control" required>
              </div>
              <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" class="form-control" required>
          </div>

          <button type="submit" class="btn btn-primary" name="login">Login</button>

          <?php 
            // Show the error message if there is any
            if(!empty($error)) {
              echo '<p class="error">' . $error . '</p>';
            }
          ?>
        </form>
      </div>
      <div class="card-footer">
        <p>Don't have an account? <a href="signup.php">Sign up</a></p>
      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>