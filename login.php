<?php include 'config.php';?>

<?php 
  // Start the session
  session_start();



  // Check if the login form is submitted
  if(isset($_POST['login'])) {
    // Get the username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'reservation');

    // Check if the connection is successful
    if(!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare the query to get the user with the given username and password
    $query = "SELECT * FROM users WHERE username='$username'";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if the query is successful
    if(mysqli_num_rows($result) > 0) {
      // Get the user data
      $user = mysqli_fetch_assoc($result);

      // Save the user data in the session
      $_SESSION['user_id'] = $user['user_id'];
      $_SESSION['full_name'] = $user['full_name'];
      $_SESSION['value'] = $user['value'];

      // Set $login_successful to true
      $login_successful = true;
      // Redirect the user to the appropriate page
      if($_SESSION['value'] == 0) {
        header('Location: indexnew.php');
      } else {
        header('Location: ./admin');
      }
      exit;
    } else {
      // Show an error message if the username or password is incorrect
      $error = 'Invalid username or password';
    }

    // Close the database connection
    mysqli_close($conn);
  }
?>
