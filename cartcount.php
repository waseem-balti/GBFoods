<?php

// function to get the count of items in the cart
function get_cart_count() {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "reservation";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    // query to get the count of items in the cart
    $sql = "SELECT COUNT(*) AS count FROM cart";
  
    // execute the query and get the result
    $result = mysqli_query($conn, $sql);
  
    // check if query was successful
    if (mysqli_num_rows($result) > 0) {
      // fetch the result row as an associative array
      $row = mysqli_fetch_assoc($result);
  
      // return the cart count
      return $row['count'];
    } else {
      // return 0 if cart is empty
      return 0;
    }
  
  }

?>