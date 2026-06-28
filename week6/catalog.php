<?php
session_start();
// Security guard
if (!isset($_SESSION['user_id'])) {
    header("Location: ../week7/login.php");
    exit();
}
// Include your database connection
include('../week4/db_connect.php');
// Fetch products
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
?><form action="add_to_cart.php" method="post">
    <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
    <button type="submit">Add to Cart</button>
</form>// ... (keep your existing session and db connection code) ...

// Fetch all products
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<body>
    <nav>
        <a href="../week6/catalog.php">Catalog</a> | 
        <a href="cart.php">View Cart</a> | 
        <a href="../week7/logout.php">Logout</a>
    </nav>

    <h1>Our Mini Supermarket Catalog</h1>
    <?php
    // Loop through each product row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div>";
        echo "<h3>" . $row['name'] . "</h3>";
        echo "<p>Price: KES " . $row['price'] . "</p>";
        ?>
        <form action="add_to_cart.php" method="post">
            <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
            <button type="submit">Add to Cart</button>
        </form>
        <?php
        echo "</div><hr>";
    }
    ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>...</head>
<body>
    <nav>
        <a href="../week6/catalog.php">Catalog</a> | 
        <a href="../week7/logout.php">Logout</a>
    </nav>
    ...
</body>
</html>