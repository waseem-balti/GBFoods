<?php
  // Database connection configuration
  $dbHost = 'localhost';
  $dbUser = 'root';
  $dbPass = '';
  $dbName = 'testlogin';

  // Create a new MySQLi object
  $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

  // Check for connection error
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
?>
