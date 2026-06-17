<?php
// 1. Logic: Fetch data
include('../week4/db_connect.php');
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Catalog</title>
    <style>
        .product-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; padding: 20px; }
        .product-card { border: 1px solid #ccc; padding: 15px; text-align: center; }
    </style>
</head>
<body>
    <h1>Our Mini Supermarket Catalog</h1>
    
    <div class="product-grid">
        <?php
        // 2. View: Display data using a loop
        if ($result && mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<div class='product-card'>";
                echo "<h3>" . htmlspecialchars($row['name']) . "</h3>";
                echo "<p>Price: KES " . $row['price'] . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No products found in the database.</p>";
        }
        ?>
    </div>
</body>
</html>