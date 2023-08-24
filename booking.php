<?php ?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booking | GB-Foods</title>
  <link rel="stylesheet" href="./reset.css">
  <link rel="stylesheet" href="./globalStyles.css">
  <link rel="stylesheet" href="./components.css">

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
      <h3 class="form__title">Book Table for dining</h3>
      <div class="form__wrapper">
        <form action="writeDatabase.php" name="bookings" method="POST">
          <div class="form__group">
            <label for="firstName">First Name</label>
            <input type="text" id="firstName" name="firstName">
          </div>
          <div class="form__group">
            <label for="lastName">Last Name</label>
            <input type="text" id="lastName" name="lastName">
          </div>
          <div class="form__group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email">
          </div>
          <div class="form__group">
            <label for="guestNumber">Number</label>
            <input type="text" id="guestNumber" name="_number">
          </div>
          <div class="form__group">
            <script type="text/javascript">
              function jsFunction(value) {
                let ddval = document.getElementById('Persons').value;
                if (ddval == '20') {
                  document.getElementById('Spot').value = 'mini';
                  document.getElementById('cart').value = '1200';
                } else if (ddval == '60') {
                  document.getElementById('Spot').value = 'medium';
                } else if (ddval == '100') {
                  document.getElementById('Spot').value = 'large';
                } else if (ddval == '100plus') {
                  document.getElementById('Spot').value = 'open';
                }
              }

              function cartFunt(value) {
                document.getElementById('cart').value = 1200;
              }
            </script>
            <label for="hallType">Persons</label>
            <select name="persons" id="Persons" onmousedown="this.value='';" onchange="jsFunction(this.value);">
              <option value="20">20 Persons</option>
              <option value="60">60 Persons</option>
              <option value="100">100 Persons</option>
              <option value="100plus">More than 100 Persons</option>
            </select>

          </div>

          <div class="form__group">
            <label for="Sugg Spot">Suggested Spot</label>
            <select name="suggSpot" id="Spot">
              <option value="mini">Mini Hall</option>
              <option value="medium">Medium Hall</option>
              <option value="large">Large Hall</option>
              <option value="open">RoofTop sitting</option>
            </select>
          </div>

          <div class="form__group">
            <label for="Booking Type">Booking Type</label>
            <select name="bookType" id="BookingType">
              <option value="Family Dine">Family Dine</option>
              <option value="Birthday Party">Birthday Party</option>
              <option value="Ceminar">Ceminar</option>
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
            <input type="date" id="date" name="_date">
          </div>
          <div class="form__group">
            <label for="time">time</label>
            <input type="time" id="time" name="_time">
          </div>
          <div class="form__group form__group__full">
            <label for="note">Note</label>
            <textarea name="note" id="note" rows="4"></textarea>
          </div>
          <button href="booking.html" onclick="return confirm('Are you sure to book table?')" type="submit" class="btn primary-btn">Book
            Table</button>
        </form>
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