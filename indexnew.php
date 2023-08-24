<?php include 'header.php';?>
<?php include 'headernew.php';?>


<?php
// Start session
//session_start()


// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reservation";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// If user has submitted the login form
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Retrieve user information from database
  $query = "SELECT * FROM userz WHERE username='$username'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);

    // Verify password
    if (password_verify($password, $row['password'])) {
      // Set session variables
      $_SESSION['user_id'] = $row['user_id'];
      $_SESSION['full_name'] = $row['full_name'];
      $_SESSION['username'] = $row['username'];
      $_SESSION['status'] = $row['status'];

      // Redirect to home page
      header('Location: indexnew.php');
      exit;
    } else {
      $error_msg = "Invalid username or password";
    }
  } else {
    $error_msg = "Invalid username or password";
  }
}

// If user has logged out
if (isset($_GET['logout'])) {
  // Unset session variables
  session_unset();
  // Destroy session
  session_destroy();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home | GB-Foods</title>
  <link rel="stylesheet" href="./reset.css">
  <link rel="stylesheet" href="./globalStyles.css">
  <link rel="stylesheet" href="./components.css">
  <link rel="stylesheet" href="./home.css">

  <!-- AOS -->
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body>
  <!-- MainHeroSec-Open -->
  <section id="MainHeroSec">
    <div class="mainContain">
      <div class="MainHeroSec__wrapper">
        <div class="MainHeroSec__left" data-aos="fade-left">
          <div class="MainHeroSec__left__wrapper">
            <h1 class="MainHeroSec__heading">Taste of Gilgit-Baltistan Uplifted</h1>
            <p class="MainHeroSec__info">
              For the first time in Karachi, we defined the traditionnal food lover to another level by
              defining a single place for all traditional foods of Gilgit-Baltistan..
              OTG, Enjoy your meal........
            </p>
            <div class="button__wrapper">
              <a href="#" class="btn primary-btn">Show Menu</a>
              <a href="#" class="btn">Book Table</a>
            </div>
          </div>
        </div>
        <div class="MainHeroSec__right" data-aos="fade-right">
          <div class="MainHeroSec__imgWrapper">
            <img src="./images/heroImg.png" alt="" srcset="">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- MainHeroSec-Close -->

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



  <!-- Top-Dishes Open -->
  <section id="IconicDishesGrid" data-aos="fade-up">
    <div class="mainContain">
      <h2 class="IconicDishesGrid__title">
        Iconic dishes
      </h2>
      <div class="IconicDishesGrid__wrapper">
        <div class="IconicDishesGrid__item">
          <div class="IconicDishesGrid__item__img">
            <img src="./images/prapu2.png" alt="Food Images" srcset="">
          </div>
          <div class="IconicDishesGrid__item__info">
            <h3 class="IconicDishesGrid__item__title">
              Baltistani Prapu
            </h3>
            <h3 class="IconicDishesGrid__item__price">
              Rs. 400 + (5% SC)
            </h3>
            <div class="IconicDishesGrid__item__stars">
              <img src="./images/4star.png" alt="" srcset="">
            </div>
          </div>
        </div>
        <div class="IconicDishesGrid__item">
          <div class="IconicDishesGrid__item__img">
            <img src="./images/Combo.png" alt="Food Images" srcset="">
          </div>
          <div class="IconicDishesGrid__item__info">
            <h3 class="IconicDishesGrid__item__title">
              GB Traditional Combo
            </h3>
            <h3 class="IconicDishesGrid__item__price">
              Rs. 1800 + (5% SC)
            </h3>
            <div class="IconicDishesGrid__item__stars">
              <img src="./images/4star.png" alt="" srcset="">
            </div>
          </div>
        </div>
        <div class="IconicDishesGrid__item">
          <div class="IconicDishesGrid__item__img">
            <img src="./images/azoq.png" alt="Food Images" srcset="">
          </div>
          <div class="IconicDishesGrid__item__info">
            <h3 class="IconicDishesGrid__item__title">
              Baltistani Azoq
            </h3>
            <h3 class="IconicDishesGrid__item__price">
              Rs. 200 + (5% SC)
            </h3>
            <div class="IconicDishesGrid__item__stars">
              <img src="./images/4star.png" alt="" srcset="">
            </div>
          </div>
        </div>
        <div class="IconicDishesGrid__item">
          <div class="IconicDishesGrid__item__img">
            <img src="./images/Branges.png" alt="Food Images" srcset="">
          </div>
          <div class="IconicDishesGrid__item__info">
            <h3 class="IconicDishesGrid__item__title">
              Branges (Balti Namkeen Cake
            </h3>
            <h3 class="IconicDishesGrid__item__price">
              Rs. 350 + (5% SC)
            </h3>
            <div class="IconicDishesGrid__item__stars">
              <img src="./images/4star.png" alt="" srcset="">
            </div>
          </div>
        </div>
        <div class="IconicDishesGrid__item">
          <div class="IconicDishesGrid__item__img">
            <img src="./images/Mamtu.png" alt="Food Images" srcset="">
          </div>
          <div class="IconicDishesGrid__item__info">
            <h3 class="IconicDishesGrid__item__title">
              Mamtu or Dumplings
            </h3>
            <h3 class="IconicDishesGrid__item__price">
              Rs. 200 + (5% SC)
            </h3>
            <div class="IconicDishesGrid__item__stars">
              <img src="./images/3star.png" alt="" srcset="">
            </div>
          </div>
        </div>
        <div class="IconicDishesGrid__item">
          <div class="IconicDishesGrid__item__img">
            <img src="./images/Rdong balay.png" alt="Food Images" srcset="">
          </div>
          <div class="IconicDishesGrid__item__info">
            <h3 class="IconicDishesGrid__item__title">
              Rdung Bhalay
            </h3>
            <h3 class="IconicDishesGrid__item__price">
              Rs. 300 + (5% SC)
            </h3>
            <div class="IconicDishesGrid__item__stars">
              <img src="./images/4_5star.png" alt="" srcset="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Top-Dishes Close -->

  <!-- ValueAdd-open -->
  <section id="ValueAdd" data-aos="fade-up">
    <div class="mainContain">
      <div class="ValueAdd__wrapper">
        <div class="ValueAdd__images">
          <div class="ValueAdd__img1">
            <img src="./images/trout.jpg" alt="Food img">
          </div>
          <div class="ValueAdd__img2">
            <img src="./images/khurba.jpg" alt="Food img">
          </div>
          <div class="ValueAdd__img3">
            <img src="./images/Chapshoro.jpg" alt="Food img">
          </div>
        </div>
        <div class="ValueAdd__info">
          <h3 class="ValueAdd__text">20% OFF</h3>
          <h3 class="ValueAdd__title">ValueAdd Dishes Here</h3>
          <h3 class="ValueAdd__price">
            <span class="ValueAdd__oldPrice">RS.450</span>
            <span class="ValueAdd__newPrice">RS.350</span>
          </h3>
          <div class="ValueAdd__stars">
            <img src="./images/3star.png" alt="3 stars">
          </div>
          <a class="btn primary-btn" href="./booking.html">Book Table</a>
        </div>
      </div>
    </div>
  </section>
  <!-- ValueAdd-close -->

  <!-- Event media-open -->
  <section id="EventMemos" data-aos="fade-up">
    <div class="mainContain">
      <div class="EventMemos__wrapper">
        <div class="EventMemos__1">
          <img src="./images/event.png" alt="events">
          <a href="#" class="EventMemos__1__playButton">
            <img src="./images/playIcon.svg" alt="play button">
          </a>
        </div>
        <div class="eventMedia__2">
          <img src="./images/event2.jpg" alt="events">
        </div>
      </div>
    </div>
  </section>
  <!-- Event media-close -->

  <!-- event info-open -->
  <section id="EventsDetails" data-aos="fade-up">
    <div class="mainContain">
      <div class="EventsDetails__wrapper">
        <div class="EventsDetails__left">
          <div class="EventsDetails__item">
            <div class="EventsDetails__item__img">
              <img src="./images/foodevent.jpg" alt="corporate events">
            </div>
            <div class="EventsDetails__item__info">
              <h2 class="EventsDetails__item__title">Culture Promotion Event</h2>
              <p class="EventsDetails__item__text">
                GB-Foods shares a free local dishes for the villages randomnly.
              </p>
            </div>
          </div>
          <div class="EventsDetails__item">
            <div class="EventsDetails__item__img">
              <img src="./images/foodevent1.jpg" alt="wedding events">
            </div>
            <div class="EventsDetails__item__info">
              <h2 class="EventsDetails__item__title">Free Iftari</h2>
              <p class="EventsDetails__item__text">
                GB-Foods opening a free Iftar distribution at some random villages.
              </p>
            </div>
          </div>
        </div>
        <div class="EventsDetails__right">
          <h2 class="EventsDetails__title">Book For Events</h2>
          <p class="EventsDetails__text">We warmly welcome to book us for the cultural events as well as the GB
            traditional
            food Events.</p>
          <a href="./contact.html" class="btn primary-btn">Contact Now</a>
        </div>
      </div>
    </div>
  </section>
  <!-- event info-close -->

  <!-- Why Us-open -->
  <section id="ChooseUs">
    <div class="mainContain">
      <div class="ChooseUs__wrapper">
        <div class="ChooseUs__left" data-aos="fade-right">
          <h2 class="ChooseUs__title">
            Why Choose Our Food
          </h2>
          <p class="ChooseUs__text">
            People are always looking for a perfect place to dine some traditional foods and GB-Foods is a place where
            you can find a quality foods along with quality sevices with value for money dine.
          </p>
        </div>
        <div class="ChooseUs__right" data-aos="fade-left">
          <div class="ChooseUs__items__wrapper">
            <div class="ChooseUs__item">
              <div class="ChooseUs__item__icon">
                <img src="./images/whyUs-icon1.svg" alt="quality Food">
              </div>
              <p class="ChooseUs__item__text">Traditional foods</p>
            </div>
            <div class="ChooseUs__item">
              <div class="ChooseUs__item__icon">
                <img src="./images/whyUs-icon2.svg" alt="Classical taste">
              </div>
              <p class="ChooseUs__item__text">Natural Taste</p>
            </div>
            <div class="ChooseUs__item">
              <div class="ChooseUs__item__icon">
                <img src="./images/whyUs-icon3.svg" alt="Skilled chef">
              </div>
              <p class="ChooseUs__item__text">Ancient and tradiotnal recipe</p>
            </div>
            <div class="ChooseUs__item">
              <div class="ChooseUs__item__icon">
                <img src="./images/whyUs-icon4.svg" alt="Best service">
              </div>
              <p class="ChooseUs__item__text">Best service</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Why us-close -->

  <!-- Testimonila-open -->
  <section id="CustomerLikes">
    <div class="mainContain">
      <div class="CustomerLikes__wrapper" data-aos="fade-up">
        <h2 class="CustomerLikes__title">What Our Customers Say</h2>
        <div class="CustomerLikes__items__wrapper">
          <div class="CustomerLikes__item">
            <div class="CustomerLikes__item__img">
              <img src="./images/baltiboy.jfif" alt="Person1">
            </div>
            <div class="CustomerLikes__item__info">
              <h3 class="CustomerLikes__item__name">Person1</h3>
              <div class="CustomerLikes__item__stars">
                <img src="./images/4star.png" alt="3 star">
              </div>
              <p class="CustomerLikes__item__text">
                “I warmly welcome guests as GB-Foods welcomed me. They have a greatest taste of culture and amazing
                staff”
              </p>
            </div>
          </div>
          <div class="CustomerLikes__item">
            <div class="CustomerLikes__item__img">
              <img src="./images/gbgirl.jpg" alt="Person2">
            </div>
            <div class="CustomerLikes__item__info">
              <h3 class="CustomerLikes__item__name">Person2</h3>
              <div class="CustomerLikes__item__stars">
                <img src="./images/4_5star.png" alt="4.5 star">
              </div>
              <p class="CustomerLikes__item__text">
                "This is the only place where you can enjoy traditional foods.
                They are really amazing"
              </p>
            </div>
          </div>
          <div class="CustomerLikes__item">
            <div class="CustomerLikes__item__img">
              <img src="./images/baltiboy.jfif" alt="Person3">
            </div>
            <div class="CustomerLikes__item__info">
              <h3 class="CustomerLikes__item__name">Person3</h3>
              <div class="CustomerLikes__item__stars">
                <img src="./images/3star.png" alt="3 star">
              </div>
              <p class="CustomerLikes__item__text">
                “If you are looking for some natural taste, visit this place atleast once in life."
              </p>
            </div>
          </div>
          <div class="CustomerLikes__item">
            <div class="CustomerLikes__item__img">
              <img src="./images/gbgirl.jpg" alt="Person4">
            </div>
            <div class="CustomerLikes__item__info">
              <h3 class="CustomerLikes__item__name">Person4</h3>
              <div class="CustomerLikes__item__stars">
                <img src="./images/3star.png" alt=" star">
              </div>
              <p class="CustomerLikes__item__text">
                “I really appreciate the efforts they did for me to provide quality foods and service.“
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- CustomerLikes-close -->

  <!-- ConnectUs-open -->
  <section id="ConnectUs" data-aos="fade-up">
    <div class="mainContain">
      <div class="ConnectUs__wrapper">
        <div class="ConnectUs__info">
          <h3 class="ConnectUs__title">Join our ConnectUs</h3>
          <p class="ConnectUs__text">
            Stay connected with GB-Foods by joining our ConnectUs!
            Stay tuned!
          </p>
        </div>
        <div class="ConnectUs__form">
          <form action="">
            <label for="email">
              <input type="email" placeholder="Your Email Address">
            </label>
            <button type="submit">Join</button>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- ConnectUs-close -->

  <!-- Footer-Open -->
<?php include 'footer.php';?> 	
<?php include 'script.php';?>
  <!-- Footer-Close -->


  <!-- AOS(Animation on scroll) JS -->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script src="./main.js"></script>

</body>

</html>