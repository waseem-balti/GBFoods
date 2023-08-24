<?php
  // Start the session
  session_start();

  // Check if the user is not logged in
  if(!isset($_SESSION['user_id'])) {
    // Redirect to the login page
    header('Location: login.php');
    exit;
  }

  // Show the user profile information
  echo 'User ID: ' . $_SESSION['user_id'] . '<br>';
  echo 'Full Name: ' . $_SESSION['full_name'] . '<br>';
  echo 'Value: ' . $_SESSION['value'];
?>