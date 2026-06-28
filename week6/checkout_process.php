<?php
session_start();

// Clear the cart
unset($_SESSION['cart']);

// Display confirmation
echo "<h1>Thank you for your order!</h1>";
echo "<p>Your purchase was successful.</p>";
echo "<a href='catalog.php'>Return to Catalog</a>";
?>