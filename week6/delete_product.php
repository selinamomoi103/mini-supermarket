<?php
// Ensure the path to your database connection is correct
include('../week5/db_connect.php'); 

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    // Execute the DELETE query
    mysqli_query($conn, "DELETE FROM products WHERE id=$id");
    
    // Redirect back to the catalog after deletion
    header("Location: catalog.php");
    exit();
}
?>