<?php include 'header.php';?>
<?php include 'headernew.php';?>

<!DOCTYPE html>
<html lang="en">

<head>

  <!-- AOS -->
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contacts | GB-Foods</title>
  <link rel="stylesheet" href="./contactstyle.css" <link rel="stylesheet"
    href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body>

  <form method="post">
    <label for="name">Full Name</label>
    <input type="text" placeholder="Enter your name" name="name" required>

    <label for="email">Email Address</label>
    <input type="email" placeholder="Enter your email address" name="email" required>

    <label for="subject">Subject</label>
    <input type="text" placeholder="Enter the subject" name="subject" required>

    <label for="message">Message</label>
    <textarea placeholder="Enter your message" name="message" required></textarea>

    <button type="submit" name="submit">Send</button>
  </form>

  <!-- Store-Info-open -->
  <section id="CenterIfo" data-aos="fade-up">
    <div class="mainContain">
      <div class="CenterIfo__wrapper">
        <div class="CenterIfo__item">
          <div class="CenterIfo__icon">
            <img src="./images/clock.svg" alt="">
          </div>
          <h3 class="CenterIfo__title">
            4pm-12am
          </h3>
          <p class="CenterIfo__text">
            Opening Hours
          </p>
        </div>

        <div class="CenterIfo__item">
          <div class="CenterIfo__icon">
            <img src="./images/address.svg" alt="">
          </div>
          <h3 class="CenterIfo__title">
            Khayaban-e-Ittihad, DHA, Karachi
          </h3>
          <p class="CenterIfo__text">
            Address
          </p>
        </div>

        <div class="CenterIfo__item">
          <div class="CenterIfo__icon">
            <img src="./images/phone.svg" alt="">
          </div>
          <h3 class="CenterIfo__title">
            +92123456789
          </h3>
          <p class="CenterIfo__text">
            Contact us
          </p>
        </div>
      </div>
    </div>
  </section>
  <!-- Store-Info-close -->

</body>

</html>


<?php
if(isset($_POST['submit'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Validate form data
    if(empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "<p>Please fill in all fields.</p>";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p>Invalid email format.</p>";
    } else {
        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "reservation";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if(!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Insert data into database
        $sql = "INSERT INTO feedbacks (name, email, subject, message)
        VALUES ('$name', '$email', '$subject', '$message')";

        if(mysqli_query($conn, $sql)) {
            echo "<p> GB Foods doesn't reserve any right to use your data for any sort of comercial purposes</p>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
}
?>



<!-- AOS JS -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script src="./main.js"></script>





<?php include 'footer.php';?>
<?php include 'script.php';?>