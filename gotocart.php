<?php include 'header.php';?>
<?php include 'headernew.php';?>

<head>
  <link rel="stylesheet" href="gotocartstyles.css">
  <script src="cart.js"></script>
</head>

<body>

  <h1>Cart</h1>


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

  // SQL query to select all rows from the cart table
  $sql = "SELECT * FROM cart";

  // Execute the query and get the result set
  $result = $conn->query($sql);

  // Check if there are any rows in the result set
  if ($result && $result->num_rows > 0) {
    // Store cart items in an array
    $cart_items = array();
    while ($row = $result->fetch_assoc()) {
      $cart_items[] = $row;
    }

    // Close database connection
    $conn->close();
  }

  
// Check if there are any items in the cart
if (empty($cart_items)) {
  echo "<p>Your cart is empty.</p>";
} else {
  // Display cart items on page
  $total_price = 0;
  $items_count = array();
  foreach ($cart_items as $item) {
    // Display cart item information
    echo "<div class='cart-item'>";
    echo "<h3>" . $item['menu_name'] . "</h3>";
    // Display cart item image
    $image_path = "images/" . $item['menu_pic'];
    echo "<img src='$image_path' alt='Cart item image'>";
    echo "<p>Price: PKR " . $item['menu_price'] . "</p>";
    echo "<div class='quantity'>
      <label for='qty-" . $item['menu_id'] . "'>Quantity:</label>
      <input type='number' id='qty-" . $item['menu_id'] . "' name='qty' value='" . $item['qty'] . "' min='1'>
    </div>";

    // Calculate and display item total price
    $item_total = $item['menu_price'] * $item['qty'];
    echo "<p>Item Total: PKR " . $item_total . "</p>";

    // Add remove button
    echo "<button class='remove-btn' data-id='" . $item['menu_id'] . "'>Remove</button>";

    $total_price += $item_total;

    // Count the number of items
    if (array_key_exists($item['menu_id'], $items_count)) {
      $items_count[$item['menu_id']] += 1;
    } else {
      $items_count[$item['menu_id']] = 1;
    }

    echo "</div>";
  }

  // Display total price
  echo "<div class='cart-total'>";
  echo "<h3>Total Price: PKR " . $total_price . "</h3>";
  echo "</div>";

  // Display count of repeating items
  echo "<div class='cart-repeating-items'>";

}

echo "</div>";
?>

<!-- <div class="checkout-btn">
  <button>Checkout</button>
  <div class="options">
    <!-- Add your checkout options here
  </div>
</div> -->
<div class="checkout-btn">
<form action="checkout.php" method="post">
  <!-- form fields go here -->
  <input type="submit" value="Checkout" class="checkout-form btn">
</form>
</div>



<script src="cartscript.js"></script>
<?php include 'footer.php';?>
<?php include 'script.php';?>
<script src="cart_inc_dec.js"></script>
</body>