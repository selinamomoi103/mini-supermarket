<?php
// Always ensure you have your connection object ready
$result = $conn->query("SELECT * FROM products");

while($item = $result->fetch_assoc()) {
    // 1. Safely retrieve stock value
    $stock = isset($item['stock']) ? $item['stock'] : 0;
    $is_out = ($stock <= 0);
?>
    <div class="product-card">
        <h3><?php echo htmlspecialchars($item['name']); ?></h3>
        <p>Price: $<?php echo number_format($item['price'], 2); ?></p>
        
        <?php if ($is_out): ?>
            <p class="outofstock">❌ Temporarily Sold Out</p>
        <?php else: ?>
            <p class="instock">📦 In Stock: <?php echo $stock; ?> units</p>
        <?php endif; ?>
    </div>
<?php 
} // This brace closes the while loop properly
?>