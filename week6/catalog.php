<?php
// Include your database connection
include('../week4/db_connect.php'); 

// Fetch all products from the database
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Catalog</title>
    <style>
        .product-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
        .product-card { border: 1px solid #ccc; padding: 15px; border-radius: 8px; }
    </style>
</head>
<body>

    <h1>Our Mini Supermarket Catalog</h1>

    <div class="product-grid">
        <?php
        // Check if products exist in the database and display them
        if ($result && mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<div class='product-card'>";
                echo "<h3>" . htmlspecialchars($row['name']) . "</h3>";
                echo "<p>Price: KES " . htmlspecialchars($row['price']) . "</p>";
                
                // CRUD Action Links: These send the unique product ID to your handler files
                echo "<a href='edit_product.php?id=" . $row['id'] . "'>Edit</a> | ";
                echo "<a href='delete_product.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this product?\");'>Delete</a>";
                
                echo "</div>";
            }
        } else {
            echo "<p>No products found in the database.</p>";
        }
        ?>
    </div>

</body>
</html>