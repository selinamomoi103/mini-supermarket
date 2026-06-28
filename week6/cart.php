<?php
session_start();
include('../week4/db_connect.php'); // Ensure this path is correct
?>
<h1>Your Shopping Cart</h1>
<ul>
<?php
if (!empty($_SESSION['cart'])) {
    // Loop through the product IDs stored in the session
    foreach ($_SESSION['cart'] as $product_id) {
        $sql = "SELECT * FROM products WHERE id = '$product_id'";
        $result = mysqli_query($conn, $sql);
        $product = mysqli_fetch_assoc($result);
        if ($product) {
            echo "<li>" . $product['name'] . " - KES " . $product['price'] . "</li>";
        }
    }
} else {
    echo "Your cart is empty.";
}
?>
</ul>
<a href="catalog.php">Back to Catalog</a>