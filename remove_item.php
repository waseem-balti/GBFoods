<?php
// Database connection information
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reservation";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the remove button has been clicked
if (isset($_POST['remove_item_id'])) {
  $remove_item_id = $_POST['remove_item_id'];

  // SQL query to delete the item from the cart table
  $sql = "DELETE FROM cart WHERE menu_id = $remove_item_id";

  // Execute the query
  $result = $conn->query($sql);

  // Reload the page
  header('Location: cart.php');
  exit();
}

// Close database connection
$conn->close();
?>
