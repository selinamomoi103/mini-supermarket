<?php
include('../week5/db_connect.php');
$id = $_GET['id'];

// Fetch current details
$result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
$product = mysqli_fetch_assoc($result);

if(isset($_POST['update'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    mysqli_query($conn, "UPDATE products SET name='$name', price='$price' WHERE id=$id");
    header("Location: catalog.php"); // Redirect back to catalog
}
?>
<form method="POST">
    <input type="text" name="name" value="<?php echo $product['name']; ?>">
    <input type="number" step="0.01" name="price" value="<?php echo $product['price']; ?>">
    <button type="submit" name="update">Update</button>
</form>