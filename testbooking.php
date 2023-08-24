<?php ?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booking | GB-Foods</title>
  <link rel="stylesheet" href="./reset.css">
  <link rel="stylesheet" href="./globalStyles.css">
  <link rel="stylesheet" href="./components.css">
  <link rel="stylesheet" href="testbookingstyle.css">

  <!-- AOS -->
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>
  <!-- Navs-open -->
  <?php include 'headernew.php' ?>
  <!-- Navs-close -->

  <!-- Booking-open -->
  <section id="form" data-aos="fade-up">
    <div class="mainContain">
      <h3 class="form__title" style="text-align: center;">Book Table for dining</h3>
      <div class="form__wrapper">
        <div class="form-container">
          <?php
      if(isset($_GET['status']) && $_GET['status'] == 'success') {
          echo "<div class='success-message'>Booking successful!</div>";
      }
      ?>

          <form action="testbookit.php" name="bookings" method="POST">
            <div class="form__group">
              <label for="firstName">First Name</label>
              <input type="text" id="firstName" name="firstName" autocomplete="given-name">
            </div>
            <div class="form__group">
              <label for="lastName">Last Name</label>
              <input type="text" id="lastName" name="lastName" autocomplete="family-name">
            </div>
            <div class="form__group">
              <label for="email">Email</label>
              <input type="email" id="email" name="email" autocomplete="email">
            </div>
            <div class="form__group">
              <label for="guestNumber">Number</label>
              <input type="tel" id="guestNumber" name="_number" pattern="[0]{1}[3]{1}[0-9]{9}"
                title="Enter a valid Pakistani mobile number starting with 03" autocomplete="tel-national">
            </div>
            <div class="form__group">
              <label for="hallType">Number of Persons</label>
              <select name="persons" id="Persons" onchange="jsFunction(this.value);">
                <option value="20">20 Persons</option>
                <option value="60">60 Persons</option>
                <option value="100">100 Persons</option>
                <option value="100plus">More than 100 Persons</option>
              </select>
            </div>
            <div class="form__group">
              <label for="SuggSpot">Suggested Spot</label>
              <select name="suggSpot" id="Spot">
                <option value="mini">Mini Hall</option>
                <option value="medium">Medium Hall</option>
                <option value="large">Large Hall</option>
                <option value="open">RoofTop sitting</option>
              </select>
            </div>
            <div class="form__group">
              <label for="bookingType">Booking Type</label>
              <select name="bookType" id="BookingType">
                <option value="Family Dine">Family Dine</option>
                <option value="Birthday Party">Birthday Party</option>
                <option value="Seminar">Seminar</option>
                <option value="Conference">Conference</option>
                <option value="Others">Others in the Note</option>
              </select>
            </div>
            <div class="form__group">
              <label for="placement">Sittings</label>
              <select name="sittings" id="placement">
                <option value="outdoor">Open rooftop</option>
                <option value="indoor">Hall</option>
                <option value="rooftop">Hud</option>
              </select>
            </div>
            <div class="form__group">
              <label for="date">Date</label>
              <input type="date" id="date" name="_date" value="<?php echo date('Y-m-d'); ?>">
            </div>
            <div class="form__group">
              <label for="time">Time</label>
              <input type="time" id="time" name="_time" value="<?php echo date('H:i'); ?>">
            </div>

            <div class="form__group form__group__full">
              <label for="note">Note</label>
              <textarea name="note" id="note" rows="4"></textarea>
            </div>
            <button type="submit" onclick="return confirm('Are you sure to book the table?')"
              class="btn primary-btn">Book Table</button>
          </form>
        </div>

      </div>
    </div>
  </section>


  <?php include 'footer.php'?>

  <!-- AOS JS -->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script src="./main.js"></script>
  <script src="./table.js"></script>

</body>

</html>