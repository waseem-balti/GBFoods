
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
      menu_pic VARCHAR(255) NOT NULL
  )";
  mysqli_query($conn, $sql);

  // Get the menu_pic value from the menu table
  $sql = "SELECT menu_pic FROM menu WHERE menu_id = '$menu_id'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $menu_pic = $row['menu_pic'];

  // Insert the data into the cart table
  $sql = "INSERT INTO cart (menu_id, menu_name, menu_price, qty, menu_pic) VALUES ('$menu_id', '$menu_name', '$menu_price', '$qty', '$menu_pic')";
  mysqli_query($conn, $sql);

  // Close database connection
  mysqli_close($conn);

  // Redirect the user back to the menu page
  header('Location: newmenu.php');
  exit;
}
?>

<!-- Add HTML code to display the image on the menu page -->
<img src="images/<?php echo $menu_pic; ?>" alt="<?php echo $menu_name; ?>">
