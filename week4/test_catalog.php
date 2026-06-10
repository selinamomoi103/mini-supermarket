<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "supermarket_db");

// Verify connection
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

// Fetch products
$result = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inventory Test</title>
    <style>
        .product-card { border: 1px solid #333; padding: 15px; margin: 10px; width: 200px; display: inline-block; vertical-align: top; }
        .instock { color: green; font-weight: bold; }
        .outofstock { color: red; font-weight: bold; }
    </style>
</head>
<body>
    <h1>Catalog Inventory Test</h1>
    <?php
    while($item = $result->fetch_assoc()) {
        // Safe check for the stock column
        $stock = isset($item['stock']) ? $item['stock'] : 0;
        ?>
        <div class="product-card">
            <h3><?php echo htmlspecialchars($item['name']); ?></h3>
            <?php if ($stock > 0): ?>
                <p class="instock">📦 In Stock: <?php echo $stock; ?> units</p>
            <?php else: ?>
                <p class="outofstock">❌ Temporarily Sold Out</p>
            <?php endif; ?>
        </div>
    <?php } ?>
</body>
</html>