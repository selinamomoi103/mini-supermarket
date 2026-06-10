<?php
// 1. Include the active database connection
include 'db_connect.php';

// 2. Fetch products from your supermarket database
$sql = "SELECT id, name, category, price, stock FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FreshMarket Digital Catalog - Week 5</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; margin: 30px; background-color: #f4f6f9; color: #333; }
        h1 { color: #2c3e50; }
        .product-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 20px; margin-top: 20px; }
        .product-card { border: 1px solid #e2e8f0; padding: 20px; border-radius: 10px; background: #fff; text-align: center; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        .category { color: #7f8c8d; font-size: 0.85em; text-transform: uppercase; letter-spacing: 0.5px; }
        .price { color: #27ae60; font-weight: bold; font-size: 1.25em; margin: 10px 0; }
        .stock { color: #e67e22; font-size: 0.9em; font-weight: 500; }
    </style>
</head>
<body>

    <h1>FreshMarket Mini-Supermarket</h1>
    <p>Dynamic Digital Catalog (Database-Driven Backend)</p>
    <hr style="border: 0; height: 1px; background: #ddd;">

    <div class="product-grid">
        <?php
        if ($result && $result->num_rows > 0) {
            // Loop through each product row fetched from phpMyAdmin
            while($row = $result->fetch_assoc()) {
                echo "<div class='product-card'>";
                echo "<span class='category'>" . htmlspecialchars($row["category"]) . "</span>";
                echo "<h3>" . htmlspecialchars($row["name"]) . "</h3>";
                echo "<p class='price'>$" . number_format($row["price"], 2) . "</p>";
                echo "<p class='stock'>Stock Available: " . htmlspecialchars($row["stock"]) . " items</p>";
                echo "</div>";
            }
        } else {
            echo "<p style='grid-column: 1/-1; text-align: center;'>No products found in the database catalog.</p>";
        }
        // Close database connection cleanly
        $conn->close();
        ?>
    </div>

</body>
</html>