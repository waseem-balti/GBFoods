<?php include 'header.php';?>
<?php include 'headernew.php';?>


<!DOCTYPE html>
<head>
	<title>Signup Form</title>
	<link rel="stylesheet" href="signupstyles.css">
</head>

<body>
	<?php
	// Define variables and set to empty values
	$nameErr = $emailErr = $phoneErr = $passwordErr = $password2Err =  $usernameErr = "";
	$name = $email = $phone = $password = $password2 = $username = "";

	// Validate form data on submit
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["name"])) {
			$nameErr = "Name is required";
		} else {
			$name = test_input($_POST["name"]);
			// Check if name contains only letters and whitespace
			if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
				$nameErr = "Only letters and white space allowed";
			}
		}

		if (empty($_POST["email"])) {
			$emailErr = "Email is required";
		} else {
			$email = test_input($_POST["email"]);
			// Check if email address is well-formed
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "Invalid email format";
			}
		}

		if (empty($_POST["phone"])) {
			$phoneErr = "Phone number is required";
		} else {
			$phone = test_input($_POST["phone"]);
		// Check if phone number is well-formed
		if (!preg_match("/^(\+92|0)(3\d{2}|4\d{2}|5\d{2}|6\d{2}|7\d{2}|8\d{2}|9\d{2})\d{7}$/", $phone)) {
				$phoneErr = "Invalid phone number format";
		}
		}

		if (empty($_POST["password"])) {
			$passwordErr = "Password is required";
		} else {
			$password = test_input($_POST["password"]);
			// Check if password is strong
			if (strlen($password) < 4) {
				$passwordErr = "Password must be at least 4 characters long";
			}
		}

    if (empty($_POST["password2"])) {
			$password2Err = "Please re-enter your password";
		} else {
			$password2 = test_input($_POST["password2"]);
			// Check if password matches verification
			if ($password != $password2) {
				$password2Err = "Passwords do not match";
			}
		}

		if (empty($_POST["username"])) {
			$usernameErr = "Username is required";
	} else {
			$username = test_input($_POST["username"]);
			// Check if username contains only letters, numbers, and underscores
			if (!preg_match("/^[a-zA-Z0-9_]*$/",$username)) {
					$usernameErr = "Only letters, numbers, and underscores allowed";
			}
	}
	
	}

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	?>

<h2>Signup Form</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
	<label for="name">Name:</label>
	<input type="text" id="name" name="name" value="<?php echo $name; ?>">
	<span class="error"><?php echo $nameErr; ?></span>

	<label for="username">Username:</label>
	<input type="text" id="username" name="username" value="<?php echo $username; ?>">
	<span class="error"><?php echo $usernameErr; ?></span>

	<label for="email">Email:</label>
	<input type="email" id="email" name="email" value="<?php echo $email; ?>">
	<span class="error"><?php echo $emailErr; ?></span>

	<label for="phone">Phone:</label>
	<input type="tel" id="phone" name="phone" value="<?php echo $phone; ?>">
	<span class="error"><?php echo $phoneErr; ?></span>

	<label for="password">Password:</label>
	<input type="password" id="password" name="password">
	<span class="error"><?php echo $passwordErr; ?></span>

	<label for="password2">Confirm Password:</label>
	<input type="password" id="password2" name="password2">
	<span class="error"><?php echo $password2Err; ?></span>

	<div class="buttondiv">
		<input  type="submit" value="Sign up" name="submit">
		<h3>Already have account?</h3>
		<input type="button" value="Sign in">
	</div>
</form>


</body>
<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$dbname = "reservation";

	$conn = mysqli_connect($host, $user, $pass, $dbname);
	if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
	}

	// Check if table exists, create it if it doesn't
	if(mysqli_query($conn, "DESCRIBE `users`")) {
		// Table exists
	} else {
		$sql = "CREATE TABLE users (
				user_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				name VARCHAR(30) NOT NULL,
				username VARCHAR(30) NOT NULL,
				email VARCHAR(50) NOT NULL,
				phone VARCHAR(30) NOT NULL,
				password VARCHAR(255) NOT NULL
		)";
		if (mysqli_query($conn, $sql)) {
			echo "Table created successfully";
		} else {
			echo "Error creating table: " . mysqli_error($conn);
		}
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // code to execute on form submission
		$name = $_POST['name'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$password = $_POST['password'];
		$stmt = mysqli_prepare($conn, "INSERT INTO users (full_name, email, phone, password, username) VALUES (?, ?, ?, ?, ?)");
	mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $phone, $password, $username);
		mysqli_stmt_execute($stmt);
		if (mysqli_affected_rows($conn) > 0) {
			?>
			<script>
				alert('User created successfully')
			</script>
			<?php
		} else {
				echo "Error creating user: " . mysqli_error($conn);
		}
}
	mysqli_close($conn);
?>	

