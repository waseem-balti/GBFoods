// Get all remove buttons
var removeBtns = document.querySelectorAll('.remove-btn');

// Add event listener to each remove button
removeBtns.forEach(function(btn) {
  btn.addEventListener('click', function() {
    // Get the menu ID from the data-id attribute
    var menuId = this.getAttribute('data-id');

    // Send an AJAX request to remove_item.php
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'remove_item.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        // Reload the page to update the cart
        location.reload();
      }
    };
    xhr.send('remove_item_id=' + menuId);
  });
});








const mysql = require('mysql2/promise');

const connection = await mysql.createConnection({
  host: 'localhost',
  user: 'user',
  password: 'password',
  database: 'mydatabase'
});
// Get the item price and quantity
const itemPrice = parseFloat(cartItem.querySelector('p').textContent.replace(/[^\d.-]/g, ''));
const itemQuantity = parseInt(input.value);

// Calculate and display item total price
const itemTotal = itemPrice * itemQuantity;
cartItem.querySelector('p:last-of-type').textContent = `Item Total: PKR${itemTotal}`;

// Insert a new record into the database
const insertQuery = 'INSERT INTO cart_items (item_price, item_quantity, item_total) VALUES (?, ?, ?)';
const insertParams = [itemPrice, itemQuantity, itemTotal];
await connection.execute(insertQuery, insertParams);
try {
  // Insert a new record into the database
  const insertQuery = 'INSERT INTO cart_items (item_price, item_quantity, item_total) VALUES (?, ?, ?)';
  const insertParams = [itemPrice, itemQuantity, itemTotal];
  await connection.execute(insertQuery, insertParams);
} catch (err) {
  console.error('Error inserting record into database:', err);
  // Display an error message to the user
  alert('There was an error adding the item to your cart. Please try again later.');
}
// Update the total price in the database
const updateQuery = 'UPDATE cart_totals SET total_price = ?';
const updateParams = [totalPrice];
await connection.execute(updateQuery, updateParams);

// Update the total price element in the DOM
document.querySelector('.cart-total h3').textContent = `Total Price: PKR${totalPrice}`;
