<?php //include 'login.php';?>

<?php
session_start();

// include the cartcount.php file
include 'cartcount.php';

// call the get_cart_count() function to get the count of items in the cart
$cart_count = get_cart_count();
?>

<head>
  <link rel="stylesheet" href="./reset.css">
  <link rel="stylesheet" href="./globalStyles.css">
  <link rel="stylesheet" href="./components.css">
  <link rel="stylesheet" href="menu.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">

</head>

<div class="nav">
  <div class="mainContain">
    <div class="NaviWrapper">
      <a href="./index.html" class="logo">
        <img src="./images/logo.png" alt="Logo" class="logo__home">
      </a>
      <nav>
        <div class="NaviCons">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="3" y1="12" x2="21" y2="12" />
            <line x1="3" y1="6" x2="21" y2="6" />
            <line x1="3" y1="18" x2="21" y2="18" />
          </svg>
        </div>
        <div class="NaviBG__Oly active"></div>
        <ul class="NaviList">
          <div class="NaviGo">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <line x1="18" y1="6" x2="6" y2="18" />
              <line x1="6" y1="6" x2="18" y2="18" />
            </svg>
          </div>
          <div class="NaviLsWrap">
            <li><a class="NaviLinks" href="./indexnew.php">Home</a></li>
            <li><a class="NaviLinks" href="./newmenu.php">Menu</a></li>
            <li><a class="NaviLinks" href="./about.php">About</a></li>
            <li><a class="NaviLinks" href="./contact.php">Contact</a></li>
            <li><a href="./reservation.php" class="btn">Reserve Table</a></li>
            <li>
              <?php if(isset($_SESSION['user_id'])) {
                // Show profile button with dropdown
                ?>
              <a class="NaviLinks" href="./cart.php">
                <i class="fas fa-shopping-cart"></i>
                <span class="cart-count"><?php echo $cart_count; ?></span>
              </a>
            </li>
                <?php } ?>
            <?php 
              // Check if the user is already logged in
              if(isset($_SESSION['user_id'])) {
                // Show profile button with dropdown
                ?>
            <li class="nav-item">
              <div class="dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <img src="./images/Profiles/profile.png" alt="Profile Picture" class="rounded-circle"
                    style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%; margin-right: 10px;">
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style=" padding: 10px;">
                  <span style="font-size: 18px;"><?php echo $_SESSION['full_name']; ?></span><br>
                  <h3>
                    <a class="dropdown-item" href="profile.php"><i class="fas fa-user-circle"
                        style="margin-right: 10px;"></i>Profile</a><br>
                    <a class="dropdown-item" href="logoutnew.php"><i class="fas fa-sign-out-alt"
                        style="margin-right: 10px;"></i>Logout</a>
                  </h3>
                </div>
              </div>
            </li>


            <style>
              .dropdown:hover .dropdown-menu {
                display: block;
              }

              .dropdown-menu a i {
                margin: 5px;
                padding: 5px;
                font-size: 3rem;
              }
            </style>


            <?php     
              } else {
                // Show login button
                echo '<a class="btn btn-primary" href="loginform.php">Login</a>';
              }
            ?>
          </div>
        </ul>
      </nav>
    </div>
  </div>
</div>

<style>

/* Style the form container */
.mainContain {
  max-width: 800px;
  margin: auto;
  padding: 20px;
  background-color: #f7f7f7;
  border-radius: 5px;
}

/* Style the form title */
.form__title {
  font-size: 24px;
  margin-bottom: 20px;
}

/* Style the form groups */
.form__group {
  display: flex;
  flex-direction: column;
  margin-bottom: 20px;
}

/* Style the form labels */
.form__group label {
  font-weight: bold;
  margin-bottom: 5px;
}

/* Style the form inputs */
.form__group input,
.form__group select,
.form__group textarea {
  padding: 10px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid #ccc;
  background-color: #fff;
  box-shadow: inset 0px 1px 1px rgba(0,0,0,0.1);
  transition: border-color 0.2s ease-in-out;
}

/* Style the form inputs on focus */
.form__group input:focus,
.form__group select:focus,
.form__group textarea:focus {
  outline: none;
  border-color: #5b9bd5;
}

/* Style the form buttons */


.btn:hover {
  background-color: #467fcf;
}
</style>