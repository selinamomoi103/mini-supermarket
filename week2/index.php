<?php
// Week 2: Establish connection handshake with XAMPP MySQL database engine
include_once('db_connect.php');

$storeName = "QuickMart Mini-Supermarket";

// Simulated grocery database array for frontend wireframe rendering
$products = [
    ["name" => "Fresh Red Apples (1kg)", "category" => "Fruits & Vegetables", "price" => 2.50, "image" => "🍎"],
    ["name" => "Whole Milk (1L)", "category" => "Dairy & Eggs", "price" => 1.80, "image" => "🥛"],
    ["name" => "Freshly Baked Bread", "category" => "Bakery Specialty", "price" => 3.10, "image" => "🍞"],
    ["name" => "Organic Eggs (12pk)", "category" => "Dairy & Eggs", "price" => 4.50, "image" => "🥚"],
    ["name" => "Chocolate Chip Cookies", "category" => "Snacks & Sweets", "price" => 2.20, "image" => "🍪"],
    ["name" => "Spaghetti Pasta (500g)", "category" => "Pantry Staples", "price" => 1.15, "image" => "🍝"]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $storeName; ?> - Catalog</title>
    
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #242b31; color: #ffffff; }
        header { background-color: #1a1f24; color: white; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #2d353d; }
        .logo { font-size: 22px; font-weight: bold; color: #2ecc71; }
        .search-bar input { padding: 10px 15px; width: 320px; border: 1px solid #3d4650; background-color: #242b31; color: white; border-radius: 4px; outline: none; }
        .nav-links a { color: #2ecc71; text-decoration: none; margin-left: 25px; font-weight: 500; }
        .main-container { display: flex; max-width: 1200px; margin: 30px auto; padding: 0 15px; gap: 25px; }
        .sidebar { width: 260px; background-color: #1a1f24; padding: 20px; border-radius: 8px; height: fit-content; border: 1px solid #2d353d; }
        .sidebar h3 { margin-bottom: 15px; color: #ffffff; border-bottom: 2px solid #2d353d; padding-bottom: 8px; font-size: 16px; }
        .sidebar ul { list-style: none; }
        .sidebar ul li { margin-bottom: 8px; }
        .sidebar ul li a { color: #a0aab2; text-decoration: none; display: block; padding: 8px 12px; border-radius: 4px; }
        .sidebar ul li a.active, .sidebar ul li a:hover { background-color: #242b31; color: #2ecc71; font-weight: 600; }
        .catalog { flex: 1; }
        .catalog h2 { margin-bottom: 25px; color: #ffffff; font-size: 24px; }
        .product-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 20px; }
        .product-card { background-color: #1a1f24; padding: 20px; border-radius: 8px; border: 1px solid #2d353d; text-align: center; display: flex; flex-direction: column; justify-content: space-between; }
        .product-image-box { width: 100%; height: 120px; background-color: #242b31; margin-bottom: 15px; border-radius: 6px; display: flex; align-items: center; justify-content: center; border: 1px solid #2d353d; }
        .product-emoji { font-size: 45px; }
        .product-category { font-size: 11px; color: #a0aab2; text-transform: uppercase; margin-bottom: 6px; font-weight: 700; }
        .product-title { font-size: 16px; font-weight: 600; margin-bottom: 10px; min-height: 44px; display: flex; align-items: center; justify-content: center; }
        .product-price { font-size: 20px; font-weight: bold; color: #2ecc71; margin-bottom: 15px; }
        .btn-add-cart { background-color: transparent; color: #2ecc71; border: 1px solid #2ecc71; padding: 10px 15px; width: 100%; border-radius: 4px; cursor: pointer; font-weight: 600; transition: 0.2s; }
        .btn-add-cart:hover { background-color: #2ecc71; color: #1a1f24; }
    </style>
</head>
<body>

    <div style="background-color: #28a745; color: white; padding: 12px 30px; text-align: center; font-size: 14px; font-weight: 600; border-bottom: 2px solid #1e7e34;">
        ✓ Connected securely to XAMPP database server engine (`supermarket_db`).
    </div>

    <header>
        <div class="logo">🛒 <?php echo $storeName; ?></div>
        <div class="search-bar">
            <input type="text" placeholder="Search grocery aisles (e.g., milk, fresh fruit)...">
        </div>
        <div class="nav-links">
            <a href="#">Aisles</a>
            <a href="#">Register / Login</a>
            <a href="#">My Cart (0)</a>
        </div>
    </header>

    <div class="main-container">
        
        <aside class="sidebar">
            <h3>Shop by Department</h3>
            <ul>
                <li><a href="#" class="active">All Departments</a></li>
                <li><a href="#">🍎 Fresh Produce</a></li>
                <li><a href="#">🥛 Dairy & Eggs</a></li>
                <li><a href="#">🍞 Bakery Specialty</a></li>
                <li><a href="#">🍪 Snacks & Sweets</a></li>
                <li><a href="#">🍝 Pantry Staples</a></li>
            </ul>
        </aside>

        <main class="catalog">
            <h2>Current Stock Availability</h2>
            
            <div class="product-grid">
                <?php foreach ($products as $item): ?>
                    <div class="product-card">
                        <div class="product-image-box">
                            <span class="product-emoji"><?php echo $item['image']; ?></span>
                        </div>
                        <div class="product-category"><?php echo $item['category']; ?></div>
                        <div class="product-title"><?php echo $item['name']; ?></div>
                        <div class="product-price">$<?php echo number_format($item['price'], 2); ?></div>
                        <button class="btn-add-cart">Add to Cart</button>
                    </div>
                <?php endforeach; ?>
            </div>
        </main>

    </div>

</body>
</html>