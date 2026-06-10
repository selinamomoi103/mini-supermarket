<?php
$conn = new mysqli("localhost", "root", "", "supermarket_db");

$tables = ['products', 'users', 'customers', 'subscribers'];
echo "<h2>Database Audit</h2><ul>";

foreach ($tables as $table) {
    $result = $conn->query("SHOW TABLES LIKE '$table'");
    if ($result->num_rows > 0) {
        echo "<li style='color:green;'>✅ Table '$table' exists.</li>";
    } else {
        echo "<li style='color:red;'>❌ Table '$table' is missing!</li>";
    }
}
echo "</ul>";

// Verify Stock Column specifically
$res = $conn->query("SHOW COLUMNS FROM products LIKE 'stock'");
if ($res->num_rows > 0) {
    echo "<p style='color:green;'>✅ 'stock' column verified in 'products' table.</p>";
} else {
    echo "<p style='color:red;'>❌ 'stock' column missing in 'products' table.</p>";
}
?>