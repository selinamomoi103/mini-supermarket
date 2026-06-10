<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "supermarket_db"; // Make sure this matches your database name exactly!

// This must be named $conn
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>