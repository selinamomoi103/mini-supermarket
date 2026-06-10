<?php
// Include our active connection file to keep the database handshake alive
include_once('db_connect.php');

$storeName = "QuickMart Admin Panel";
$statusMessage = "";
$alertClass = "";

// Check if the form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize user inputs to prevent basic breaking errors
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $emoji = mysqli_real_escape_string($conn, $_POST['emoji']);

    // Write the SQL query to insert data into the table
    $sql = "INSERT INTO products (name, category, price, image) VALUES ('$product_name', '$category', '$price', '$emoji')";

    // Execute the query against the database connection
    if (mysqli_query($conn, $sql)) {
        $statusMessage = "✓ Success! Product added to phpMyAdmin database inventory.";
        $alertClass = "background-color: #28a745; color: white;";
    } else {
        $statusMessage = "⚠ Database Error: " . mysqli_error($conn);
        $alertClass = "background-color: #e74c3c; color: white;";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $storeName; ?></title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #242b31; color: #ffffff; }
        header { background-color: #1a1f24; color: white; padding: 20px 30px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #2d353d; }
        .logo { font-size: 22px; font-weight: bold; color: #2ecc71; display: flex; align-items: center; gap: 10px; }
        .nav-links a { color: #a0aab2; text-decoration: none; margin-left: 25px; font-weight: 500; transition: 0.2s; }
        .nav-links a:hover { color: #2ecc71; }
        .admin-container { max-width: 900px; margin: 40px auto; padding: 0 20px; }
        .page-title { margin-bottom: 25px; font-size: 26px; border-bottom: 2px solid #2d353d; padding-bottom: 10px; }
        .management-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 30px; }
        .admin-card { background-color: #1a1f24; padding: 25px; border-radius: 8px; border: 1px solid #2d353d; }
        .admin-card h3 { margin-bottom: 20px; color: #2ecc71; font-size: 18px; border-bottom: 1px solid #2d353d; padding-bottom: 10px; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 6px; font-size: 13px; color: #a0aab2; font-weight: 600; text-transform: uppercase; }
        .form-group input, .form-group select { width: 100%; padding: 10px 12px; border: 1px solid #3d4650; background-color: #242b31; color: white; border-radius: 4px; outline: none; font-size: 14px; }
        .form-group input:focus, .form-group select:focus { border-color: #2ecc71; }
        .btn-submit { background-color: #2ecc71; color: #1a1f24; border: none; padding: 12px 20px; width: 100%; border-radius: 4px; cursor: pointer; font-weight: bold; font-size: 15px; transition: 0.2s; margin-top: 10px; }
        .btn-submit:hover { background-color: #27ae60; }
        .system-status-box { background-color: #242b31; border: 1px dashed #3d4650; padding: 15px; border-radius: 6px; font-size: 14px; color: #a0aab2; line-height: 1.6; }
        .system-status-box strong { color: white; }
    </style>
</head>
<body>

    <?php if ($statusMessage != ""): ?>
        <div style="<?php echo $alertClass; ?> padding: 14px 30px; text-align: center; font-size: 14px; font-weight: 600; border-bottom: 2px solid rgba(0,0,0,0.1); letter-spacing: 0.5px;">
            <?php echo $statusMessage; ?>
        </div>
    <?php else: ?>
        <div style="background-color: #28a745; color: white; padding: 14px 30px; text-align: center; font-size: 14px; font-weight: 600; border-bottom: 2px solid #1e7e34; letter-spacing: 0.5px;">
            ✓ Admin Gateway Connected securely to Live Database (`supermarket_db`).
        </div>
    <?php endif; ?>

    <header>
        <div class="logo">🛠️ <?php echo $storeName; ?></div>
        <div class="nav-links">
            <a href="index.php" style="color: #2ecc71; font-weight: 600;">← View Live Storefront</a>
            <a href="#">Orders (0)</a>
            <a href="#">Logout</a>
        </div>
    </header>

    <div class="admin-container">
        <h2 class="page-title">Store Inventory Management</h2>

        <div class="management-grid">
            <div class="admin-card">
                <h3>Add New Supermarket Product</h3>
                <form action="admin.php" method="POST">
                    
                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="product_name" placeholder="e.g., Organic Bananas (1kg)" required>
                    </div>

                    <div class="form-group">
                        <label>Department Category</label>
                        <select name="category" required>
                            <option value="">-- Choose Department Aisle --</option>
                            <option value="Fruits & Vegetables">🍎 Fruits & Vegetables</option>
                            <option value="Dairy & Eggs">🥛 Dairy & Eggs</option>
                            <option value="Bakery Specialty">🍞 Bakery Specialty</option>
                            <option value="Snacks & Sweets">🍪 Snacks & Sweets</option>
                            <option value="Pantry Staples">🍝 Pantry Staples</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Product Retail Price ($)</label>
                        <input type="number" name="price" step="0.01" placeholder="e.g., 2.99" required>
                    </div>

                    <div class="form-group">
                        <label>Product Visual Emoji representation</label>
                        <input type="text" name="emoji" placeholder="e.g., 🍌" required>
                    </div>

                    <button type="submit" class="btn-submit">Publish Item to Catalog</button>
                </form>
            </div>

            <div class="admin-card">
                <h3>Backend Control Status</h3>
                <div class="form-group">
                    <div class="system-status-box">
                        <p><strong>Active Database:</strong> supermarket_db</p>
                        <p><strong>DB Engine Host:</strong> localhost via XAMPP</p>
                        <p><strong>Current View Mode:</strong> Live Database Mode (Week 3)</p>
                        <br>
                        <p>Submitting this form executes a live SQL <code>INSERT</code> query, updating your real-time tables instantly.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>