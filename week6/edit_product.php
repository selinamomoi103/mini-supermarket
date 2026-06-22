<?php
include('../week5/db_connect.php');

// Only proceed if 'id' is present in the URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch current details
    $result = mysqli_query($conn, "SELECT * FROM products WHERE id = $id");
    $product = mysqli_fetch_assoc($result);
} else {
    // Redirect if no ID is found
    header("Location: catalog.php");
    exit();
}
?>
<form method="POST">
    <input type="text" name="name" value="<?php echo $product['name']; ?>">
    <input type="number" step="0.01" name="price" value="<?php echo $product['price']; ?>">
    <button type="submit" name="update">Update</button>
</form>