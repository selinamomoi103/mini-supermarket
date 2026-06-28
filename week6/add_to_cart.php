<?php
session_start();

// Initialize the cart as an array if it doesn't exist yet
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add the product_id to the cart array
if (isset($_POST['product_id'])) {
    $_SESSION['cart'][] = $_POST['product_id'];
}

// Return the user to the catalog
header("Location: catalog.php");
exit();
?>