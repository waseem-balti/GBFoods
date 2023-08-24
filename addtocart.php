<?php include 'login.php'?>
<?php
// Start the PHP code block
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form data from $_POST and store it in variables
  $menu_id = $_POST['menu_id'];
  $menu_name = $_POST['menu_name'];
  $menu_price = $_POST['menu_price'];
  $qty = $_POST['qty'];

  // Connect to the database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "reservation";
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  // Check if the item already exists in the cart and update its quantity
  $sql = "SELECT * FROM cart WHERE menu_id = '$menu_id'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $qty += $row['qty'];
      $sql = "UPDATE cart SET qty = '$qty' WHERE menu_id = '$menu_id'";
      mysqli_query($conn, $sql);
      mysqli_close($conn);
      header('Location: newmenu.php');
      exit;
  }

  // Create a new table called cart if it does not already exist
  $sql = "CREATE TABLE IF NOT EXISTS cart (
      menu_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      menu_name VARCHAR(50) NOT NULL,
      menu_price DECIMAL(10,2) NOT NULL,
      qty INT(2) NOT NULL,
      menu_pic VARCHAR(255) NOT NULL,
      username VARCHAR(255) NOT NULL
  )";
  mysqli_query($conn, $sql);


// Start the session
session_start();

// Check if the user is logged in
if(!isset($_SESSION['user_id'])) {
  // Redirect to the login page
  header('Location: login.php');
  exit;
}

// Get the user ID of the logged-in user
$user_id = $_SESSION['user_id'];

// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'reservation');

// Check if the connection is successful
if(!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Prepare the SQL query to get the username for the logged-in user
$sql = "SELECT username FROM users WHERE user_id='$user_id'";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if the query was successful and if the user was found
if($result && mysqli_num_rows($result) > 0) {
  // Get the username of the logged-in user
  $row = mysqli_fetch_assoc($result);
  $current_username = $row['username'];

  // Prepare the SQL query to insert the data into the cart table
  $sql = "INSERT INTO cart (menu_id, menu_name, menu_price, qty, menu_pic, username) VALUES ('$menu_id', '$menu_name', '$menu_price', '$qty', '$menu_pic', '$current_username')";

  // Execute the query
  if(mysqli_query($conn, $sql)) {
    // The query was successful
    echo "Record inserted successfully";
  } else {
    // The query failed
    echo "Error inserting record: " . mysqli_error($conn);
  }
} else {
  // The user was not found
  echo "Error: User not found";
}

// Close the database connection
mysqli_close($conn);

  // Redirect the user back to the menu page
  header('Location: newmenu.php');
  exit;
}
?>

<!-- Add HTML code to display the image on the menu page -->
<img src="images/<?php echo $menu_pic; ?>" alt="<?php echo $menu_name; ?>">
