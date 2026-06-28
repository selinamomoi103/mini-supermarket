<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selina's Profile & Store</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php include 'navigation.php'; ?>

    <section id="profile" style="padding: 20px; text-align: center;">
        <div class="profile-container" style="border: 1px solid #ddd; padding: 20px; max-width: 500px; margin: auto; border-radius: 8px;">
            <img src="1000195984.jpg" alt="Selina's Profile Picture" style="width:150px; height:150px; border-radius: 50%;">
            <h1>Selina</h1>
            <h3>About Me</h3>
            <p>I am a university student dedicated to mastering web development and building impactful projects.</p>
            <h3>Contact Information</h3>
            <p>Email: selina@example.com<br>Phone: 0710112019</p>
        </div>
    </section>

    <section id="showcase" style="padding: 20px;">
        <h2 style="text-align: center;">Our Products</h2>
        <div style="display: flex; gap: 20px; flex-wrap: wrap; justify-content: center;">
            
            <div style="border: 1px solid #ccc; padding: 15px; width: 200px; text-align: center;">
                <img src="banana.jpg" alt="Banana" style="width: 100px; height: 100px;">
                <h3>Organic Banana</h3>
                <p>Fresh organic bananas, 1kg.</p>
                <p><strong>Price: $1.35</strong></p>
                <a href="checkout.php" style="text-decoration: none;">
                    <button style="background-color: blue; color: white; border: none; padding: 10px; cursor: pointer; width: 100%;">Buy Now</button>
                </a>
            </div>

            <div style="border: 1px solid #ccc; padding: 15px; width: 200px; text-align: center;">
                <img src="milk.jpg" alt="Milk" style="width: 100px; height: 100px;">
                <h3>Fresh Whole Milk</h3>
                <p>Creamy whole milk, 1L.</p>
                <p><strong>Price: $3.49</strong></p>
                <a href="checkout.php" style="text-decoration: none;">
                    <button style="background-color: blue; color: white; border: none; padding: 10px; cursor: pointer; width: 100%;">Buy Now</button>
                </a>
            </div>

            <div style="border: 1px solid #ccc; padding: 15px; width: 200px; text-align: center;">
                <img src="cookies.jpg" alt="Cookies" style="width: 100px; height: 100px;">
                <h3>Chocolate Chip Cookies</h3>
                <p>Delicious homemade cookies.</p>
                <p><strong>Price: $1.99</strong></p>
                <a href="checkout.php" style="text-decoration: none;">
                    <button style="background-color: blue; color: white; border: none; padding: 10px; cursor: pointer; width: 100%;">Buy Now</button>
                </a>
            </div>

            <div style="border: 1px solid #ccc; padding: 15px; width: 200px; text-align: center;">
                <img src="avocado.jpg" alt="Avocado" style="width: 100px; height: 100px;">
                <h3>Fresh Avocado</h3>
                <p>Ripe and creamy avocado.</p>
                <p><strong>Price: $1.05</strong></p>
                <a href="checkout.php" style="text-decoration: none;">
                    <button style="background-color: blue; color: white; border: none; padding: 10px; cursor: pointer; width: 100%;">Buy Now</button>
                </a>
            </div>

        </div>
    </section>

</body>
</html>