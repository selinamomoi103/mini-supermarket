<?php
// Include database connection
include 'db_connect.php';

$message = "";

// --- 1. HANDLE CREATE (ADD PRODUCT) ---
if (isset($_POST['add_product'])) {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    $insert_sql = "INSERT INTO products (name, category, price, stock) VALUES ('$name', '$category', '$price', '$stock')";
    if ($conn->query($insert_sql) === TRUE) {
        $message = "<p style='color: #27ae60; font-weight:bold;'>Product added successfully!</p>";
    } else {
        $message = "<p style='color: #c0392b;'>Error adding product: " . $conn->error . "</p>";
    }
}

// --- 2. HANDLE DELETE ---
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_sql = "DELETE FROM products WHERE id = $delete_id";
    if ($conn->query($delete_sql) === TRUE) {
        $message = "<p style='color: #e67e22; font-weight:bold;'>Product deleted successfully!</p>";
    } else {
        $message = "<p style='color: #c0392b;'>Error deleting product: " . $conn->error . "</p>";
    }
}

// Fetch active products to display in the management table
$sql = "SELECT id, name, category, price, stock FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FreshMarket Admin Dashboard</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; margin: 30px; background-color: #1e252b; color: #fff; }
        .container { max-width: 900px; margin: auto; }
        h1, h2 { color: #5dade2; }
        .form-box { background: #2c3e50; padding: 20px; border-radius: 8px; margin-bottom: 30px; border: 1px solid #34495e; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: 600; }
        input, select { width: 100%; padding: 8px; box-sizing: border-box; border-radius: 4px; border: 1px solid #bdc3c7; background: #fff; color: #333; }
        .btn { background: #27ae60; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; }
        .btn-delete { background: #c0392b; padding: 5px 10px; color: white; text-decoration: none; border-radius: 4px; font-size: 0.9em; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; background: #2c3e50; }
        th, td { padding: 12px; border: 1px solid #34495e; text-align: left; }
        th { background-color: #34495e; color: #5dade2; }
        tr:nth-child(even) { background-color: #242f3d; }
    </style>
</head>
<body>

<div class="container">
    <h1>FreshMarket Inventory Control Panel</h1>
    <p>Week 5 CRUD Operations Dashboard</p>
    <hr style="border-color: #34495e;">

    <?php echo $message; ?>

    <div class="form-box">
        <h2>Add New Supermarket Item</h2>
        <form method="POST" action="admin.php">
            <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="name" required placeholder="e.g. Fresh Avocado">
            </div>
            <div class="form-group">
                <label>Category</label>
                <select name="category" required>
                    <option value="Fruits & Vegetables">Fruits & Vegetables</option>
                    <option value="Dairy & Eggs">Dairy & Eggs</option>
                    <option value="Snacks & Sweets">Snacks & Sweets</option>
                    <option value="Beverages">Beverages</option>
                </select>
            </div>
            <div class="form-group">
                <label>Price ($)</label>
                <input type="number" step="0.01" name="price" required placeholder="e.g. 1.99">
            </div>
            <div class="form-group">
                <label>Initial Stock Count</label>
                <input type="number" name="stock" required placeholder="e.g. 100">
            </div>
            <button type="submit" name="add_product" class="btn">Save Product to Database</button>
        </form>
    </div>

    <h2>Current Database Catalog Inventory</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Stock Count</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result && $result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['category']) . "</td>";
                    echo "<td>$" . number_format($row['price'], 2) . "</td>";
                    echo "<td>" . $row['stock'] . " items</td>";
                    echo "<td><a href='admin.php?delete_id=" . $row['id'] . "' class='btn-delete' onclick='return confirm(\"Are you sure you want to delete this product?\");'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6' style='text-align:center;'>No inventory items listed.</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</div>

</body>
</html>