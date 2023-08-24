// Get all remove buttons
const removeButtons = document.querySelectorAll('.remove-btn');

// Loop through all remove buttons and add a click event listener to each
removeButtons.forEach(button => {
  button.addEventListener('click', (e) => {
    const menu_id = e.target.getAttribute('data-id');

    // Send an AJAX request to remove_item.php to remove the item from the cart
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'remove_item.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
      if (this.status === 200) {
        // Reload the page to display updated cart
        location.reload();
      }
    }
    xhr.send(`remove_item_id=${menu_id}`);
  });
});