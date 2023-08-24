<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Restaurant Inventory System</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<div class="container">
		<h1>Restaurant Inventory System</h1>
		<form action="inventory.php" method="post">
			<label for="date">Date:</label>
			<input type="date" id="date" name="date" required>
			<br>
			<label for="item">Item:</label>
			<input type="text" id="item" name="item" required>
			<br>
			<label for="quantity">Quantity:</label>
			<input type="number" id="quantity" name="quantity" min="1" required>
			<br>
			<button type="submit" class="btn btn-primary">Add to Inventory</button>
		</form>
		<?php
		// Connect to database
		$db_host = "localhost";
		$db_user = "root";
		$db_password = "";
		$db_name = "reservation";
		$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		// Create table if it doesn't exist
		$table_name = "inventory";
		$sql_create_table = "CREATE TABLE IF NOT EXISTS $table_name (
		                        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		                        date DATE NOT NULL,
		                        item VARCHAR(30) NOT NULL,
		                        quantity INT(6) NOT NULL
		                    )";

		if (mysqli_query($conn, $sql_create_table)) {
			echo "Table created successfully";
		} else {
			echo "Error creating table: " . mysqli_error($conn);
		}

		// Insert data into inventory table
		if (isset($_POST["date"]) && isset($_POST["item"]) && isset($_POST["quantity"])) {
			$date = $_POST["date"];
			$item = $_POST["item"];
			$quantity = $_POST["quantity"];
			$sql = "INSERT INTO inventory (date, item, quantity) VALUES ('$date', '$item', $quantity)";
			if (mysqli_query($conn, $sql)) {
				echo "Item added to inventory successfully";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}

		// Remove item from inventory table
		if (isset($_POST["remove_id"])) {
			$remove_id = $_POST["remove_id"];
			$sql_remove = "DELETE FROM inventory WHERE id=$remove_id";
			if (mysqli_query($conn, $sql_remove)) {
				echo "Item removed from inventory successfully";
			} else {
				echo "Error: " . $sql_remove . "<br>" . mysqli_error($conn);
			}
		}

		// Show inventory items
		$sql_select = "SELECT * FROM inventory";
		$result = mysqli_query($conn, $sql_select);
		if (mysqli_num_rows($result) > 0) {
			echo
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
        echo "<td><form method='post' onsubmit='return confirm(\"Are you sure you want to remove this item?\")'>";
        echo "<input type='hidden' name='remove_id' value='".$row["id"]."'>";
        echo "<button type='submit' class='btn btn-danger'>Remove</button>";
        echo "</form></td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "No items found in inventory";
	}
}