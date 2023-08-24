<?php include 'header.php';?>
<?php include 'headernew.php';?>

<?php
// connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reservation";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// select data from the menu table
$sql = "SELECT * FROM menu ORDER BY menu_desc";
$result = mysqli_query($conn, $sql);


require_once 'cartcount.php';

// call the get_cart_count() function to get the cart count
$cart_count = get_cart_count();


// check if there are any records in the menu table
if (mysqli_num_rows($result) > 0) {
?>
<head>
    <link rel="stylesheet" href="testnewmenustyle.css">
</head>
<body>
    <h1 style="padding:0 50%; font-size: 4rem;">Menu</h1>
    <?php 
    // initialize variables
    $current_category = "";
    $first_item = true;
    $next_item = mysqli_fetch_assoc($result);
    ?>
    <?php while ($item = $next_item) { ?>
        <?php 
        // get the next item in the result set
        $next_item = mysqli_fetch_assoc($result);
        // if this is the last item in the result set, set next_category to an empty string
        $next_category = ($next_item !== null) ? $next_item['menu_desc'] : "";
        // if this is the first item, or if the category has changed, print the category heading
        if ($first_item || $item['menu_desc'] != $current_category) { 
            $current_category = $item['menu_desc'];
            ?>
            <h2 class="category"><?php echo $current_category; ?></h2>
            <div class="menu-container">
        <?php } ?>
            <div class="menu-item">
                <img src="images/<?php echo $item['menu_pic']; ?>" alt="<?php echo $item['menu_name']; ?>">
                <div class="menu-item-details">
                    <div class="menu-item-title"><?php echo $item['menu_name']; ?></div>
                    <div class="menu-item-description"><?php echo $item['menu_desc']; ?></div>
                    <div class="menu-item-price">$<?php echo $item['menu_price']; ?></div>
                    <div class="menu-item-addtocart">
                        <form action="addtocart.php" method="post">
                            <input type="hidden" name="menu_id" value="<?php echo $item['menu_id']; ?>">
                            <input type="hidden" name="menu_name" value="<?php echo $item['menu_name']; ?>">
                            <input type="hidden" name="menu_price" value="<?php echo $item['menu_price']; ?>">
                            <div class="add-to-cart-qty">
                                <input type="number" class="add-to-cart-qty-input" name="qty" min="1" max="10" value="1">
                            </div>
                            <button type="submit" class="add-to-cart-submit-btn">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php 
        // set first_item flag to false after the first iteration
        $first_item = false;
        // if this is the last item in the category, close the container div
        if ($item['menu_desc'] != $next_category) { 
            ?>
            </div>
        <?php } ?>
    <?php } ?>
  <?php } ?>
  </body>