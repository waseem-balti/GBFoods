<?php
// Establishing connection to the MySQL server
$host = "localhost";
$user = "root";
$password = "";
$database = "reservation";

$conn = mysqli_connect($host, $user, $password, $database);

// Creating the bookings table if it does not exist
$tableName = "bookings";

$createTableSql = "CREATE TABLE IF NOT EXISTS $tableName (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    number VARCHAR(20) NOT NULL,
    persons VARCHAR(20) NOT NULL,
    sugg_spot VARCHAR(20) NOT NULL,
    book_type VARCHAR(20) NOT NULL,
    sittings VARCHAR(20) NOT NULL,
    date DATE NOT NULL,
    time TIME NOT NULL,
    note TEXT
)";

mysqli_query($conn, $createTableSql);

// Inserting the form data into the bookings table
if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email']) && isset($_POST['_number']) && isset($_POST['persons']) && isset($_POST['suggSpot']) && isset($_POST['bookType']) && isset($_POST['sittings']) && isset($_POST['_date']) && isset($_POST['_time'])) {

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $number = $_POST['_number'];
    $persons = $_POST['persons'];
    $suggSpot = $_POST['suggSpot'];
    $bookType = $_POST['bookType'];
    $sittings = $_POST['sittings'];
    $date = $_POST['_date'];
    $time = $_POST['_time'];
    $note = $_POST['note'];

    $insertSql = "INSERT INTO $tableName (first_name, last_name, email, number, persons, sugg_spot, book_type, sittings, date, time, note)
    VALUES ('$firstName', '$lastName', '$email', '$number', '$persons', '$suggSpot', '$bookType', '$sittings', '$date', '$time', '$note')";

    if(mysqli_query($conn, $insertSql)){
        // Redirecting back to the same page
        echo '<script>alert("Booking successful!")</script>';
        echo '<script>setTimeout(function(){window.location.href = "testbooking.php";}, 300);</script>';
        exit;
    } else{
        echo "Error: " . $insertSql . "<br>" . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>