<?php
// Connect to database
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "reservation";
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error connecting to database: " . $e->getMessage();
}

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create table if it doesn't exist
$table_name = "inventory";

// Insert data into inventory table
if (isset($_POST["date"]) && isset($_POST["item"]) && isset($_POST["quantity"])) {
  $date = $_POST["date"];
  $item = $_POST["item"];
  $quantity = $_POST["quantity"];
  
  // Check if item already exists in inventory
  $check_query = "SELECT * FROM inventory WHERE item='$item'";
  $check_result = mysqli_query($conn, $check_query);
  
  if (mysqli_num_rows($check_result) > 0) {
      // Item already exists, update its quantity
      $update_query = "UPDATE inventory SET quantity = quantity + $quantity WHERE item='$item'";
      if (mysqli_query($conn, $update_query)) {
          echo "Item quantity updated in inventory successfully";
      } else {
          echo "Error updating item quantity: " . mysqli_error($conn);
      }
  } else {
      // Item does not exist, insert it into inventory
      $insert_query = "INSERT INTO inventory (date, item, quantity) VALUES ('$date', '$item', $quantity)";
      if (mysqli_query($conn, $insert_query)) {
          echo "Item added to inventory successfully";
      } else {
          echo "Error adding item to inventory: " . mysqli_error($conn);
      }
  }
}


// Remove item from inventory table
if (isset($_POST["remove_id"]) && isset($_POST["remove_quantity"])) {
  $remove_id = $_POST["remove_id"];
  $remove_quantity = $_POST["remove_quantity"];
  $sql_remove = "UPDATE inventory SET quantity = quantity - $remove_quantity WHERE id=$remove_id";
  if (mysqli_query($conn, $sql_remove)) {
      echo "Item removed from inventory successfully";
      // Check if quantity is zero and remove item completely
      $sql_check_quantity = "SELECT quantity FROM inventory WHERE id=$remove_id";
      $result = mysqli_query($conn, $sql_check_quantity);
      $row = mysqli_fetch_assoc($result);
      if ($row['quantity'] == 0) {
          $sql_delete = "DELETE FROM inventory WHERE id=$remove_id";
          mysqli_query($conn, $sql_delete);
          echo "Item completely removed from inventory";
      }
      // Refresh page to show updated inventory
      header("Refresh:0");
  } else {
      echo "Error: " . $sql_remove . "<br>" . mysqli_error($conn);
  }
}

if (isset($_POST['remove'])) {
  $item_id = $_POST['remove'];
  $remove_quantity = $_POST['remove_quantity'];
  $stmt = $pdo->prepare("UPDATE inventory SET quantity = quantity - ? WHERE id = ?");
  $stmt->execute([$remove_quantity, $item_id]);
  // Check if quantity is zero and remove item completely
  $stmt_check_quantity = $pdo->prepare("SELECT quantity FROM inventory WHERE id = ?");
  $stmt_check_quantity->execute([$item_id]);
  $quantity = $stmt_check_quantity->fetchColumn();
  if ($quantity == 0) {
      $stmt_delete = $pdo->prepare("DELETE FROM inventory WHERE id = ?");
      $stmt_delete->execute([$item_id]);
      echo "Item completely removed from inventory";
  }
  header("Location: inventory.php");
  exit;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Inventory System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="inventorystyles.css">
</head>
<body>
    <div class="container">
        <h1>Restaurant Inventory System</h1>
        <form action="inventory.php" method="post">
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" value="<?php echo date('Y-m-d'); ?>" required>
            <br>
            <label for="item">Item:</label>
            <input type="text" id="item" name="item" required>
            <br>
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" min="1" required>
            <br>
            <button type="submit" class="btn btn-primary">Add to Inventory</button>
    </form>
    <hr>
  </div>
  <?php
	// Show inventory items
$sql_select = "SELECT * FROM inventory";
$result = mysqli_query($conn, $sql_select);

if (mysqli_num_rows($result) > 0) {
echo "<table class='table table-striped table-bordered'>";
echo "<thead class='thead-dark'>";
echo "<tr><th>ID</th><th>Date</th><th>Item</th><th>Quantity</th><th>Actions</th></tr>";
echo "</thead>";
echo "<tbody>";
while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr>";
  echo "<td>".$row["id"]."</td>";
  echo "<td>".$row["date"]."</td>";
  echo "<td>".$row["item"]."</td>";
  echo "<td>".$row["quantity"]."</td>";
  echo "<td>";
  echo "<form method='post' onsubmit='return confirm(\"Are you sure you want to remove this item?\")'>";
  echo "<input type='hidden' name='remove_id' value='".$row["id"]."'>";
  echo '<form method="post">
  <div class="form-group row">
    <div class="col-sm-6">
      <input type="number" name="remove_quantity" min="1" value="1" class="form-control">
    </div>
    <div class="col-sm-6">
      <button type="submit" name="remove" class="btn btn-danger">Remove</button>
    </div>
  </div>
</form>
';
  echo "</form>";
  echo "</td>";
  echo "</tr>";
}

echo "</tbody>";
echo "</table>";
} else {
echo "<p>No items found in inventory</p>";
}

?>

  <!-- Bootstrap JavaScript -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
</body>

</html>