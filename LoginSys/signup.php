<?php
session_start();
require_once('dbConnect.php');

if(isset($_POST['signup'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
  $result = mysqli_query($conn, $sql);

  if($result){
    $_SESSION['message'] = "Signup Successful! Please login to continue.";
    header("location: home.php");
  }
  else{
    $_SESSION['message'] = "Signup Failed!";
    header("location: signup.php");
  }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Signup Page</title>
</head>
<body>
  <h2>Signup Page</h2>
  <?php 
    if(isset($_SESSION['message'])){
      echo "<div>".$_SESSION['message']."</div>";
      unset($_SESSION['message']);
    }
  ?>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label>Username:</label>
    <input type="text" name="username" required><br><br>
    <label>Password:</label>
    <input type="password" name="password" required><br><br>
    <input type="submit" name="signup" value="Signup">
  </form>
  <p>Already have an account? <a href="home.php">Login here</a>.</p>
</body>
</html>
