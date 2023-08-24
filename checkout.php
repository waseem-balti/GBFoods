<?php include 'header.php';?>
<?php include 'headernew.php';?>

<head>
  <link rel="stylesheet" href="checkoutstyles.css">
</head>

<form class="checkout-form" name="checkout-form" method="post" action="checkout.php">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="address">Address:</label>
    <input type="text" id="address" name="address" required>

    <label for="city">City:</label>
    <input type="text" name="city" id="city" list="city-list" required>
    <datalist id="city-list">
      <option value="Karachi">
      <option value="Lahore">
      <option value="Islamabad">
      <option value="Rawalpindi">
      <option value="Faisalabad">
      <option value="Multan">
    </datalist>

    <label for="state">Province:</label>
    <select id="state" name="state" required>
      <option value="Karachi">Gilgit-Baltistan</option>
      <option value="Lahore">Punjab</option>
      <option value="Faisalabad">Sindh</option>
      <option value="Rawalpindi">KPK</option>
      <option value="Rawalpindi">Balochistan</option>
    </select>

    </div>
    <button type="submit" class="btn btn-primary">Place Order</button>
    </div>
  </form>


<script>

  function validateForm() {
    var name = document.forms["checkout-form"]["name"].value;
    var email = document.forms["checkout-form"]["email"].value;
    var phone = document.forms["checkout-form"]["phone"].value;
    var message = document.forms["checkout-form"]["message"].value;

    // Validate email
    var emailRegex = /\S+@\S+\.\S+/;
    if (!emailRegex.test(email)) {
      alert("Please enter a valid email address.");
      return false;
    }

    // Check if any field is empty
    if (name == "" || email == "" || phone == "" || message == "") {
      alert("Please fill out all fields.");
      return false;
    }
  }
</script>


<?php include 'footer.php';?>
<?php include 'script.php';?>