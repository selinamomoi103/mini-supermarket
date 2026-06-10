<?php
// XAMPP Default Database Connection Credentials
$servername = "localhost";   // The database server runs locally on your laptop
$username = "root";          // XAMPP default master username
$password = "";              // XAMPP default password is completely blank
$dbname = "supermarket_db";  // The target database name inside phpMyAdmin

// Establish connection gateway to MySQL
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verify the connection health status
if (!$conn) {
    // If the connection drops or fails, halt execution and display the error message
    die("<div style='color:red; padding:15px; background:#fde8e8; margin:10px; border-radius:4px;'>
            <strong>Database Connection Error:</strong> " . mysqli_connect_error() . "
         </div>");
}
?>