<?php
// XAMPP Default Database Connection Credentials
$servername = "localhost";   
$username = "root";          
$password = "";              
$dbname = "supermarket_db";  

// Establish connection gateway to MySQL
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verify the connection health status
if (!$conn) {
    die("<div style='color:red; padding:15px; background:#fde8e8; margin:10px; border-radius:4px;'>
            <strong>Database Connection Error:</strong> " . mysqli_connect_error() . "
         </div>");
}
?>