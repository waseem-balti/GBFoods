// Get all quantity input elements
const quantityInputs = document.querySelectorAll('.quantity input[type="number"]');

// Add event listener to each input element
quantityInputs.forEach(input => {
  input.addEventListener('change', () => {
    // Get the parent cart item element
    const cartItem = input.closest('.cart-item');

    // Get the item price and quantity
    const itemPrice = parseFloat(cartItem.querySelector('p').textContent.replace(/[^\d.-]/g, ''));
    const itemQuantity = parseInt(input.value);

    // Calculate and display item total price
    const itemTotal = itemPrice * itemQuantity;
    cartItem.querySelector('p:last-of-type').textContent = `Item Total: PKR${itemTotal}`;

    // Update total price
    const itemTotals = Array.from(document.querySelectorAll('.cart-item p:last-of-type'))
                           .map(p => parseFloat(p.textContent.replace(/[^\d.-]/g, '')));
    const totalPrice = itemTotals.reduce((total, itemTotal) => total + itemTotal, 0);
    document.querySelector('.cart-total h3').textContent = `Total Price: PKR${totalPrice}`;
  });
});

