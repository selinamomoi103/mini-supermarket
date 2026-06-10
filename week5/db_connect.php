<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "supermarket_db";

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>