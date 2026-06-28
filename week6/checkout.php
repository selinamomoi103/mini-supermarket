<?php
session_start();
include('../week4/db_connect.php');

$total = 0;
?>

<h1>Checkout Summary</h1>

<?php
if (empty($_SESSION['cart'])) {
    echo "<p>Your cart is empty. Nothing to checkout.</p>";
} else {
    echo "<ul>";
    foreach ($_SESSION['cart'] as $product_id) {
        $sql = "SELECT * FROM products WHERE id = '$product_id'";
        $result = mysqli_query($conn, $sql);
        $product = mysqli_fetch_assoc($result);
        
        if ($product) {
            echo "<li>" . $product['name'] . " - KES " . $product['price'] . "</li>";
            $total += $product['price']; // Add price to total
        }
    }
    echo "</ul>";
    echo "<h3>Total Amount: KES " . number_format($total, 2) . "</h3>";
    ?>

    <form action="checkout_process.php" method="post">
        <button type="submit">Confirm Purchase</button>
    </form>
    <?php
}
?>
<br>
<a href="cart.php">Back to Cart</a>