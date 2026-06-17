<?php
include('../week5/db_connect.php'); // Ensure this points to your DB connection

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $sql = "INSERT INTO products (name, price) VALUES ('$name', '$price')";
    if(mysqli_query($conn, $sql)) {
        echo "Product added successfully!";
    }
}
?>
<form method="POST">
    <input type="text" name="name" placeholder="Product Name" required>
    <input type="number" step="0.01" name="price" placeholder="Price" required>
    <button type="submit" name="submit">Add Product</button>
</form>