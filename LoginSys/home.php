<?php
// Start the session
session_start();

// Check if user is already logged in
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: dashboard.php");
    exit;
}

// Include database connection file
require_once "dbConnect.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate credentials
   // Validate credentials
if(empty($username_err) && empty($password_err)){
  // Prepare a select statement
  $sql = "SELECT id, username, password FROM users WHERE username = ?";

  if($stmt = $conn->prepare($sql)){
      // Bind variables to the prepared statement as parameters
      $stmt->bind_param("s", $param_username);

      // Set parameters
      $param_username = $username;

      // Attempt to execute the prepared statement
      if($stmt->execute()){
          // Store result
          $stmt->store_result();

          // Check if username exists, if yes then verify password
          if($stmt->num_rows == 1){
              // Bind result variables
              $stmt->bind_result($id, $username, $stored_password);
              if($stmt->fetch()){
                  if($password == $stored_password){
                      // Password is correct, so start a new session
                      session_start();

                      // Store data in session variables
                      $_SESSION["loggedin"] = true;
                      $_SESSION["id"] = $id;
                      $_SESSION["username"] = $username;

                      // Redirect user to dashboard page
                      header("location: dashboard.php");
                  } else{
                      // Display an error message if password is not valid
                      $password_err = "The password you entered was not valid.";
                  }
              }
          } else{
              // Display an error message if username doesn't exist
              $username_err = "No account found with that username.";
          }
      } else{
          echo "Oops! Something went wrong. Please try again later.";
      }

      // Close statement
      $stmt->close();
  }
}

// Close connection
$conn->close();

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $username; ?>">
            <span><?php echo $username_err; ?></span>
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password">
            <span><?php echo $password_err; ?></span>
        </div>
        <div>
            <input type="submit" value="Login">
        </div>  
      <div>
        <p>Don't have an account? <a href="signup.php">Sign up now</a>.</p>
    </form>
<!-- Show sign up button if user doesn't have an account -->
<?php
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    echo '<form action="signup.php">
            <input type="submit" value="Sign Up">
          </form>';
}
?>
</body>
</html>




