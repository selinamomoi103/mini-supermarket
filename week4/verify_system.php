<?php
// 1. Connection Test
$conn = new mysqli("localhost", "root", "", "supermarket_db");

if ($conn->connect_error) {
    die("❌ Connection Failed: " . $conn->connect_error);
}
echo "✅ Database connected successfully!<br>";

// 2. Table & Column Structure Test
$check = $conn->query("SHOW COLUMNS FROM products LIKE 'stock'");
if ($check && $check->num_rows > 0) {
    echo "✅ 'stock' column found in database.<br>";
} else {
    echo "❌ 'stock' column NOT found! Run: ALTER TABLE products ADD COLUMN stock INT DEFAULT 0;<br>";
}

// 3. Read/Write Data Test
// Try to insert a dummy product to test write permissions
$test_name = "System Test Item";
$conn->query("INSERT INTO products (name, category, price, stock) VALUES ('$test_name', 'Testing', 0.00, 99)");
$last_id = $conn->insert_id;

// Check if we can read it back
$result = $conn->query("SELECT * FROM products WHERE id = $last_id");
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "✅ Read/Write test passed! Found: " . $row['name'] . " with " . $row['stock'] . " units in stock.<br>";
    
    // Clean up test data
    $conn->query("DELETE FROM products WHERE id = $last_id");
} else {
    echo "❌ Read/Write test failed.<br>";
}

$conn->close();
echo "<br><strong>System verification complete. If you saw all checks, your system is ready!</strong>";
?>